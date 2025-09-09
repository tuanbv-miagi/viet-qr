<?php

namespace miagi\VietQr;

use miagi\VietQr\Commands\VietQrCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class VietQrServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('vietqr')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_vietqr_table')
            ->hasCommand(VietQrCommand::class);
    }
}
