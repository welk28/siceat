<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscribiendot extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("guyu")) {
			redirect(base_url());
		}
		$this->load->model("Inscribiendot_model");
	}
	public function index()	{
    $grado = $this->input->post("grado");
    $grupo = $this->input->post("grupo");
		$data  = array(
      'alumnos' => $this->Inscribiendot_model->getAlumnos($grado, $grupo),
			'horarios' => $this->Inscribiendot_model->getHorarios($grado, $grupo),
			'grado'=> $grado,
			'grupo'=> $grupo
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/inscribiendot",$data);
		$this->load->view("layouts/footer");

	}
}
