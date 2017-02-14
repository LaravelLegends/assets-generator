<?php

namespace LaravelLegends\AssetsGenerator;

use Illuminate\Support\ServiceProvider;

class Provider extends ServiceProvider
{
    public function boot()
    {
        $this->package(
            'laravellegends/assets-generator',
            'assets-generator',
             __DIR__ . '/..'
        );

    }

    public function register()
    {
        $this->app['artisan']->add(new GeneratorCommand);
    }
}
