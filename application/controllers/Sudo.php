<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sudo extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Usuarios_model");
	}
	public function index()
	{
		if ($this->session->userdata("guyu")) {
			redirect(base_url()."panel");
		}
		else{
			$this->load->view("sudo");
		}
	}

	public function login(){
		$tipo = 5;
		$usuario = $this->input->post("usuario");
		$contra = $this->input->post("contra");
		$res = $this->Usuarios_model->login($tipo, $usuario, sha1($contra));
		$per= $this->Usuarios_model->periodo();
		if (!$res) {
			$this->session->set_flashdata("error","El usuario y/o contraseña son incorrectos");
			redirect(base_url()."sudo");
		}
		else{
			$data  = array(
				'personal' => $res->rfcp, 
				'nombre' => $res->nomp,
				'guyu' => TRUE,
				'turno'=> $res->turno,
				'idr'=> $res->idr,
				'tipo'=>$res->tipo,
				'periodo' => $per->idp, 
				'descper' => $per->descper
			);
			
			$this->session->set_userdata($data);

			redirect(base_url()."panel");
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function changepass(){
		$contra=$this->input->post("contra");
		$res=$this->Usuarios_model->changePass($contra);

		echo $res;
	}
}
