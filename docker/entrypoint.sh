#!/bin/sh
set -e

chown www-data:www-data /var/www/.env
php artisan key:generate
php artisan route:cache
php artisan config:cache
php artisan l5-swagger:generate
php artisan view:cache
php artisan storage:link


# Start PHP-FPM in the foreground
php-fpm -F
