<?php

namespace HL\HiloxaTrigger;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class HiloxaTriggerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('hiloxa-trigger')
            ->hasConfigFile();
    }

    public function bootingPackage()
    {
        $this->app->register(HiloxaTriggerEventServiceProvider::class);
    }

}
