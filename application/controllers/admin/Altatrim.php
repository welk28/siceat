<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Altatrim extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("guyu")) {
			redirect(base_url());
		}
		$this->load->model("Altatrim_model");
	}
	public function index()
	{
		$data = array(
      'trim' =>  $this->Altatrim_model->getTrim(),
			'act' =>  $this->Altatrim_model->activoTrim(),
			'act2' =>  $this->Altatrim_model->activoTrim2()
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/altatrim",$data);
		$this->load->view("layouts/footer");

    }
    
    public function updateTrim(){
			$trm = $this->input->post("trm");
			$res=$this->Altatrim_model->updateTrim($trm);
			
			echo $res;
      //redirect(base_url()."admin/altatrim");		
		}
		public function updateTrimcons(){
			$trm = $this->input->post("trm");
			$res=$this->Altatrim_model->updateTrimcon($trm);
			
			echo $res;
      //redirect(base_url()."admin/altatrim");		
		}

	public function listagpomat(){
		$idh = $this->input->post("idh");
		$rfcp = $this->input->post("rfcp");
		$data = array(
			'domat' =>  $this->Docente_model->docentemat($idh),
			'alumnos' =>  $this->Docente_model->gpomat($idh)
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/listagpomat",$data);
		$this->load->view("layouts/footer");
	}

	

	
}
