<?php

namespace NaveenCodehub\LaravelSelectiveSlackLogger;

use Monolog\Level;
use Monolog\LogRecord;
use Monolog\Handler\SlackWebhookHandler;
use Monolog\Handler\MissingExtensionException;

class CustomLogLevelHandler extends SlackWebhookHandler
{
    /**
     * @var array The log levels that this handler should handle.
     */
    protected array $levels;

    /**
     * Create a new CustomLogLevelHandler instance.
     *
     * @param string $url The Slack webhook URL for sending log messages.
     * @param array $levels The log levels to handle. Defaults to [Level::Info].
     *
     * @throws MissingExtensionException If required extensions for SlackWebhookHandler are not installed.
     */
    public function __construct(string $url, array $levels = [Level::Info])
    {
        parent::__construct($url, null, null, true, null, false, true);
        $this->levels = $levels;
    }

    /**
     * Determines if the log record should be processed by this handler.
     *
     * This method checks if the level of the log record matches any level
     * defined in the handler's levels array.
     *
     * @param array|LogRecord $record An array representing a partial log record, containing at least a 'level' key.
     *                      Example: ['level' => Level::Warning, ...].
     * @return bool Returns true if the log record's level matches one of the handler's levels, false otherwise.
     */
    public function isHandling(array|\Monolog\LogRecord $record): bool
    {
        return in_array(Level::fromValue($record['level']), $this->levels, true);
    }
}
