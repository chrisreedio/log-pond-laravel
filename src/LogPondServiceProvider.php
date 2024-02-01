<?php

namespace ChrisReedIO\LogPond;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use ChrisReedIO\LogPond\Commands\LogPondTestCommand;

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
            ->name('log-pond-laravel')
            // ->hasConfigFile()
            // ->hasViews()
            // ->hasMigration('create_log-pond-laravel_table')
            ->hasCommand(LogPondTestCommand::class);
    }
}
