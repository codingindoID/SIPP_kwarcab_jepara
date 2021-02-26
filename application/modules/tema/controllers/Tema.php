<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tema extends MY_Controller {
	public function index()
	{
		$this->load->view('index');
	}

	public function error()
	{
		$this->load->view('error');
	}
}
