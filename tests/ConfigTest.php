<?php

class ConfigTest extends Orchestra\Testbench\TestCase
{
    public function testConfig()
    {
        $paths = Config::get('assets-generator::config.paths');

        $this->assertTrue(isset($paths['js'], $paths['css']));
    }

    protected function getPackageProviders($app = null)
    {
        return [
            'LaravelLegends\AssetsGenerator\Provider',
        ];
    }
}
