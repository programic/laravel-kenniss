# Programic - Laravel Kenniss

[![Latest Version on Packagist](https://img.shields.io/packagist/v/programic/laravel-kenniss.svg?style=flat-square)](https://packagist.org/packages/programic/laravel-kenniss)
[![Tests](https://github.com/programic/laravel-kenniss/actions/workflows/tests.yml/badge.svg?branch=main)](https://github.com/programic/laravel-kenniss/actions/workflows/tests.yml)
![](https://github.com/programic/laravel-kenniss/workflows/Run%20Tests/badge.svg?branch=main)
[![Total Downloads](https://img.shields.io/packagist/dt/programic/laravel-kenniss.svg?style=flat-square)](https://packagist.org/packages/programic/laravel-kenniss)

A Laravel API wrapper for KENNISS API

## Installation
This package requires PHP 8.0 and Laravel 9.0 or higher.

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
```php
Kenniss::post();
```


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
