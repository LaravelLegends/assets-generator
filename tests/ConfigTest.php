<?php

class ConfigTest extends Orchestra\Testbench\TestCase
{
    public function testConfig()
    {
        $paths = Config::get('assets-generator::config.paths');

        $this->assertEquals('public/js/', $paths['js']);

        $this->assertEquals('public/css/', $paths['css']);
    }

    protected function getPackageProviders($app = null)
    {
        return [
            'LaravelLegends\AssetsGenerator\Provider',
        ];
    }
}
