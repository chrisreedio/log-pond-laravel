# Log Pond Laravel Logging Package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/chrisreedio/log-pond-laravel.svg?style=flat-square)](https://packagist.org/packages/chrisreedio/log-pond-laravel)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/chrisreedio/log-pond-laravel/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/chrisreedio/log-pond-laravel/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/chrisreedio/log-pond-laravel/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/chrisreedio/log-pond-laravel/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/chrisreedio/log-pond-laravel.svg?style=flat-square)](https://packagist.org/packages/chrisreedio/log-pond-laravel)

This package provides a logging channel for Laravel that sends logs to the [Log Pond]() logging service.

Alternatively, you may self-host the Log Pond service. More details on that in the future.

## Installation

You can install the package via composer:

```bash
composer require chrisreedio/log-pond-laravel
```

Add the following logging channel to your `config/logging.php` file:

```php
'channels' => [
    // ... Other channels
    'log-pond' => [
        'driver' => 'monolog',
        'level' => env('LOG_LEVEL', 'debug'),
        'handler' => ChrisReedIO\LogPond\Handlers\LogPondHandler::class,
        'with' => [
            'host' => env('LOG_POND_HOST'),
            'secret' => env('LOG_POND_SECRET'),
        ],
    ],
    // ... Other channels
],
```

Once the `log-pond` channel is added, you may now add it to the stack channel list like so:

```php
'channels' => [
    'stack' => [
        'driver' => 'stack',
        'channels' => ['single', 'log-pond'],
    ],
    // ... Other channels
],
```

## Usage

```php
use Illuminate\Support\Facades\Log;
Log::critical('A critical error occurred!', ['context' => 'data']);
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Chris Reed](https://github.com/chrisreedio)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
