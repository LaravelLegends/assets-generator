<?php

class GeneratorTest extends Orchestra\Testbench\TestCase
{
    protected function getPackageProviders()
    {
        return [
            'LaravelLegends\AssetsGenerator\Provider',
        ];
    }


    public function test()
    {
        chdir(__DIR__);

        $this->app['config']->set('assets-generator::config.paths', [
            'js' =>   'temp/public/js',
            'css' =>  'temp/public/css'
        ]);

        $this->app['config']->set('assets-generator::config.stubs', [
            'js' =>   __DIR__ . '/../stubs/js.txt',
            'css' =>  __DIR__ . '/../stubs/css.txt',
        ]);

        $this->app['artisan']->call('generate:assets', [
            'path' => 'testing/file'
        ]);


        $this->assertTrue(file_exists(__DIR__ . '/temp/public/css/testing/file.css'));

        $this->assertTrue(file_exists(__DIR__ . '/temp/public/js/testing/file.js'));
    }


}
