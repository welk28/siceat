<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Horariost extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("guyu")) {
			redirect(base_url());
		}
		$this->load->model("Horariost_model");
	}
	public function index()
	{
		$data  = array(
			'horario' => $this->Horariost_model->getHorarios()
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/horariost",$data);
		$this->load->view("layouts/footer");

	}
}
