#!/bin/bash

chown -R www-data:www-data /var/www/html/storage
chown -R www-data:www-data /var/www/html/bootstrap/cache

touch database/database.sqlite

composer install

php artisan key:generate

php artisan migrate
