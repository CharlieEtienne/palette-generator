<?php

namespace CharlieEtienne\PaletteGenerator;

use Illuminate\Support\ServiceProvider;

class PaletteGeneratorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('palette-generator', function () {
            return new PaletteGenerator();
        });
    }
}