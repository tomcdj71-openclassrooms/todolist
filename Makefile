#---Symfony-Makefile-Using-Just---------------#
# Author: https://github.com/tomcdj71
# License: MIT
#---------------------------------------------#

before-commit:
	composer update
	composer outdated
	npm update
	symfony check:security
	composer run-script phpcs
	composer run-script phpstan-baseline
	./vendor/bin/phpmd src text phpmd-rules.xml --reportfile phpmd-baseline.txt || true 
	./vendor/bin/rector process src
.PHONY: before-commit

php-set-env:
	./setup_php.sh
.PHONY: php-set-env

