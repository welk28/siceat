<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Horarios extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if ((!$this->session->userdata("guyu"))||($this->session->userdata("idr")!=5)) {
			redirect(base_url());
		}
		$this->load->model("su/Horarios_model_su");
	}
	public function index()
	{
		$data  = array(
			'horario' => $this->Horarios_model_su->getHorarios()
		);
		$this->load->view("layouts/header");
		$this->load->view("su/horarios",$data);
		$this->load->view("layouts/footer");

	}
}
