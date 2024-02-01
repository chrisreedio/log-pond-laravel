<?php

namespace ChrisReedIO\LogPond\Commands;

use Illuminate\Console\Command;

class LogPondTestCommand extends Command
{
    public $signature = 'log-pond:test';

    public $description = 'Tests the connection to your Log Pond server.';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
