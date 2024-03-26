<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	public function index()
	{
        $this->load->view('css');
        $this->load->view('header');
		$this->load->view('banner');
		$this->load->view('navbar');
		$this->load->view('register_view');
		$this->load->view('footer');
        $this->load->view('js');
	}
    public function adding()
	{
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
	}
public function login()
	{
        $this->load->view('css');
        $this->load->view('header');
		$this->load->view('banner');
		$this->load->view('navbar');
		$this->load->view('login_view');
		$this->load->view('footer');
        $this->load->view('js');
	}
    public function showlogin()
	{
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
	}
}