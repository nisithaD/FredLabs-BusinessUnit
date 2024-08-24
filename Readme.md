
[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)

# FredLabs Business Units

#### Handle business unit within your application.

`fredlabs/business-units` is a Laravel package for handling business units in your application. It provides a trait and model for managing business units and includes functionality for automatically updating existing tables with a `business_unit_id` column.


## Requirements

- Laravel 10.x or higher
- PHP 8.3 or higher
- Composer

## Installation, and Usage Instructions

To install the package, use Composer:

```bash
composer require fredlabs/business-units
```

## Publish Vendor Files
After successful installation, publish the package's configuration and migration files by running:

```bash
php artisan vendor:publish --provider="FredLabs\BusinessUnits\Providers\BusinessUnitServiceProvider"
```

## Edit Configuration
The above command will publish customizable configuration files. In the config/business-units.php file, you can add or modify the fillable attributes in the business_units array to specify which fields you want to use for business unit parameters. For example:

```php
return [
    'fillable' => [
        'name',
        'description',
        'other_field',
    ],
];
```

## Migrate Tables
To apply the changes to your existing tables, including adding the business_unit_id column, run:

```bash
php artisan migrate
```

## Usage
After installation and migration, you can use the HasBusinessUnit trait in your Eloquent models to enable business unit functionality. Here's how to use it in your models:

```php
use FredLabs\BusinessUnits\Traits\HasBusinessUnit;

class User extends Authenticatable
{
    use HasBusinessUnit;
}
```
This trait will allow you to associate business units with your models. Ensure to adjust your models and controllers to handle business unit logic as required.

## Authors and Acknowledgments
* FredLabs: Development and maintenance of the package.
* Special thanks to the Laravel community and contributors who provide support and feedback.



## License

[MIT](https://choosealicense.com/licenses/mit/)

