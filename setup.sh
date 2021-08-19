#!/bin/bash
source .env

if [[ "$APP_ENV" = "production" ]]; then
  echo "Installing production environment and caching"
  composer install --optimize-autoloader --no-dev
  
  php artisan config:cache
  php artisan route:cache
  php artisan view:cache
else
  echo "Installing non-production environment"
  composer install
  php artisan cache:clear
fi

php artisan storage:link
php artisan down --retry=60 --secret=$MAINTENANCE_KEY --render="errors::maintenance"

if [[ "$APP_CONTAINERISED" = "true" ]]; then
  echo "Fixing application permissions for container"
  chown -R www-data:www-data /data
  chmod -R 775 ./storage/logs
  chmod -R 775 ./bootstrap/cache
fi
