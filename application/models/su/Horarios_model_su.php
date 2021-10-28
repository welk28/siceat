<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class horarios_model_su extends CI_Model {
	public function getHorarios(){
		$periodo= $this->session->userdata("periodo");
		$turno=$this->session->userdata("turno");
		$resultados=$this->db->query("select distinct h.idg, g.grado, g.grupo, h.turno from horario h, grupo g where g.idg=h.idg and h.idp='$periodo' order by h.idh");
		$resultados->result();

		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
		
	}
	public function getinsc($grado, $grupo, $turno){
		$periodo= $this->session->userdata("periodo");
		
		$resultados=$this->db->query("select distinct h.idh, h.idg, g.grado, g.grupo, c.matricula from cursa c, horario h, grupo g where c.idh=h.idh and g.idg=h.idg and h.idp='$periodo' and h.turno='$turno' and g.grado=$grado and g.grupo='$grupo' order by h.idh;");
		return $resultados->num_rows();
	}
	public function getLunes($idh){
		$resultados=$this->db->query("select * from imparte i, semana s, reloj r 
		where r.idr=i.idr and i.idia=s.idia and i.idh='$idh' and i.idia=1;");
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}
	public function getMartes($idh){
		$resultados=$this->db->query("select * from imparte i, semana s, reloj r 
		where r.idr=i.idr and i.idia=s.idia and i.idh='$idh' and i.idia=2;");
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}
	public function getMiercoles($idh){
		$resultados=$this->db->query("select * from imparte i, semana s, reloj r 
		where r.idr=i.idr and i.idia=s.idia and i.idh='$idh' and i.idia=3;");
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}
	public function getJueves($idh){
		$resultados=$this->db->query("select * from imparte i, semana s, reloj r 
		where r.idr=i.idr and i.idia=s.idia and i.idh='$idh' and i.idia=4;");
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}
	public function getViernes($idh){
		$resultados=$this->db->query("select * from imparte i, semana s, reloj r
		where r.idr=i.idr and i.idia=s.idia and i.idh='$idh' and i.idia=5;");
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}
	public function getInscritos(){
		$periodo=$this->session->userdata("periodo");
		$resultados=$this->db->query("select c.idh, c.matricula, a.idcar from alumnos as a, cursa as c, horario as h where h.idh=c.idh and a.matricula=c.matricula and h.periodo='$periodo'");
		return $resultados->result();
	}
}