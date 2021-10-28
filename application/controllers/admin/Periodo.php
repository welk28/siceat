<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periodo extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("guyu")) {
			redirect(base_url());
		}
		$this->load->model("Periodo_model");
	}
	public function index()
	{
		$data  = array(
			'periodos' => $this->Periodo_model->getPeriodos(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/periodo",$data);
		$this->load->view("layouts/footer");

	}
}
