<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class horariosme_model extends CI_Model {
	public function getHorarios(){
		$periodo= $this->session->userdata("periodo");
		$turno=$this->session->userdata("turno");
		$resultados=$this->db->query("SELECT h.idh, h.idg, g.grado, g.grupo, m.idmat, m.nommat FROM grupo g, horario h, materiaextra m WHERE h.idmat=m.idmat AND g.idg=h.idg AND h.idp='$periodo' AND h.turno='$turno' order by h.idh");
		$resultados->result();

		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
		
	}
	public function getinsc($idh){
		$periodo= $this->session->userdata("periodo");
		$turno=$this->session->userdata("turno");
		$resultados=$this->db->query("SELECT idh, matricula FROM cursa WHERE idh=$idh");
		return $resultados->num_rows();
	}
	public function getInscritos(){
		$periodo=$this->session->userdata("periodo");
		$resultados=$this->db->query("select c.idh, c.matricula, a.idcar from alumnos as a, cursa as c, horario as h where h.idh=c.idh and a.matricula=c.matricula and h.periodo='$periodo'");
		return $resultados->result();
	}
}