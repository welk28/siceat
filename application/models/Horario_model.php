<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class horario_model extends CI_Model {
	public function getHorarios(){
		$periodo= $this->session->userdata("periodo");
		$turno=$this->session->userdata("turno");
		$resultados=$this->db->query("select h.idh, h.idmat, h.rfcp, h.idg, m.nommat, p.nomp, g.grado, g.grupo
from personal p, materia m, horario h, grupo g 
where g.idg=h.idg and p.rfcp=h.rfcp and h.idmat=m.idmat and h.idp='$periodo' and h.turno='$turno' order by g.grado, g.grupo, h.idh");
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

	public function getDocentes(){
		$turno=$this->session->userdata("turno");
		$consulta="SELECT p.rfcp, p.nomp FROM personal p, permisos pe WHERE p.rfcp=pe.rfcp AND pe.idr=3 AND pe.status=1 AND p.turno='$turno'";
		$resultado=$this->db->query($consulta)->result_array();

		return $resultado;
	}

	public function getMateriash($idg){
		$periodo=$this->session->userdata("periodo");
		$turno=$this->session->userdata("turno");
		if($idg==55||$idg==56||$idg==57){
			//buscar unicamente talleres
			$consulta="SELECT m.idmat, m.nommat, m.grado FROM materia m, taller t WHERE t.idt=m.idmat";
		}else{
			//buscar unicamente materias
			//$consulta="SELECT m.idmat, m.nommat, m.grado FROM materia m WHERE m.idmat NOT IN (SELECT t.idt FROM taller t WHERE m.idmat=t.idt) ";
			$consulta="SELECT m.idmat, m.nommat, m.grado FROM materia m WHERE m.idmat NOT IN (SELECT h.idmat FROM horario h WHERE h.idg=$idg AND h.idp='$periodo' AND h.turno='$turno' AND h.idmat=m.idmat) AND m.idmat NOT IN (SELECT t.idt FROM taller t WHERE m.idmat=t.idt)";
		}
		
		$resultado=$this->db->query($consulta)->result_array();
		return $resultado;
	}

	public function getGrupo($grado){
		//$resultado=$this->db->query("SELECT * FROM grupo WHERE grado=$grado");
		$consulta="SELECT * FROM grupo WHERE grado=$grado";
		$resultado=$this->db->query($consulta)->result_array();
		return $resultado;
	}
	
	public function getIdh(){
		//determinar el numero de horario
		$buscaidh= $this->db->query("SELECT * FROM control WHERE idc=2");
		return $buscaidh->row();
		
	}

	public function agregaHr($idh, $idg, $idmat, $rfcp){
		$periodo=$this->session->userdata("periodo");
		$turno=$this->session->userdata("turno");

		//insertar el horario
		$consulta="insert horario values ($idh, '$idmat', '$rfcp', $idg, '$periodo', '$turno')";
		$alta=$this->db->query($consulta);
		
		
		//actualizar el valor de control
		$actualiza=$this->db->query("update control set val=$idh where idc=2");		
	}
	
	public function buscaHdatos($idh){
		//obtiene los datos cargados del horario
		$datosh="SELECT h.idh, h.idmat, m.nommat, h.rfcp, p.nomp, h.idg, g.grado, g.grupo FROM horario h, materia m, personal p, grupo g WHERE h.idmat=m.idmat AND h.rfcp=p.rfcp AND h.idg=g.idg AND h.idh=$idh";

		$resultado=$this->db->query($datosh);
		return $resultado->row();
	}

	public function getRegistro($idg, $idmat, $rfcp){
		$periodo=$this->session->userdata("periodo");
		$turno=$this->session->userdata("turno");
		$consulta="select * from horario where idg=$idg and idmat='$idmat' and rfcp='$rfcp' and idp='$periodo' and turno='$turno'";
		$resultado= $this->db->query($consulta);
		return $resultado->num_rows();
	}
	public function buscaHdatos2($idg, $idmat, $rfcp){
		$periodo=$this->session->userdata("periodo");
		$turno=$this->session->userdata("turno");
		$consulta="SELECT h.idh, h.idmat, m.nommat, h.rfcp, p.nomp, h.idg, g.grado, g.grupo FROM horario h, materia m, personal p, grupo g WHERE h.idmat=m.idmat AND h.rfcp=p.rfcp AND h.idg=g.idg AND h.idg=$idg AND h.idmat='$idmat' AND h.rfcp='$rfcp' AND h.idp='$periodo' AND h.turno='$turno'";
		
		$resultado= $this->db->query($consulta);
		return $resultado->row();
	}
	public function getSemana(){
		$consulta="select * from semana";
		$resultado=$this->db->query($consulta);
		return $resultado->result();
	}
	public function getReloj(){
		$consulta="select * from reloj";
		$resultado=$this->db->query($consulta);
		return $resultado->result();
	}
	public function addHoradia($idh, $idia, $idr){
		$resultado=$this->db->query("insert into imparte (idh, idia, idr) 
									values ($idh, $idia, $idr)"); 
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	public function cargado($idg, $idh, $idia, $idr){
		$periodo=$this->session->userdata("periodo");
		$turno=$this->session->userdata("turno");
		$consulta="SELECT h.idh, i.idh, i.idia, i.idr FROM horario h, imparte i WHERE h.idh=i.idh AND  h.idg=$idg AND h.idp='$periodo' AND h.turno='$turno' AND i.idia=$idia AND i.idr=$idr AND i.idh<>$idh";
		$resultado= $this->db->query($consulta);
		return $resultado->num_rows();
	}

	public function usoHrdia($idh, $idia, $idr){
		$consulta="SELECT * FROM imparte WHERE idh=$idh AND idia=$idia AND idr=$idr";
		$resultado= $this->db->query($consulta);
		return $resultado->num_rows();
	}

	public function removeHoradia($idh, $idia, $idr){
		$resultado=$this->db->query("delete from imparte where idh=$idh and idia=$idia and idr=$idr"); 
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	public function showUpdate($idh){
		$consulta="SELECT h.idh, h.idmat, m.nommat, h.rfcp, p.nomp, h.idg, g.grado, g.grupo FROM horario h, materia m, personal p, grupo g WHERE h.idmat=m.idmat AND h.rfcp=p.rfcp AND h.idg=g.idg AND h.idh=$idh";
		$resultado= $this->db->query($consulta);
		return $resultado->row();
	}
	public function getGrupo2($grado){
		//$resultado=$this->db->query("SELECT * FROM grupo WHERE grado=$grado");
		$consulta="SELECT * FROM grupo WHERE grado=$grado";
		$resultado=$this->db->query($consulta)->result();
		return $resultado;
	}
	public function getMateriash2($idg){
		$periodo=$this->session->userdata("periodo");
		$turno=$this->session->userdata("turno");
		if($idg==55||$idg==56||$idg==57){
			//buscar unicamente talleres
			$consulta="SELECT m.idmat, m.nommat, m.grado FROM materia m, taller t WHERE t.idt=m.idmat";
		}else{
			//buscar unicamente materias
			//$consulta="SELECT m.idmat, m.nommat, m.grado FROM materia m WHERE m.idmat NOT IN (SELECT t.idt FROM taller t WHERE m.idmat=t.idt) ";
			$consulta="SELECT m.idmat, m.nommat, m.grado FROM materia m WHERE m.idmat NOT IN (SELECT h.idmat FROM horario h WHERE h.idg=$idg AND h.idp='$periodo' AND h.turno='$turno' AND h.idmat=m.idmat) AND m.idmat NOT IN (SELECT t.idt FROM taller t WHERE m.idmat=t.idt)";
		}
		
		$resultado=$this->db->query($consulta)->result();
		return $resultado;
	}

	public function getDocentes2(){
		$turno=$this->session->userdata("turno");
		$consulta="SELECT p.rfcp, p.nomp FROM personal p, permisos pe WHERE p.rfcp=pe.rfcp AND pe.idr=3 AND pe.status=1 AND p.turno='$turno'";
		$resultado=$this->db->query($consulta)->result();

		return $resultado;
	}
	public function updateHr($idh, $idmat, $rfcp, $idg){
		$consulta="update horario set idmat='$idmat', rfcp='$rfcp', idg=$idg where idh=$idh";
		$alta=$this->db->query($consulta);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}

	public function deleteHr($idh){
		$consulta="delete from horario where idh=$idh";
		$borra=$this->db->query($consulta);
		
		return $borra;
	}
}
