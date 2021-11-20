<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Horario extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("guyu")) {
			redirect(base_url());
		}
		$this->load->model("Horario_model");
		$this->load->model("Alumno_model");
	}
	public function index()
	{
		$data  = array(
			'horario' => $this->Horario_model->getHorarios()
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/horario",$data);
		$this->load->view("layouts/footer");

	}
	public function addhrsearch(){
		$this->load->view("layouts/header");
		$this->load->view("admin/addhrsearch");
		$this->load->view("layouts/footer");
	}
	public function getGrupo(){
		$grado=$this->input->post('grado');
		if($grado){
			$grupos=$this->Horario_model->getGrupo($grado);
			echo'<option value="">Seleccione</option>';
			foreach($grupos as $grupo){
				echo"<option value='$grupo[idg]'>$grupo[grupo]</option>";
			}
		}
		
	}
	public function getMateriash(){
		$idg=$this->input->post('idg');
		//buscar las materias que no tenga dadas de alta en el horario

		if($idg){
			$materias=$this->Horario_model->getMateriash($idg);
			echo'<option value="">Seleccione</option>';
			foreach($materias as $materia){
				echo"<option value='$materia[idmat]'>$materia[idmat] / $materia[nommat]</option>";
			}
		}
	}

	public function getDocentes(){
		$docentes=$this->Horario_model->getDocentes();
		echo'<option value="">Seleccione</option>';
		foreach($docentes as $docente){
			echo"<option value='$docente[rfcp]'>$docente[rfcp] / $docente[nomp]</option>";
		}
	}
	
	public function addHorario(){
		$idg= $this->input->post('idg');
		$idmat= $this->input->post('idmat');
		$rfcp= $this->input->post('rfcp');

		//Buscar el registro, si ya cuenta con él, buscar datos y solo mostrar la consulta, SI NO, guardar
		$buscaregistro=$this->Horario_model->getRegistro($idg, $idmat, $rfcp);
		if($buscaregistro>0){
			$data =array(
				'horario' => $this->Horario_model->buscaHdatos2($idg, $idmat, $rfcp),
				'semana' => $this->Horario_model->getSemana(),
				'reloj' => $this->Horario_model->getReloj()
			);
		}else{
			$oidh= $this->Horario_model->getIdh();
			$idh=$oidh->val+1;
			$guarda=$this->Horario_model->agregaHr($idh, $idg, $idmat, $rfcp);
		
			$data =array(
				'horario' => $this->Horario_model->buscaHdatos($idh),
				'semana' => $this->Horario_model->getSemana(),
				'reloj' => $this->Horario_model->getReloj()
			);
		}
		
		$this->load->view("layouts/header");
		$this->load->view("admin/adddaytime",$data);
		$this->load->view("layouts/footer");
	}

	public function saveHoradia(){
		$idh= $this->input->post('aidh');
		$idia= $this->input->post('aidia');
		$idr= $this->input->post('aidr');
		$existe= $this->Horario_model->usoHrdia($idh, $idia, $idr);
		if($existe>0){
			$res = $this->Horario_model->removeHoradia($idh, $idia, $idr);
		}else{
			$res = $this->Horario_model->addHoradia($idh, $idia, $idr);
		}
		
		echo $res;
	}
	public function showUpdate(){
		$idh= $this->input->post('idh');
		$grado= $this->input->post('grado');
		$idg= $this->input->post('idg');

		$data =array(
			'horario' => $this->Horario_model->showUpdate($idh),
			'grupos' => $this->Horario_model->getGrupo2($grado),
			'materias' => $this->Horario_model->getMateriash2($idg),
			'docentes' => $this->Horario_model->getDocentes2()
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/showupdate",$data);
		$this->load->view("layouts/footer");
	}
	public function updateHr(){
		$idg=$this->input->post('idg');
		$idmat=$this->input->post('idmat');
		$rfcp=$this->input->post('rfcp');
		$idh=$this->input->post('idh');

		$actualiza= $this->Horario_model->updateHr($idh, $idmat, $rfcp, $idg);
		$data =array(
			'horario' => $this->Horario_model->buscaHdatos2($idg, $idmat, $rfcp),
			'semana' => $this->Horario_model->getSemana(),
			'reloj' => $this->Horario_model->getReloj()
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/adddaytimes",$data);
		$this->load->view("layouts/footer");
	}

	public function deleteHr(){
		$idh=$this->input->post('idh');
		$res= $this->Horario_model->deleteHr($idh);

		echo $res;
	}
	public function inscgpo(){
		$idh= $this->input->post('idh');
		$idmat= $this->input->post('idmat');
		$grado= $this->input->post('grado');
		$idg= $this->input->post('idg');
		//buscar datos de la materia


	
		$data =array(
			'alumnos' => $this->Horario_model->buscalumnos($grado,$idg),
			'materia' => $this->Horario_model->datosmateria($idmat,$idh),
			'grado' => $grado,
			'grupo' => $idg,
			'idh' => $idh
		);
		
		$this->load->view("layouts/header");
		$this->load->view("admin/igrupo",$data);
		$this->load->view("layouts/footer");
	}
}
