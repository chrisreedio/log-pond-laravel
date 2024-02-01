<?php

namespace ChrisReedIO\LogPond;

use ChrisReedIO\LogPond\Commands\LogPondTestCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LogPondServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-logpond')
            ->hasConfigFile('logpond')
            // ->hasViews()
            // ->hasMigration('create_log-pond-laravel_table')
            ->hasCommand(LogPondTestCommand::class);
    }
}
