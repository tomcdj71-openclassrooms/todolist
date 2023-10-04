#---Symfony-Justfile---------------#
# Author: https://github.com/tomcdj71
# License: MIT
#---------------------------------------------#

# Variables
set shell := ["bash", "-c"]
PWD := "`pwd`"
SYMFONY := "symfony"
COMPOSER := "composer"
VENDOR_BIN := "./vendor/bin"
PHPUNIT := "APP_ENV=test phpunit"
PHP_CONSOLE := "php bin/console"
SYMFONY_CONSOLE := "symfony console"

# Shortcut that runs make qa-audit.
audit:
    just qa-audit

# Runs all QA tools on the project and fixes the issues.
fix:
    just qa-rector
    just qa-cs
    just qa-insights

# Runs all Linters. Generates reports.
lint:
    just qa-lint-twigs
    just qa-lint-yaml
    just qa-lint-container
    just qa-lint-schema

# Lists all available just commands.
help: 
    @just --list

# Utility command to detect if we need to use symfony console or php bin/console
run-command *args:
    #!/usr/bin/env sh
    args="{{args}}"
    if command -v symfony ; then
        symfony console $args
    else
        php bin/console $args
    fi

###################################
#
# Project setup
#
###################################
# Install php tools
install-dev:
    {{COMPOSER}} install --dev --optimize-autoloader
    cd tools/php && {{COMPOSER}} install

# Install project with normal dependencies
install-project:
    {{COMPOSER}} install --no-dev --optimize-autoloader
    just run-command doctrine:database:create
    just run-command doctrine:schema:update --force --complete
    just run-command doctrine:fixtures:load
    just run-command cache:clear
    just {{COMPOSER}} outdated
    {{COMPOSER}} validate --strict --check-lock

###################################
#
# Symfony commands
#
###################################
# Clear the Symfony cache.
sf-clear-cache:
    just run-command cache:clear

# Open symfony logs
sf-log:
    {{SYMFONY}} server:log

# Open symfony project in browser
sf-open:
    {{SYMFONY}} open:local
    
# Fix permissions issues on var folder
sf-perms:
    chown -R www-data:www-data var
    chmod -R 777 var

# Start Symfony server
sf-start:
    {{SYMFONY}} server:start

# Start Symfony server in daemon-mode
sf-start-daemon:
    {{SYMFONY}} server:start -d
    just sf-open
    just sf-log

# Stop Symfony server
sf-stop:
    {{SYMFONY}} server:stop

###################################
#
# Quality Assurance
#
###################################
# Runs a security audit (security-checker + audit + rector + PHPCS + phpmetrics + phpinsights + PHPStan). Only generates reports.
qa-audit:
    just qa-security-checker
    {{COMPOSER}} audit
    {{COMPOSER}} run-script rector-bs --working-dir=tools/php
    {{COMPOSER}} run-script cs-bs --working-dir=tools/php
    {{COMPOSER}} run-script metrics --working-dir=tools/php
    {{COMPOSER}} run-script stan --working-dir=tools/php

# Check outdated dependencies.
qa-composer-outdated:
    {{COMPOSER}} outdated --direct --strict
    {{COMPOSER}} outdated --direct --strict --working-dir=tools/php

# Runs PHP_CodeSniffer on the project and fixes the issues.
qa-cs:
    {{COMPOSER}} run-script cs --working-dir=tools/php

# Runs PHP_CodeSniffer on the project. Generates reports.
qa-cs-bs:
    {{COMPOSER}} run-script cs-bs --working-dir=tools/php

# Runs PHPInsights on the project.
qa-insights:
    {{COMPOSER}} run-script insights --working-dir=tools/php

# Checks the Symfony DI container for errors.
qa-lint-container:
    {{SYMFONY_CONSOLE}} lint:container

# Validates that the Doctrine schema is in sync with the current mapping metadata.
qa-lint-schema:
    {{SYMFONY_CONSOLE}} doctrine:schema:validate --skip-sync -v --no-interaction

# Lints Twig templates.
qa-lint-twigs:
    {{SYMFONY_CONSOLE}} lint:twig ./templates

# Lints YAML files.
qa-lint-yaml:
    {{SYMFONY_CONSOLE}} lint:yaml ./config

# Runs PHPMetrics on the project. Generates reports.
qa-metrics:
    {{COMPOSER}} run-script metrics-src --working-dir=tools/php
    {{COMPOSER}} run-script metrics-test --working-dir=tools/php

# Runs Rector on the project and fixes the issues.
qa-rector:
    {{COMPOSER}} run-script rector --working-dir=tools/php

# Runs Rector on the project. Generates reports.
qa-rector-bs:
    {{COMPOSER}} run-script rector-bs --working-dir=tools/php

# Checks security issues in your project dependencies.
qa-security-checker: 
    symfony check:security

# Runs PHPStan on the project.
qa-stan:
    {{COMPOSER}} run-script stan --working-dir=tools/php

# Run PHPUnit tests
test:
    php {{VENDOR_BIN}}/phpunit
# Run PHPUnit tests with coverage
test-coverage:
    php {{VENDOR_BIN}}/phpunit --coverage-html docs/tools-reports/coverage
