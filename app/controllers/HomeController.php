<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome() {
		$data = array();
		$sources = Source::with('currency')->get();
		foreach ($sources as $source) {
			$currency = $source->currency;
			if (!isset($data[$currency->name])) {
				$data[$currency->name] = array();
			}
			$data[$currency->name][$source->name] = $source;
		}

		return View::make('hello', array(
			'data' => $data
		));
	}

}