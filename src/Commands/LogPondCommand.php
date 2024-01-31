<?php

namespace ChrisReedIO\LogPond\Commands;

use Illuminate\Console\Command;

class LogPondCommand extends Command
{
    public $signature = 'log-pond-laravel';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
