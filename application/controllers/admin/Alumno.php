<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumno extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("guyu")) {
			redirect(base_url());
		}
		$this->load->model("Alumno_model");
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
	public function allumno(){
		$data = array(
			'alumno' => $this->Alumno_model->getTodos()
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/allumno",$data);
		$this->load->view("layouts/footer");
	}
	public function alumnoAdd(){
		$data = array(
			'taller' => $this->Alumno_model->getTalleres(),
			'grupo' => $this->Alumno_model->grupo1()
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/alumadd",$data);
		$this->load->view("layouts/footer");
	}
	public function addAlumno(){
		$matricula= $this->input->post("matricula");
		$app= $this->input->post("app");
		$apm= $this->input->post("apm");
		$nom= $this->input->post("nom");
		$curp= $this->input->post("curp");
		$sexo= $this->input->post("sexo");
		$fecnac= $this->input->post("fecnac");
		$telal= $this->input->post("telal");
		$email= $this->input->post("email");
		$calle= $this->input->post("calle");
		$colonia= $this->input->post("colonia");
		$ciudad= $this->input->post("ciudad");
		$nomtut= $this->input->post("nomtut");
		$teltut= $this->input->post("teltut");
		$dirtut= $this->input->post("dirtut");
		$turno= $this->input->post("turno");
		$grado= $this->input->post("grado");
		$grupo= $this->input->post("grupo");
		$idt= $this->input->post("idt");
		
		$res = $this->Alumno_model->addAlumno($matricula,$app,$apm,$nom,$curp,$sexo,$fecnac,$telal,$email,$calle,$colonia,$ciudad,$nomtut,$teltut,$dirtut,$turno,$grado,$grupo, $idt);

		echo $res;
	}
	
	public function updateAlumno(){
		$matricula2= $this->input->post("matricula2");
		$matricula= $this->input->post("matricula");
		$app= $this->input->post("app");
		$apm= $this->input->post("apm");
		$nom= $this->input->post("nom");
		$curp= $this->input->post("curp");
		$sexo= $this->input->post("sexo");
		$fecnac= $this->input->post("fecnac");
		$telal= $this->input->post("telal");
		$email= $this->input->post("email");
		$calle= $this->input->post("calle");
		$colonia= $this->input->post("colonia");
		$ciudad= $this->input->post("ciudad");
		$nomtut= $this->input->post("nomtut");
		$teltut= $this->input->post("teltut");
		$dirtut= $this->input->post("dirtut");
		$turno= $this->input->post("turno");
		$grado= $this->input->post("grado");
		$grupo= $this->input->post("grupo");
		$idt= $this->input->post("idt");
		
		$res = $this->Alumno_model->updateAlumno($matricula2,$matricula,$app,$apm,$nom,$curp,$sexo,$fecnac,$telal,$email,$calle,$colonia,$ciudad,$nomtut,$teltut,$dirtut,$turno,$grado,$grupo, $idt);

		echo $res;
	}
	public function boleta(){
		$matricula= $this->input->post("matricula");
		$data = array(
			'alu' => $this->Alumno_model->getAlumno($matricula),
			'boleta' => $this->Alumno_model->materiasBoleta($matricula)
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/boleta",$data);
		$this->load->view("layouts/footer");
	}
	public function boletamod(){
		$matricula= $this->input->post("matricula");
		$data = array(
			'alu' => $this->Alumno_model->getAlumno($matricula),
			'boleta' => $this->Alumno_model->materiasBoleta($matricula)
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/boletamod",$data);
		$this->load->view("layouts/footer");
	}
	public function Horalumno(){
		$matricula= $this->input->post("matricula");
		$data = array(
			'alu' => $this->Alumno_model->getAlumno($matricula),
			'horario' => $this->Alumno_model->Horalumno($matricula)
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/horalumno",$data);
		$this->load->view("layouts/footer");
	}
	public function vaciar(){
		$matricula= $this->input->post("matricula");
		$idhs=$this->Alumno_model->Veridhs($matricula);
		//print_r($idhs);
		if($idhs){
			foreach ($idhs as $idh ) {
				$quita=$this->Alumno_model->HoraVaciar($idh->idh, $matricula);
			}
		}
		$data = array(
			'alu' => $this->Alumno_model->getAlumno($matricula),
			'horario' => $this->Alumno_model->Horalumno($matricula)
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/horalumno",$data);
		$this->load->view("layouts/footer");
	}
	public function cargaHorario(){
		$matricula= $this->input->post("matricula");
		$grado= $this->input->post("grado");
		$grupo= $this->input->post("grupo");
		$idt= $this->input->post("idt");
		//verificar si está cargado horario
		$inscrito= $this->Alumno_model->verifInscr($matricula);
		$taller= $this->Alumno_model->TallerActual($grado, $idt);
		if($inscrito==0){
			$inscribe = $this->Alumno_model->getHorarios($grado, $grupo);
			//print_r($inscribe);
			foreach ($inscribe as $h) {
				$agregado= $this->Alumno_model->guardaCursa($h->idh, $matricula);
			}
			$agregado= $this->Alumno_model->guardaCursa($taller->idh, $matricula);
		}
		//invocar al modelo y funcion que inscribe al alumno en el grupo especificado
		//print_r($inscrito);
		//invocar al modelo y funcion que inscriba al alumno en el taller correspondiente

		//volver al horario del alumno
		$data = array(
			'alu' => $this->Alumno_model->getAlumno($matricula),
			'horario' => $this->Alumno_model->Horalumno($matricula),
			'grado'=> $grado,
			'grupo'=> $grupo
		);

		$this->load->view("layouts/header");
		$this->load->view("admin/horalumno",$data);
		$this->load->view("layouts/footer");
	}
	public function inscribeGrupo(){
		$grado= $this->input->post("grado");
		$grupo= $this->input->post("grupo");
		
		$data  = array(
      'alumnos' => $this->Alumno_model->getAlumnosI($grado, $grupo),
			'horarios' => $this->Alumno_model->getHorarios($grado, $grupo),
			'grado'=> $grado,
			'grupo'=> $grupo
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/addgpo",$data);
		$this->load->view("layouts/footer");
	}

	public function inscribeTaller(){
		$grado= $this->input->post("grado");
		$idh= $this->input->post("idh");
		$nommat= $this->input->post("nommat");
		$idmat= $this->input->post("idmat");
		
		$data  = array(
      'alumnos' => $this->Alumno_model->getAlumnosT($idmat, $grado),
			'grado'=> $grado,
			'nommat'=> $nommat,
			'idh'=> $idh
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/addtaller",$data);
		$this->load->view("layouts/footer");
	}

	
	public function vaciarTaller(){
		$idh= $this->input->post("idh");
			$quita=$this->Alumno_model->Vaciaidh($idh);
		echo $quita;
	}

	public function datos(){
		$matricula= $this->input->post("matricula");
		$data = array(
			'a' => $this->Alumno_model->getAlumno($matricula),
			'taller' => $this->Alumno_model->getTalleres(),
			'grupo' => $this->Alumno_model->grupo($matricula)
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/alumoinfo",$data);
		$this->load->view("layouts/footer");
	}
	public function boletas(){
		
		$data = array(
			'alu' => $this->Alumno_model->getAlumno($matricula),
			'boleta' => $this->Alumno_model->materiasBoleta($matricula)
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/boletas",$data);
		$this->load->view("layouts/footer");
	}
	public function boletagpo(){
		
		$data = array(
			'alu' => $this->Alumno_model->getAlumno($matricula),
			'boleta' => $this->Alumno_model->materiasBoleta($matricula)
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/boletagpo",$data);
		$this->load->view("layouts/footer");
	}
}
