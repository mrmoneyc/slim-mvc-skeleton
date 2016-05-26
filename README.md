# Slim 3 MVC Skeleton

This is a simple skeleton project for Slim 3 that includes FluentPDO, Twig and Monolog.

Base on https://github.com/vhchung/slim3-skeleton-mvc

## Prepare

1. Create your project:

       `$ composer create-project -n -s dev mrmoneyc/slim-mvc-skeleton YOUR_APP_NAME`

2. Create database: `$ cat sql/db.sql | sqlite3 storage/db/db.sqlite`

### Run it:

1. `$ cd YOUR_APP_NAME`
2. `$ php -S 0.0.0.0:8888 -t public/`
3. Browse to http://localhost:8888

### Run coding style check

1. Install [PHP_CodeSniffer] (https://github.com/squizlabs/PHP_CodeSniffer)
2. `$ cd YOUR_APP_NAME`
3. `$ phpcs`

### Run test

1. Install [PHPUnit] (https://phpunit.de/)
2. `$ cd YOUR_APP_NAME`
3. `$ phpunit`

### Notice

Set `storage/` folder permission to writable when deploy to production environment

## Key directories

* `app`: Application code
* `app/controllers`: Controller files
* `app/models`: Model files
* `app/templates`: Template files
* `storage/log`: Log files
* `storage/db`: SQLite DB files
* `public`: Webserver root
* `vendor`: Composer dependencies
* `sql`: sql dump file for sample database

## Key files

* `public/index.php`: Entry point to application
* `app/settings.php`: Configuration
* `app/dependencies.php`: Services for Pimple
* `app/middleware.php`: Application middleware
* `app/routes.php`: All application routes are here
* `app/controllers/IndexController.php`: Controller class for the home page
* `app/models/ConfigurationModel.php`: Model class for configurations table
* `app/templates/index.twig`: Template file for the home page
