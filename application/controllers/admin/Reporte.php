<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("guyu")) {
			redirect(base_url());
		}
    $this->load->model("Alumno_model");
    $this->load->model("Horarios_model");
		$this->load->model("Altatrim_model");
		$this->load->model("Reportes_model");
	}
	public function index()
	{
		$data  = array(
			'alumnos' => $this->Alumno_model->getAlumnos(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/alumno",$data);
		$this->load->view("layouts/footer");

  }
  public function bgpo(){
    $data  = array(
			'horario' => $this->Horarios_model->getHorarios()
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/bgpo",$data);
		$this->load->view("layouts/footer");
  }
  public function bgpolist(){
		$grado= $this->input->post("grado");
		$grupo= $this->input->post("grupo");
		
		$data  = array(
      'alumnos' => $this->Alumno_model->getAlumnosI($grado, $grupo),
      'horarios' => $this->Alumno_model->getHorarios($grado, $grupo),
      'act' =>  $this->Reportes_model->activoTrimb(),
			'grado'=> $grado,
			'grupo'=> $grupo
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/bgpolist",$data);
		$this->load->view("layouts/footer");
	}
	public function eaprob(){
		//periodo en cuestion
		//materias totales
		//taller
		//artes
		//vida saludable
		//tutoria en educacion
	
		$data  = array(
			'materias' => $this->Reportes_model->AprobMaterias(),
			'trim' => $this->Reportes_model->activoTrimb(),
			'primero' => $this->Reportes_model->AlumosPrimero(),
			'segundo' => $this->Reportes_model->AlumosSegundo(),
			'tercero' => $this->Reportes_model->AlumosTercero()
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/eaprob",$data);
		$this->load->view("layouts/footer");
	}

	
}
