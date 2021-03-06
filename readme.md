# Laravel procedure migrations
[![Build Status](https://travis-ci.org/RobyFerro/Laravel-Procedure-Migration.svg?branch=master)](https://travis-ci.org/RobyFerro/Laravel-Procedure-Migration)
[![StyleCI](https://github.styleci.io/repos/199186343/shield?branch=master)](https://github.styleci.io/repos/199186343)
![Packagist](https://img.shields.io/packagist/dm/ikdev/procedure_migration)
![GitHub tag (latest SemVer pre-release)](https://img.shields.io/github/tag-pre/robyferro/laravel-procedure-migration)

Laravel procedure migrations it's a simple tool to manage your stored procedure in your Laravel projects.
It's behaviour is similar to the official database migrations. 

You've just to put your .sql procedure file in _database/procedures_ folder and run 
`php artisan procedure:migrate`.

To create a new procedure just type in you're terminal `php artisan make:procedure <YOUR NEW PROCEDURE NAME>`

## Installation
You can install "Laravel procedure migrations" with composer:
`composer require ikdev\procedure_migration`

### Laravel < 5.6
If your Laravel version is older than 5.6 you'll need to manually adding the service provider.
To do this you've to insert this code in your _config/app.php_ file:

```
'providers' => [
    // Other providers
    
    ProcedureMigrationsServiceProvider::class
]
```

## Need help? 
Join in our [Telegram community](https://t.me/ikdev)
