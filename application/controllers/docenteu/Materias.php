<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materias extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if ((!$this->session->userdata("guyu"))||($this->session->userdata("idr")!=3)) {
			redirect(base_url());
		}
		$this->load->model("Docenteu_model");
		$this->load->model("Altatrim_model");
		$this->load->model("Docente_model");
	}
	public function index()
	{
		$data = array(
			'materias' =>  $this->Docenteu_model->matedoc()
		);
		$this->load->view("layouts/header");
		$this->load->view("docente/materias",$data);
		$this->load->view("layouts/footer");

	}
	public function lista(){
		$idh = $this->input->post("idh");
		$data = array(
			'domat' =>  $this->Docenteu_model->docentemat($idh),
			'alumnos' =>  $this->Docenteu_model->gpomat($idh)
		);
		$this->load->view("layouts/header");
		$this->load->view("docente/lista",$data);
		$this->load->view("layouts/footer");
	}

	public function addcal(){
		$idh = $this->input->post("idh");
	
		$data = array(
			'domat' =>  $this->Docenteu_model->docentemat($idh),
			'alumnos' =>  $this->Docenteu_model->gpomatcursa($idh),
			'act' =>  $this->Altatrim_model->activoTrim(),
			'taller' =>$this->Docente_model->matTaller($idh)
		);
		$this->load->view("layouts/header");
		$this->load->view("docente/addcal",$data);
		$this->load->view("layouts/footer");
	}
	public function califica(){
		$idh = $this->input->post("idh");
		$matricula = $this->input->post("matricula");
		$tr1 = $this->input->post("tr1");
		$tr2 = $this->input->post("tr2");
		$tr3 = $this->input->post("tr3");
		$trim= $this->input->post("trim");

		if($trim==1){
			$resp= $this->Docenteu_model->califica1($idh, $matricula, $tr1 );
		}else{
			if($trim==2){
				$resp= $this->Docenteu_model->califica2($idh, $matricula, $tr2 );
			}else{
				if($trim==3){
					$resp= $this->Docenteu_model->califica3($idh, $matricula, $tr3 );
				}else{
					if($trim==4){
						$resp= $this->Docenteu_model->califica1($idh, $matricula, $tr1 );
						$resp= $this->Docenteu_model->califica2($idh, $matricula, $tr2 );
						$resp= $this->Docenteu_model->califica1($idh, $matricula, $tr3 );
					}
				}
			}
		}
		echo $resp;
	}
	public function password(){
		
		$this->load->view("layouts/header");
		$this->load->view("docente/password");
		$this->load->view("layouts/footer");
	}




	
}
//echo "idh: ".$idh." tr1: ".$tr1." tr2: ".$tr2." tr3:".$tr3." matricula: ".$matricula." trim".$trim;