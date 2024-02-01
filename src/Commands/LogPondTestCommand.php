<?php

namespace ChrisReedIO\LogPond\Commands;

use ChrisReedIO\LogPond\LogPondConnector;
use ChrisReedIO\LogPond\Requests\PostSiteLogEntryRequest;
use Illuminate\Console\Command;

class LogPondTestCommand extends Command
{
    public $signature = 'logpond:test';

    public $description = 'Tests the connection to your Log Pond server.';

    public function handle(): int
    {
        $connector = new LogPondConnector('MY-SECRET-KEY', 'logpond-app.local.winux.io');
        $request = new PostSiteLogEntryRequest(1, ['message' => 'Hello, Log Pond!']);
        $response = $connector->send($request);
        $this->info('Response from Log Pond:');
        dump($response->json());
        $this->comment('All done');

        return self::SUCCESS;
    }
}
