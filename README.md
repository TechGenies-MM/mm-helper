# Mow Managers - Helper

## Requirements

* php >= 8.0.0
* laravel >= 8.12.0
* composer >= 2.0.7

## Installation
```bash
composer require codepso/techgenies-mm
php artisan vendor:publish --tag=mm-config (optional)
````

## Update
```bash
composer update codepso/techgenies-mm
```
### Docker
```bash
docker run --rm -it -v $(pwd):/var/www codepso/php:8.0-cli-pgsql composer require codepso/techgenies-mm
docker run --rm -it -v $(pwd):/var/www codepso/php:8.0-cli-pgsql composer update codepso/techgenies-mm
```

.env
```bash
PAY_TRACE_URL=https://api.paytrace.com
PAY_TRACE_USERNAME=abc@abc.com
PAY_TRACE_PASSWORD=abc123
````

## Testing
```bash
laravel new testing
composer remove codepso/techgenies-mm
php artisan serve
```

```bash
"repositories": [
    {
        "type": "path",
        "url": "./packages/techgenies/techgenies-mm"
    }
]
```
```bash
composer update
composer require codepso/techgenies-mm
composer remove codepso/techgenies-mm (remove)
```

# References
- https://cerwyn.medium.com/creating-laravel-package-from-scratch-4582607639cf
- https://www.twilio.com/blog/build-laravel-php-package-seeds-database-fake-data
- https://dev.to/devingray/how-to-create-a-highly-configurable-laravel-package-4pj0
