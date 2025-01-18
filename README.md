# Laravel Selective Slack Logger

`laravel-selective-slack-logger` is a package that allows you to define specific log levels to post logs to Slack using the Monolog package. You can choose any log levels, and you can even choose more than one log level (e.g., error, info). When you specify certain log levels, only those logs will be posted to Slack.

### Version Compatibility:
- Version `v1.*` is intended for **Laravel 9** and below versions.

---

## Installation

Install the latest version with

```bash
$ composer require naveen-codehub/laarvel-selective-slack-logger
```

## Usage

To configure logging to Slack with specific log levels, you can modify your Laravel logging configuration file (`config/logging.php`). Below is an example of how to configure the Slack channel to log warnings:

```php
'selective_slack_logger' => [
    'driver' => 'monolog',
    'handler' => CustomLogLevelHandler::class,
    'handler_with' => [
        'url' => env('SELECTIVE_SLACK_LOGGER_WEBHOOK_URL'),
        'levels' => [\Monolog\Logger::WARNING, \Monolog\Logger::EMERGENCY],
    ],
],
```
## About

### Requirements

- Monolog `^2.0` works with PHP 7.2 or above.
- Laravel `^7.0 || ^8.0 || ^9.0`

### Author

Naveen - <naveen@nagagroups.in>

### License

Monolog is licensed under the MIT License - see the [LICENSE](LICENSE) file for details