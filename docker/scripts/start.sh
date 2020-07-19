#!/bin/bash

echo "Setting variables"
#bash -x /tmp/add-env.sh
cron
composer install
php artisan key:generate
php artisan migrate --force
php artisan db:seed --force
php artisan storage:link -q -n
#php artisan passport:install -q -n
find /var/www/html/storage \! -user nginx -exec chown nginx:nginx {} \;
exec /usr/bin/supervisord -n -c /etc/supervisord.conf

