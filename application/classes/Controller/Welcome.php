<?php

class Controller_Welcome extends Controller {

	public function action_index()
	{
		//$this->response->body('Hellow nwn');
		$this->response->body(View::factory('login'));
	}

} // End Welcome
