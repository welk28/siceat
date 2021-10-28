<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("guyu")) {
			redirect(base_url());
		}
	}
	public function index()
	{
		$this->load->view("layouts/header");
		$this->load->view("panel");
		$this->load->view("layouts/footer");

	}
}
