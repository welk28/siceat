<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if ((!$this->session->userdata("guyu"))||($this->session->userdata("idr")!=5)) {
			redirect(base_url());
		}
    $this->load->model("su/Alumno_model_su");
    $this->load->model("su/Horarios_model_su");
    $this->load->model("Altatrim_model");
	}
	public function index()
	{
		$data  = array(
			'alumnos' => $this->Alumno_model_su->getAlumnos(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("su/alumno",$data);
		$this->load->view("layouts/footer");

  }
  public function bgpo(){
    $data  = array(
			'horario' => $this->Horarios_model_su->getHorarios()
		);
		$this->load->view("layouts/header");
		$this->load->view("su/bgpo",$data);
		$this->load->view("layouts/footer");
  }
  public function bgpolist(){
		$grado= $this->input->post("grado");
    $grupo= $this->input->post("grupo");
    $turno= $this->input->post("turno");
		
		$data  = array(
      'alumnos' => $this->Alumno_model_su->getAlumnosI($grado, $grupo, $turno),
      'horarios' => $this->Alumno_model_su->getHorarios($grado, $grupo, $turno),
      'act' =>  $this->Altatrim_model->activoTrimb(),
			'grado'=> $grado,
			'grupo'=> $grupo
		);
		$this->load->view("layouts/header");
		$this->load->view("su/bgpolist",$data);
		$this->load->view("layouts/footer");
	}
}
