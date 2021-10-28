<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Taller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("guyu")) {
			redirect(base_url());
		}
		$this->load->model("Taller_model");
	}
	public function index()
	{
		$data  = array(
			'taller' => $this->Taller_model->getTaller(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/taller",$data);
		$this->load->view("layouts/footer");

	}

	public function addtaller(){
		$idt= $this->input->post("idt");
		//echo $idmat;
		$nomt = $this->input->post("nomt");

		$res = $this->Taller_model->addtaller($idt, $nomt);

		echo $res;
	}

	public function Modtaller(){
		$idt= $this->input->post("idt");
		$idt2=$this->input->post("idt2");
		//echo $idmat;
		$nomt = $this->input->post("nomt");

		$res = $this->Taller_model->Modtaller($idt, $nomt, $idt2);

		echo $res;
	}
}
