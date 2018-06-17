# O God, The Aftermath
## Simple website monitoring

All it does is ping sites and emails you if they're down. There are also loading GIFs to ease the pain.

## SETUP
+ `composer install`
+ `npm install`
+ `npm run prod` (or `dev`)
+ `touch db/db.sqlite`
+ Set up environment file (see below)
+ `php artisan migrate`
+ `php artisan serve`

## ENVIRONMENT
Couple things that need done:
1. Get absolute path to sqlite DB.
2. Set up Mailgun for email notifications
3. Get Giphy API key

## APP
It's a single page app, so just get it started and navigate to your route.

You can also use the `ogod:ping` artisan command, or ping the schedule every minute.