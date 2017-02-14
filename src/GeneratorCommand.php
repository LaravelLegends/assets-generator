<?php

namespace LaravelLegends\AssetsGenerator;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

/**
*
* Generate JS and CSS files basead on "path" passed
*
* @author Wallace de Souza Vizerra <wallacemaxters@gmail.com>
*/

class GeneratorCommand extends Command
{

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'generate:assets';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Gerenerate JS and CSS files';


	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{

		$path = $this->argument('path');

		$forceOverwrite = $this->option('forceOverwrite');

		$file = $this->laravel['files'];

		$config = $this->laravel['config'];

		$folders = $config->get('assets-generator::config.paths') ?: [];

		$stubs = $config->get('assets-generator::config.stubs');

		foreach ($folders as $ext => $folder) {

			$name = $path . '.' . $ext;

			$filename = rtrim($folder, '/') . '/' . $name;

			$dir = dirname($filename);

			$file->exists($dir) || $file->makeDirectory($dir, 0777, true);

			// If file exists, ask for confirmation

			if ($file->exists($filename) && ! $forceOverwrite) {
				$this->info("skipping {$name}");
				continue;
			}

			$content = '';

			if (isset($stubs[$ext]) && $file->exists($stubs[$ext])) {
				$content = $file->get($stubs[$ext]);
			}

			$file->put($filename, $content);

			$this->info("File {$filename} created");

		}

	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('path', InputArgument::REQUIRED, 'Path of CSS and Javascript assets'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
      		array(
				'forceOverwrite',
				null,
				InputOption::VALUE_OPTIONAL,
        		'An example option.',
				null
			),
    	);
	}

}
