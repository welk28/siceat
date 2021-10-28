<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aspirante extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		//$this->load->model("Horario_model");
	}
	public function index()
	{
		$this->load->view("layouts/header");
		$this->load->view("admin/aspirante/add");
		$this->load->view("layouts/footer");
	}
}
