<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
        $this->load->view('css');
		$this->load->view('header');
		$this->load->view('banner');
		$this->load->view('navbar');
		$this->load->view('home_view');
		$this->load->view('footer');
        $this->load->view('js');
	}
}