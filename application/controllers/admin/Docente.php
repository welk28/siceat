<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docente extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("guyu")) {
			redirect(base_url());
		}
		$this->load->model("Docente_model");
		$this->load->model("Altatrim_model");
	}
	public function index()
	{
		$data  = array(
			'docentes' => $this->Docente_model->getDocente(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/docente",$data);
		$this->load->view("layouts/footer");

	}

	public function materias(){
		$data = array(
			'docentes' =>  $this->Docente_model->getDocencurso()
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/docmaterias",$data);
		$this->load->view("layouts/footer");
	}

	public function matedoc(){
		$rfcp = $this->input->post("rfcp");
		$data = array(
			'docente' =>  $this->Docente_model->docente($rfcp),
			'materias' =>  $this->Docente_model->matedoc($rfcp)
		
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/matedoc",$data);
		$this->load->view("layouts/footer");
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

	public function addDocente(){
		$rfcp= $this->input->post("rfcp");
		$nomp= $this->input->post("nomp");
		$contra = $this->input->post("contra");
		$uno = $this->input->post("uno");
		$dos = $this->input->post("dos");
		$tres = $this->input->post("tres");
		$cuatro= $this->input->post("cuatro");
		$turno = $this->input->post("turno");
					
		//echo "uno: ".$uno." Dos: ".$dos." Tres: ".$tres." Cuatro:".$cuatro;

		$res = $this->Docente_model->addDocente($rfcp, $nomp, $turno, sha1($contra));

		if(!empty($uno)){
			$uno = $this->Docente_model->addPermisos($rfcp, $uno);
		}
		if(!empty($dos)){
			$dos = $this->Docente_model->addPermisos($rfcp, $dos);
		}
		if(!empty($tres)){
			$tres = $this->Docente_model->addPermisos($rfcp, $tres);
		}
		if(!empty($cuatro)){
			$cuatro = $this->Docente_model->addPermisos($rfcp, $cuatro);
		}

		echo $res;
	}

	public function addcal(){
		$idh = $this->input->post("idh");
		$rfcp = $this->input->post("rfcp");
		$data = array(
			'domat' =>  $this->Docente_model->docentemat($idh),
			'alumnos' =>  $this->Docente_model->gpomatcursa($idh),
			'act' =>  $this->Altatrim_model->activoTrim(),
			'taller' =>$this->Docente_model->matTaller($idh)
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/addcal",$data);
		$this->load->view("layouts/footer");
	}

	public function califica(){
		$idh = $this->input->post("idh");
		$matricula = $this->input->post("matricula");
		$tr1 = $this->input->post("tr1");
		$tr2 = $this->input->post("tr2");
		$tr3 = $this->input->post("tr3");
		$trim= $this->input->post("trim");
		$fa1 = $this->input->post("fa1");
		$fa2 = $this->input->post("fa2");
		$fa3 = $this->input->post("fa3");
		$prom = $this->input->post("prom");
		// $prom = 0;

		// $prom=($tr1+$tr2+$tr3)/3;

		if($trim==1){
			$resp= $this->Docente_model->califica1($idh, $matricula, $tr1, $fa1, $prom );
		}else{
			if($trim==2){
				$resp= $this->Docente_model->califica2($idh, $matricula, $tr2, $fa2, $prom );
			}else{
				if($trim==3){
					$resp= $this->Docente_model->califica3($idh, $matricula, $tr3, $fa3, $prom );
				}else{
					if($trim==4){
						$resp= $this->Docente_model->califica1($idh, $matricula, $tr1, $prom );
						$resp= $this->Docente_model->califica2($idh, $matricula, $tr2, $prom );
						$resp= $this->Docente_model->califica3($idh, $matricula, $tr3, $prom );
					}
				}
			}
		}
		echo $resp;
	}

	public function updateDoc(){
		$mrfcp = $this->input->post("mrfcp");
		$mrfcp2 = $this->input->post("mrfcp2");
		$mnomp=$this->input->post("mnomp");
		$mcontra=$this->input->post("mcontra");
		$uno=$this->input->post("uno");
		$dos=$this->input->post("dos");
		$tres=$this->input->post("tres");
		$cuatro=$this->input->post("cuatro");

		$mturno=$this->input->post("mturno");

		//echo $mrfcp." / ".$mrfcp2." / ".$mnomp." / ".$mcontra." / ".$uno." / ".$dos." / ".$tres." / ".$cuatro." / ".$mturno;

		//primero modificar los datos en tabla personal
		$resp= $this->Docente_model->updateDoc($mrfcp, $mrfcp2, $mnomp, $mturno, $mcontra);
		//si administrador está activo insertar o activar

		//si no, solo desactivar
		if(!empty($uno)){
			$runo = $this->Docente_model->addPermisos($mrfcp, $uno);
			$runo = $this->Docente_model->updatePermisos1($mrfcp, $uno);
		}else{
			$uno=1;
			$uno = $this->Docente_model->updatePermisos($mrfcp, $uno);
		}
		if(!empty($dos)){
			$rdos = $this->Docente_model->addPermisos($mrfcp, $dos);
			$rdos = $this->Docente_model->updatePermisos1($mrfcp, $dos);
		}else{
			$dos=2;
			$dos = $this->Docente_model->updatePermisos($mrfcp, $dos);
		}
		if(!empty($tres)){
			$rtres = $this->Docente_model->addPermisos($mrfcp, $tres);
			$rtres = $this->Docente_model->updatePermisos1($mrfcp, $tres);
		}else{
			$tres=3;
			$tres = $this->Docente_model->updatePermisos($mrfcp, $tres);
		}
		if(!empty($cuatro)){
			$rcuatro = $this->Docente_model->addPermisos($mrfcp, $cuatro);
			$rcuatro = $this->Docente_model->updatePermisos1($mrfcp, $cuatro);
		}else{
			$cuatro=4;
			$cuatro = $this->Docente_model->updatePermisos($mrfcp, $cuatro);
		}
		echo $resp;
	}
	
}
//echo "idh: ".$idh." tr1: ".$tr1." tr2: ".$tr2." tr3:".$tr3." matricula: ".$matricula." trim".$trim;
