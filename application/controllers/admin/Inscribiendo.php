<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscribiendo extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("guyu")) {
			redirect(base_url());
		}
		$this->load->model("Inscribiendo_model");
	}
	public function index()	{
    $grado = $this->input->post("grado");
    $grupo = $this->input->post("grupo");
		$data  = array(
      'alumnos' => $this->Inscribiendo_model->getAlumnos($grado, $grupo),
			'horarios' => $this->Inscribiendo_model->getHorarios($grado, $grupo),
			'grado'=> $grado,
			'grupo'=> $grupo
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/inscribiendo",$data);
		$this->load->view("layouts/footer");

	}
}
