<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class horario_model_su extends CI_Model {
	public function getHorarios(){
		$periodo= $this->session->userdata("periodo");
		$turno=$this->session->userdata("turno");
		$resultados=$this->db->query("select h.idh, h.idmat, h.rfcp, h.idg, m.nommat, p.nomp, g.grado, g.grupo, h.turno
from personal p, materia m, horario h, grupo g 
where g.idg=h.idg and p.rfcp=h.rfcp and h.idmat=m.idmat and h.idp='$periodo' order by g.grado, g.grupo, h.idh");
		$resultados->result();

		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
		
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