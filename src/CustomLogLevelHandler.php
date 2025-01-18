<?php

namespace NaveenCodehub\LaravelSelectiveSlackLogger;

use Monolog\Logger;
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
     * @param array $levels The log levels to handle. Defaults to [Logger::INFO].
     *
     * @throws MissingExtensionException If required extensions for SlackWebhookHandler are not installed.
     */
    public function __construct(string $url, array $levels = [Logger::INFO])
    {
        // Set 'includeContextAndExtra' parameter to true to include context in the log.
        parent::__construct($url, null, null, true, null, false, true);
        $this->levels = $levels;
    }

    /**
     * Determines if the log record should be processed by this handler.
     *
     * This method checks if the level of the log record matches any level
     * defined in the handler's levels array.
     *
     * @param array $record An array representing a partial log record, containing at least a 'level' key.
     *                      Example: ['level' => Logger::WARNING, ...].
     * @return bool Returns true if the log record's level matches one of the handler's levels, false otherwise.
     */
    public function isHandling(array $record): bool
    {
        return in_array($record['level'], $this->levels, true);
    }
}
