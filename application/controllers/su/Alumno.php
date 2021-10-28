<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumno extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if ((!$this->session->userdata("guyu"))||($this->session->userdata("idr")!=5)) {
			redirect(base_url());
		}
		$this->load->model("su/Alumno_model_su");
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

	public function alumnoAdd(){
		$data = array(
			'taller' => $this->Alumno_model_su->getTalleres(),
			'grupo' => $this->Alumno_model_su->grupo1()
		);
		$this->load->view("layouts/header");
		$this->load->view("su/alumadd",$data);
		$this->load->view("layouts/footer");
	}

	public function allumno(){
		$data = array(
			'alumno' => $this->Alumno_model_su->getTodos()
		);
		$this->load->view("layouts/header");
		$this->load->view("su/allumno",$data);
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
		
		$res = $this->Alumno_model_su->addAlumno($matricula,$app,$apm,$nom,$curp,$sexo,$fecnac,$telal,$email,$calle,$colonia,$ciudad,$nomtut,$teltut,$dirtut,$turno,$grado,$grupo, $idt);

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
		
		$res = $this->Alumno_model_su->updateAlumno($matricula2,$matricula,$app,$apm,$nom,$curp,$sexo,$fecnac,$telal,$email,$calle,$colonia,$ciudad,$nomtut,$teltut,$dirtut,$turno,$grado,$grupo, $idt);

		echo $res;
	}
	public function boleta(){
		$matricula= $this->input->post("matricula");
		$data = array(
			'alu' => $this->Alumno_model_su->getAlumno($matricula),
			'boleta' => $this->Alumno_model_su->materiasBoleta($matricula)
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/boleta",$data);
		$this->load->view("layouts/footer");
	}
	public function Horalumno(){
		$matricula= $this->input->post("matricula");
		$data = array(
			'alu' => $this->Alumno_model_su->getAlumno($matricula),
			'horario' => $this->Alumno_model_su->Horalumno($matricula)
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/horalumno",$data);
		$this->load->view("layouts/footer");
	}
	public function vaciar(){
		$matricula= $this->input->post("matricula");
		$idhs=$this->Alumno_model_su->Veridhs($matricula);
		foreach ($idhs as $idh ) {
			$quita=$this->Alumno_model_su->HoraVaciar($idh->idh, $matricula);
		}
		echo $quita;
	}

	public function inscribeGrupo(){
		$grado= $this->input->post("grado");
		$grupo= $this->input->post("grupo");
		$turno= $this->input->post("turno");
		
		$data  = array(
      'alumnos' => $this->Alumno_model_su->getAlumnosI($grado, $grupo, $turno),
			'horarios' => $this->Alumno_model_su->getHorarios($grado, $grupo, $turno),
			'grado'=> $grado,
			'grupo'=> $grupo,
			'turno'=> $turno
		);
		$this->load->view("layouts/header");
		$this->load->view("su/addgpo",$data);
		$this->load->view("layouts/footer");
	}

	public function inscribeTaller(){
		$grado= $this->input->post("grado");
		$idh= $this->input->post("idh");
		$nommat= $this->input->post("nommat");
		$idmat= $this->input->post("idmat");
		$turno= $this->input->post("turno");
		
		$data  = array(
      'alumnos' => $this->Alumno_model_su->getAlumnosT($idmat, $grado, $turno),
			'grado'=> $grado,
			'nommat'=> $nommat,
			'idh'=> $idh,
			'turno'=> $turno
		);
		$this->load->view("layouts/header");
		$this->load->view("su/addtaller",$data);
		$this->load->view("layouts/footer");
	}

	
	public function vaciarTaller(){
		$idh= $this->input->post("idh");
			$quita=$this->Alumno_model_su->Vaciaidh($idh);
		echo $quita;
	}

	public function datos(){
		$matricula= $this->input->post("matricula");
		$data = array(
			'a' => $this->Alumno_model_su->getAlumno($matricula),
			'taller' => $this->Alumno_model_su->getTalleres(),
			'grupo' => $this->Alumno_model_su->grupo($matricula)
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/alumoinfo",$data);
		$this->load->view("layouts/footer");
	}
	public function boletas(){
		
		$data = array(
			'alu' => $this->Alumno_model_su->getAlumno($matricula),
			'boleta' => $this->Alumno_model_su->materiasBoleta($matricula)
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/boletas",$data);
		$this->load->view("layouts/footer");
	}
	public function boletagpo(){
		
		$data = array(
			'alu' => $this->Alumno_model_su->getAlumno($matricula),
			'boleta' => $this->Alumno_model_su->materiasBoleta($matricula)
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/boletagpo",$data);
		$this->load->view("layouts/footer");
	}
}
