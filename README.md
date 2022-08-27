# Cabot Explorers Website
The base for the Cabot District Explorers website.

## Building
* `./manage init`
* 📝 fill out `.env`
* `./manage build`
* `./manage start`
* `./manage migrate`
* `./manage exec php artisan db:seed`
* `./manage exec php artisan voyager:admin <email> --create`
* `./manage exec php artisan route:cache`
* `./manage exec php artisan up`
* 🤞 a new instance of the website should be up and running

## Special Pages
* `/` - content overlaid over header image on front page
* `/front-page` - page content which appears below header image on front page
