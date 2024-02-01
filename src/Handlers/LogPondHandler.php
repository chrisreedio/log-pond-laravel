<?php

namespace ChrisReedIO\LogPond\Handlers;

use ChrisReedIO\LogPond\Enums\LogLevels;
use ChrisReedIO\LogPond\Facades\LogPond;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Level;
use Monolog\LogRecord;
use function dump;

class LogPondHandler extends AbstractProcessingHandler
{
    public function __construct(
        protected string $site,
        protected string $host,
        int|string|Level $level = Level::Debug,
        bool $bubble = true)
    {
        parent::__construct($level, $bubble);
    }

    /**
     * {@inheritDoc}
     */
    protected function write(LogRecord $record): void
    {
        // If we don't have a host/destination, we can't send anything, anywhere
        if (empty($this->host)) {
            return;
        }

        $payload = json_encode($record->toArray());
        // dump("LP | {$record->level->name}: {$record->message}");
        // dump("LP | {$payload}");
        $response = LogPond::sites()
            ->log($record->level->value, $record->message, $record->context);
        if ($response->status() !== 201) {
            dump("LP | Failed to send log entry to Log Pond");
            dump($response->json());
        } else {
            dump("LP | Log entry sent to Log Pond");
            dump($response->json());
        }
    }
}
