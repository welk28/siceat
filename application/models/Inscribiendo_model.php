<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class inscribiendo_model extends CI_Model {
	public function getHorarios($grado, $grupo){
		$periodo= $this->session->userdata("periodo");
		$turno=$this->session->userdata("turno");
		$resultados=$this->db->query("select distinct h.idh, g.grado, g.grupo
    from horario h, grupo g 
    where g.idg=h.idg and h.idp='$periodo' and h.turno='$turno' 
    and g.grado=$grado and g.grupo='$grupo' order by h.idh");
		$resultados->result();

		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
		
  }
  
  public function getAlumnos($grado, $grupo){
		$periodo= $this->session->userdata("periodo");
		$turno=$this->session->userdata("turno");
    $resultados=$this->db->query("SELECT matricula from alumno where grado=$grado and grupo='$grupo' and turno='$turno'");
		$resultados->result();

		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
		
	}
  
  public function guardaCursa($matricula, $idh){
    $agregar= $this->db->query("insert into cursa (idh, matricula) values ($idh, '$matricula')");
    if($this->db->affected_rows()>0){
			return 1;
		}else{
			return 0;
		}
  }
}