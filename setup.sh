#!/bin/bash
source .env

if [[ "$APP_ENV" = "production" ]]; then
  chown -R www-data:www-data /data
  chmod -R 775 ./storage/logs
  chmod -R 775 ./bootstrap/cache
  
  composer install --optimize-autoloader --no-dev
  
  php artisan config:cache
  php artisan route:cache
  php artisan view:cache
else
  composer install
  php artisan cache:clear
fi

php artisan storage:link
php artisan down --retry=60 --secret=$MAINTENANCE_KEY --render="errors::maintenance"
