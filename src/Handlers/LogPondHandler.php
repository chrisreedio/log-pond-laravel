<?php

namespace ChrisReedIO\LogPond\Handlers;

use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Level;
use Monolog\LogRecord;

class LogPondHandler extends AbstractProcessingHandler
{
    public function __construct(
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
        dump("LP | {$payload}");
    }
}
