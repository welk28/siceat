<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materia extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("guyu")) {
			redirect(base_url());
		}
		$this->load->model("Materia_model");
	}
	public function index()
	{
		$data  = array(
			'materias' => $this->Materia_model->getMaterias(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/materia",$data);
		$this->load->view("layouts/footer");

	}

	public function addmat(){
		$idmat= $this->input->post("idmat");
		//echo $idmat;
		$nommat = $this->input->post("nommat");
		$grado =$this->input->post("grado");
		$status=$this->input->post("status");

		$res = $this->Materia_model->addMateria($idmat, $nommat, $grado, $status);

		echo $res;
	}

	public function modMateria(){
		$idmat= $this->input->post("idmat");
		$idmat2= $this->input->post("idmat2");
		//echo $idmat;
		$nommat = $this->input->post("nommat");
		$grado =$this->input->post("grado");
		$status=$this->input->post("status");

		$res = $this->Materia_model->modMateria($idmat, $nommat, $grado, $status, $idmat2);
		echo $res;
		//echo "idmat:".$idmat." idmat2:".$idmat2." nommat:".$nommat." grado:".$grado." status".$status;
	}
}
