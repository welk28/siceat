<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docenteu_model extends CI_Model {


  public function matedoc(){
		$periodo= $this->session->userdata("periodo");
		$rfcp=$this->session->userdata("personal");
		$resultados=$this->db->query(" select  h.idh, h.turno, h.idg, g.grado, g.grupo, m.nommat from horario h, grupo g, materia m where m.idmat=h.idmat and g.idg=h.idg and h.rfcp='$rfcp' and idp='$periodo' ");
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
  }
  public function docentemat($idh){
		$periodo= $this->session->userdata("periodo");
		$resultados=$this->db->query("select h.idh, p.nomp, g.grado, g.grupo, h.turno, m.nommat from horario h, personal p, grupo g, materia m 
		where m.idmat=h.idmat and g.idg=h.idg and p.rfcp=h.rfcp and idh='$idh';");
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
  }
  public function gpomat($idh){
		$periodo= $this->session->userdata("periodo");
		$resultados=$this->db->query("select c.matricula, a.app, a.apm, a.nom  
		from cursa c, alumno a 
		where a.matricula=c.matricula and idh='$idh' order by a.app, a.apm, a.nom;");
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
  }
  public function gpomatcursa($idh){
		$periodo= $this->session->userdata("periodo");
		$resultados=$this->db->query("select c.idh, c.matricula, a.app, a.apm, a.nom, a.grado, a.grupo,	c.tr1, c.ftr1, c.asigna1, c.tr2, c.ftr2, c.asigna2, c.tr3, c.ftr3, c.asigna3,  c.deser, c.prom,
		c.fa1, c.fa2, c.fa3 from cursa c, alumno a 
		where a.matricula=c.matricula and c.idh='$idh' order by a.app, a.apm, a.nom;");
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}
  public function califica1($idh, $matricula, $tr1){
		$fecha=date("Y-m-d");
		$modifica=$this->session->userdata("personal");
		$resultado=$this->db->query("update cursa set tr1=$tr1, ftr1='$fecha', asigna1='$modifica' where idh=$idh and matricula='$matricula'");
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	public function califica2($idh, $matricula, $tr2){
		$fecha=date("Y-m-d");
		$modifica=$this->session->userdata("personal");
		$resultado=$this->db->query("update cursa set tr2=$tr2, ftr2='$fecha', asigna2='$modifica' where idh=$idh and matricula='$matricula'");
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}

	public function califica3($idh, $matricula, $tr3){
		$fecha=date("Y-m-d");
		$modifica=$this->session->userdata("personal");
		$resultado=$this->db->query("update cursa set tr3=$tr3, ftr3='$fecha', asigna3='$modifica' where idh=$idh and matricula='$matricula'");
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
  }
  



  






  public function getDocencurso(){
    $periodo= $this->session->userdata("periodo");
    $docente=$this->session->userdata("personal");
		$turno=$this->session->userdata("turno");
		$resultados=$this->db->query("select distinct h.rfcp, p.nomp 
								from horario h, personal p 
								where p.rfcp=h.rfcp and h.rfcp='$docente' and h.turno='$turno' and h.idp='$periodo';");
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}




	public function getDocente(){
		$resultados=$this->db->query("select * from personal order by nomp");

		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
		
	}

	public function getRoles($rfcp){
		$resultados=$this->db->query("select * from rol r, permisos p where r.idr=p.idr and p.rfcp='$rfcp'");
		if($resultados->num_rows()>0){
			return $resultados->result();
		}else{
			return false;
		}
	}
	
	
	

	
	
	public function addDocente($rfcp, $nomp, $turno, $contra){
		$resultado=$this->db->query("insert into personal (rfcp,nomp,turno,passp) 
		values ('$rfcp','$nomp','$turno','$contra')"); 
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	public function addPermisos($rfcp, $idr){
		$resultado=$this->db->query("insert into permisos (rfcp,idr,status) 
		values ('$rfcp','$idr',1)"); 
		
			return $resultado;
		
	}

	

	
	
	public function getAdmin($rfcp){
		$resultados=$this->db->query("select * from permisos where rfcp='$rfcp' and idr=1 and status=1;");
		if ($resultados->num_rows() > 0) {
			return 1;
		}
		else{
			return 0;
		}
	}

	public function getAca($rfcp){
		$resultados=$this->db->query("select * from permisos where rfcp='$rfcp' and idr=2 and status=1;");
		if ($resultados->num_rows() > 0) {
			return 1;
		}
		else{
			return 0;
		}
	}

	public function getDoc($rfcp){
		$resultados=$this->db->query("select * from permisos where rfcp='$rfcp' and idr=3 and status=1;");
		if ($resultados->num_rows() > 0) {
			return 1;
		}
		else{
			return 0;
		}
	}
	public function getPre($rfcp){
		$resultados=$this->db->query("select * from permisos where rfcp='$rfcp' and idr=4 and status=1;");
		if ($resultados->num_rows() > 0) {
			return 1;
		}
		else{
			return 0;
		}
	}

	public function updateDoc($mrfcp, $mrfcp2, $mnomp, $mturno, $mcontra){
		$modifica=$this->session->userdata("personal");
		if(empty($mcontra)){
			if($mrfcp!=$mrfcp2){
				$resultado=$this->db->query("update personal set rfcp='$mrfcp2', nomp='$mnomp', turno='$mturno' where rfcp='$mrfcp'");
			}else{
				$resultado=$this->db->query("update personal set nomp='$mnomp', turno='$mturno' where rfcp='$mrfcp'");
			}
			
		}else{
			if($mrfcp!=$mrfcp2){
				$resultado=$this->db->query("update personal set rfcp='$mrfcp2', nomp='$mnomp', turno='$mturno', passp=sha1('$mcontra') where rfcp='$mrfcp'");
			}else{
				$resultado=$this->db->query("update personal set nomp='$mnomp', turno='$mturno', passp=sha1('$mcontra') where rfcp='$mrfcp'");
			}
		}
		return $resultado;
	}
	public function updatePermisos($rfcp, $idr){
		$resultado=$this->db->query("update permisos set status=0 where rfcp='$rfcp' and idr='$idr'"); 
			return $resultado;
	}
	public function updatePermisos1($rfcp, $idr){
		$resultado=$this->db->query("update permisos set status=1 where rfcp='$rfcp' and idr='$idr'"); 
			return $resultado;
	}
}
