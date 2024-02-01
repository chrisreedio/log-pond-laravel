<?php

namespace ChrisReedIO\LogPond\Commands;

use ChrisReedIO\LogPond\Enums\LogLevels;
use ChrisReedIO\LogPond\Facades\LogPond;
use Illuminate\Console\Command;

class LogPondTestCommand extends Command
{
    public $signature = 'logpond:test';

    public $description = 'Tests the connection to your Log Pond server.';

    public function handle(): int
    {
        $response = LogPond::sites()->log(LogLevels::INFO->value, 'Test Log Entry', ['username' => 'testuser1']);
        $this->info('Response from Log Pond:');
        dump($response->json());
        $this->comment('All done');

        return self::SUCCESS;
    }
}
