# Mow Managers - Helper

## Requirements

* php >= 8.0.0
* laravel >= 8.12.0
* composer >= 2.0.7

## Installation

```bash
composer require codepso/techgenies-mm
php artisan vendor:publish --tag=mm-config
````


# Testing
```bash
composer update
composer remove codepso/techgenies-mm
```

```bash
"repositories": [
    {
        "type": "path",
        "url": "./packages/techgenies/techgenies-mm"
    }
]
```

# References
- https://cerwyn.medium.com/creating-laravel-package-from-scratch-4582607639cf
- https://www.twilio.com/blog/build-laravel-php-package-seeds-database-fake-data
- https://dev.to/devingray/how-to-create-a-highly-configurable-laravel-package-4pj0
