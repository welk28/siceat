<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumno_model_su extends CI_Model {
	public function getAlumnos(){
		$periodo= $this->session->userdata("periodo");
		
		$resultado=$this->db->query("select distinct a.matricula, a.nom, a.app, a.apm, a.sexo, a.fecnac, a.grado, a.idt , t.nomt, a.turno
									from periodo p,horario h, cursa c, alumno a, taller t 
									where t.idt=a.idt and a.matricula=c.matricula and h.idh=c.idh and p.idp=h.idp and p.idp='$periodo';");

		if ($resultado->num_rows() > 0) {
			return $resultado->result();
		}
		else{
			return false;
		}
		
	}
	public function getTodos(){
		
		
		$resultado=$this->db->query("select distinct a.matricula, a.nom, a.app, a.apm, a.sexo, a.fecnac, a.grado, a.grupo, a.idt, t.nomt, a.turno
									from taller t, alumno a 
									where t.idt=a.idt order by a.grado, a.grupo, a.app, a.apm, a.nom;");

		if ($resultado->num_rows() > 0) {
			return $resultado->result();
		}
		else{
			return false;
		}
		
	}

	public function getTalleres(){
		$resultado=$this->db->query("select * from taller order by nomt");
		return $resultado->result();
	}

	public function addAlumno($matricula,$app,$apm,$nom,$curp,$sexo,$fecnac,$telal,$email,$calle,$colonia,$ciudad,$nomtut,$teltut,$dirtut,$turno,$grado,$grupo,$idt){
		$resultado=$this->db->query("insert into alumno (matricula,app,apm,nom,curp,sexo,fecnac,telal,email,calle,colonia,ciudad,nomtut,teltut,dirtut,turno,grado,grupo,idt) 
		values ('$matricula','$app','$apm','$nom','$curp','$sexo','$fecnac','$telal','$email','$calle','$colonia','$ciudad','$nomtut','$teltut','$dirtut','$turno',$grado,'$grupo','$idt')"); 
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	public function updateAlumno($matricula2,$matricula,$app,$apm,$nom,$curp,$sexo,$fecnac,$telal,$email,$calle,$colonia,$ciudad,$nomtut,$teltut,$dirtut,$turno,$grado,$grupo,$idt){

		if($matricula!=$matricula2){
			$resultado=$this->db->query("update alumno set matricula ='$matricula',	app= '$app',apm= '$apm', nom= '$nom', curp= '$curp', sexo= '$sexo', fecnac= '$fecnac', telal= '$telal', email= '$email', calle= '$calle', colonia= '$colonia', ciudad= '$ciudad', nomtut= '$nomtut', teltut= '$teltut', dirtut= '$dirtut', turno= '$turno', grado= $grado, grupo= '$grupo', idt= '$idt' where matricula='$matricula2'");  
		}else{
			$resultado=$this->db->query("update alumno set app= '$app',apm= '$apm', nom= '$nom', curp= '$curp', sexo= '$sexo', fecnac= '$fecnac', telal= '$telal', email= '$email', calle= '$calle', colonia= '$colonia', ciudad= '$ciudad', nomtut= '$nomtut', teltut= '$teltut', dirtut= '$dirtut', turno= '$turno', grado= $grado, grupo= '$grupo', idt= '$idt' where matricula='$matricula2'");  
		}
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}

	public function getAlumno($matricula){
		$resultado=$this->db->query("select * from alumno a, taller t where a.idt=t.idt and a.matricula='$matricula'");
		return $resultado->row();
	}
	public function materiasBoleta($matricula){
		$periodo= $this->session->userdata("periodo");
		
		$resultado=$this->db->query("select c.matricula, c.idh, m.nommat, c.tr1, c.tr2, c.tr3, c.prom from materia m, cursa c, horario h where m.idmat=h.idmat and h.idh=c.idh and h.idp='$periodo' and matricula='$matricula';");

		return $resultado->result();
	}
	public function Horalumno($matricula){
		$periodo= $this->session->userdata("periodo");
		$turno=$this->session->userdata("turno");
		$resultados=$this->db->query("select * from grupo g, personal p, materia m, cursa c, horario h where g.idg=h.idg and h.rfcp=p.rfcp and m.idmat=h.idmat and h.idh=c.idh and h.idp='$periodo' and c.matricula='$matricula';");
		$resultados->result();

		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}
	public function HoraVaciar($idh, $matricula){
		$periodo= $this->session->userdata("periodo");
		
		$resultados=$this->db->query("delete from cursa where idh=$idh and matricula='$matricula';");

		if($this->db->affected_rows()>0){
			return 1;
		}else{
			return 0;
		}
	}
	public function Veridhs($matricula){
		$periodo= $this->session->userdata("periodo");
		
		$resultados=$this->db->query("select c.idh from horario h, cursa c where c.idh=h.idh and h.idp='$periodo' and c.matricula='$matricula'");
		$resultados->result();

		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}
	public function getHorarios($grado, $grupo, $turno){
		$periodo= $this->session->userdata("periodo");
	
		$resultados=$this->db->query("select h.idh, g.grado, g.grupo, h.idmat, m.nommat from materia m, horario h, grupo g where m.idmat=h.idmat and g.idg=h.idg and h.turno='$turno' and g.grado=$grado and g.grupo='$grupo' and h.idp='$periodo' and not exists (select t.idt from taller t where t.idt=h.idmat)");
		$resultados->result();

		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
		
  }
  
  public function getAlumnosI($grado, $grupo, $turno){
		$periodo= $this->session->userdata("periodo");

    $resultados=$this->db->query("select * from alumno where grado=$grado and grupo='$grupo' and turno='$turno' and status=1");
		$resultados->result();

		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
		
	}
	public function getAlumnosT($idmat, $grado, $turno){
		$periodo= $this->session->userdata("periodo");

    $resultados=$this->db->query("select * from alumno where grado=$grado and idt='$idmat' and turno='$turno' and status=1");
		$resultados->result();

		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
		
	}
	public function guardaCursa($idh, $matricula){
    $agregar= $this->db->query("insert into cursa (idh, matricula) values ($idh, '$matricula')");
    if($this->db->affected_rows()>0){
			return 1;
		}else{
			return 0;
		}
	}
	
	public function Vaciaidh($idh){
		$periodo= $this->session->userdata("periodo");
		
		$resultados=$this->db->query("delete from cursa where idh=$idh ;");

		if($this->db->affected_rows()>0){
			return 1;
		}else{
			return 0;
		}
	}
	public function verCal($idh, $matricula){
		$resultado=$this->db->query("select tr1 from cursa where matricula='$matricula' and idh=$idh");
		return $resultado->row();
	}
	public function verCalt($matricula){
		$periodo= $this->session->userdata("periodo");

		$resultado=$this->db->query("SELECT h.idh, c.tr1, c.tr2, c.tr3, h.idmat, a.matricula, a.idt FROM cursa c, horario h, alumno a WHERE c.idh=h.idh AND a.matricula=c.matricula and a.idt=h.idmat AND h.idp='$periodo' AND a.matricula='$matricula';");
		return $resultado->row();
	}
	public function verHorario($grado, $idt){
		$periodo= $this->session->userdata("periodo");
		$turno=$this->session->userdata("turno");
	
		$resultado=$this->db->query("SELECT h.idh, h.idg, g.grado, g.grupo, m.idmat, m.nommat FROM grupo g, horario h, taller t, materia m WHERE g.idg=h.idg and h.idmat=m.idmat and t.idt=m.idmat AND h.idp='$periodo' AND h.turno='$turno' AND G.GRADO=$grado AND h.idmat='$idt' order by h.idh");
		if ($resultado->num_rows() > 0) {
			return $resultado->row();
		}else{
			return false;
		}
	}
	public function cualTaller($matricula){
		$resultado=$this->db->query("SELECT * from alumno a, taller t where a.idt=t.idt and a.matricula='$matricula'");
		if ($resultado->num_rows() > 0) {
			return $resultado->row();
		}else{
			return false;
		}
	}
	public function grupo($matricula){
		$resultado=$this->db->query("SELECT g.grado, g.grupo, a.matricula FROM alumno a, grupo g WHERE a.grado=g.grado AND a.matricula='$matricula'");
		if ($resultado->num_rows() > 0) {
			return $resultado->result();
		}else{
			return false;
		}
	}
	public function grupo1(){
		$resultado=$this->db->query("SELECT * from grupo where grado=1");
		if ($resultado->num_rows() > 0) {
			return $resultado->result();
		}else{
			return false;
		}
	}
}