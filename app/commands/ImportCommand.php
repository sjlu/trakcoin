<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ImportCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'importer';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Imports a bunch of data.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$classes = scandir(app_path('controllers/importers'));
		$ignore = array(
			'.',
			'..',
			'Importer.php',
			'BaseImporter.php'
		);
		$classes = array_diff($classes, $ignore);

		foreach ($classes as $class) {
			try {
				$class = str_replace('.php', '', $class);
				$class = new $class();
				$class->run();
			} catch (Exception $e) {
				Log::error('Issue with importer: ' . $class);
			}
		}
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array();
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array();
	}

}