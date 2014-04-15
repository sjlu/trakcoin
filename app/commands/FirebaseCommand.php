<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class FirebaseCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'firebase';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Transfer data to Firebase.';

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
    $sources = Source::all();
    $keyed_sources = array();
    foreach ($sources as $source) {
      $keyed_sources[$source['name']] = $source->toArray();
    }
    Curl::rawPut("https://trakcoin.firebaseio.com/sources.json", json_encode($keyed_sources));
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
