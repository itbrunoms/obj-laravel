#!/bin/bash

chown -R www-data:www-data /var/www/html/storage
chown -R www-data:www-data /var/www/html/bootstrap/cache

touch database/database.sqlite

php artisan migrate
