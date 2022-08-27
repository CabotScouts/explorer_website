#!/bin/bash
source .env
composer install

if [[ -z "${APP_KEY}" ]]; then
  php artisan key:generate
fi

php artisan storage:link
php artisan down --retry=60 --secret=$MAINTENANCE_KEY --render="errors::maintenance"
