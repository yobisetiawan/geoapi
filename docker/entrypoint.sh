#!/bin/sh
set -e

chown www-data:www-data /var/www/.env
php artisan key:generate
php artisan l5-swagger:generate
php artisan storage:link
php artisan optimize:clear
php artisan optimize


# Start PHP-FPM in the foreground
php-fpm -F
