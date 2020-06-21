<?php

class Controller_Hello extends Controller {

	public function action_index()
	{
		$this->response->body('Start my first step');
	}

} // End Welcome
