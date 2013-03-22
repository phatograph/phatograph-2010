<?php

class Signout extends Controller {
	
	function Signout()
	{
		parent::Controller();
	}
	
	function index()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}