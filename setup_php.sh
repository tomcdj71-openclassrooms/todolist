#!/bin/bash

# Define the php.ini from the project root
project_root=$(pwd)
php_ini_file="$project_root/php.ini"
if [ ! -f "$php_ini_file" ]; then
    touch $php_ini_file
    chmod 644 $php_ini_file
    chown www-data:www-data $php_ini_file
fi
echo "Using php.ini from: $php_ini_file"

# Construct the absolute path to the preload.php file
preload_path="$project_root/config/preload.php"
echo "Preload path to be set: $preload_path"

# Check if opcache.preload is already set
if grep -q "opcache.preload=" $php_ini_file; then
    sed -i "s|opcache.preload=.*|opcache.preload=$preload_path|" $php_ini_file
else
    echo "Appending new opcache directives..."
    cat >> $php_ini_file <<EOL
;php.ini
[opcache]
; preload the file
opcache.preload=$preload_path
; required for opcache.preload:
opcache.preload_user=www-data
; maximum memory that OPcache can use to store compiled PHP files
opcache.memory_consumption=256
; maximum number of files that can be stored in the cache
opcache.max_accelerated_files=20000
; maximum percentage of "wasted" memory until a restart is scheduled
opcache.validate_timestamps=0
; maximum memory allocated to store the results
realpath_cache_size=4096K
; save the results for 10 minutes (600 seconds)
realpath_cache_ttl=600
EOL
fi

echo "opcache directives are successfully set in $php_ini_file!"
