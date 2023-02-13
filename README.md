# Programic - Laravel Kenniss

[![Latest Version on Packagist](https://img.shields.io/packagist/v/programic/laravel-kenniss.svg?style=flat-square)](https://packagist.org/packages/programic/laravel-kenniss)
[![Tests](https://github.com/programic/laravel-kenniss/actions/workflows/tests.yml/badge.svg?branch=main)](https://github.com/programic/laravel-kenniss/actions/workflows/tests.yml)
![](https://github.com/programic/laravel-kenniss/workflows/Run%20Tests/badge.svg?branch=main)
[![Total Downloads](https://img.shields.io/packagist/dt/programic/laravel-kenniss.svg?style=flat-square)](https://packagist.org/packages/programic/laravel-kenniss)

A Laravel API wrapper for KENNISS API

## Installation
This package requires PHP 8.2 and Laravel 10 or higher.

```
composer require programic/laravel-kenniss
```

Add KENNISS credentials to your services config and .env:
```php
'kenniss' => [
    'baseUrl' => env('KENNISS_BASE_URL'),
    'apiKey' => env('KENNISS_API_TOKEN'),
],
```

## Usage

### Retrieve client
#### Get client from IoC
```php
$kenniss = app(Programic\Kenniss\Kenniss::class);
```
#### By Dependency Injecten
```php
use Programic\Kenniss\Kenniss;

class UserController extends Controller {
    public function __invoke($client Kenniss)
    {
        //
    }
}
```

### Using client

#### Default requests
```php
$kenniss->get('/users');
$kenniss->post('/users', []);
$kenniss->patch('/users/1', []);
$kenniss->delete('/users/1', []);
```
#### Reference requests
```php
$user = $kenniss->users()->find(1);
$user = $kenniss->users()->create([]);
$user = $kenniss->users()->update(1, []);
$user = $kenniss->users()->delete(1);
```
There are more references available. The IDE will autocomplete the available references.

## Testing
```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security-related issues, please email [info@programic.com](mailto:info@programic.com) instead of using the issue tracker.

## Credits

- [Rick Bongers](https://github.com/rbongers)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
