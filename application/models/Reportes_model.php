<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes_model extends CI_Model {

		public function AprobMaterias(){
			$materias=$this->db->query("SELECT * FROM materia WHERE STATUS=1");
			if($materias->num_rows()>0){
				return $materias->result();
			}
		}
		// public function AprobTaller(){
			
		// }

		public function activoTrimb(){
			$turno=$this->session->userdata("turno");
			if($turno=='V'){
				$resultado=$this->db->query("select * from trimestre t, control c where c.val=t.trim and c.idc=6");
			}else{
				$resultado=$this->db->query("select * from trimestre t, control c where c.val=t.trim and c.idc=5");
			}
			if ($resultado->num_rows() > 0) {
				return $resultado->row();
			}
			else{
				return false;
			}
		}
//trimestre 1,2,3 grado 1
		public function AprobadosTr11($idmat){
			$turno=$this->session->userdata("turno");
			$periodo= $this->session->userdata("periodo");
			$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, c.tr1, c.tr2, c.tr3 FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=1 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno' AND c.tr1>5");

			return $resultado->num_rows();
		}
		public function AprobadosTr21($idmat){
			$turno=$this->session->userdata("turno");
			$periodo= $this->session->userdata("periodo");
			$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, c.tr1, c.tr2, c.tr3 FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=1 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno' AND c.tr2>5");

			return $resultado->num_rows();
		}
		public function AprobadosTr31($idmat){
			$turno=$this->session->userdata("turno");
			$periodo= $this->session->userdata("periodo");
			$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, c.tr1, c.tr2, c.tr3 FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=1 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno' AND c.tr3>5");

			return $resultado->num_rows();
		}
	//trimestre 1,2,3 grado 2
	public function AprobadosTr12($idmat){
		$turno=$this->session->userdata("turno");
		$periodo= $this->session->userdata("periodo");
		$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, c.tr1, c.tr2, c.tr3 FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=2 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno' AND c.tr1>5");

		return $resultado->num_rows();
	}
	public function AprobadosTr22($idmat){
		$turno=$this->session->userdata("turno");
		$periodo= $this->session->userdata("periodo");
		$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, c.tr1, c.tr2, c.tr3 FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=2 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno' AND c.tr2>5");

		return $resultado->num_rows();
	}
	public function AprobadosTr32($idmat){
		$turno=$this->session->userdata("turno");
		$periodo= $this->session->userdata("periodo");
		$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, c.tr1, c.tr2, c.tr3 FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=2 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno' AND c.tr3>5");

		return $resultado->num_rows();
	}
	//trimestre 1,2,3 grado 3
	public function AprobadosTr13($idmat){
		$turno=$this->session->userdata("turno");
		$periodo= $this->session->userdata("periodo");
		$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, c.tr1, c.tr2, c.tr3 FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=3 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno' AND c.tr1>5");

		return $resultado->num_rows();
	}
	public function AprobadosTr23($idmat){
		$turno=$this->session->userdata("turno");
		$periodo= $this->session->userdata("periodo");
		$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, c.tr1, c.tr2, c.tr3 FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=3 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno' AND c.tr2>5");

		return $resultado->num_rows();
	}
	public function AprobadosTr33($idmat){
		$turno=$this->session->userdata("turno");
		$periodo= $this->session->userdata("periodo");
		$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, c.tr1, c.tr2, c.tr3 FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=3 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno' AND c.tr3>5");

		return $resultado->num_rows();
	}


	///zona de reprobados
	//trimestre 1,2,3 grado 1
	public function ReprobadoTr11($idmat){
		$turno=$this->session->userdata("turno");
		$periodo= $this->session->userdata("periodo");
		$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, c.tr1, c.tr2, c.tr3 FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=1 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno' AND c.tr1<=5");

		return $resultado->num_rows();
	}
	public function ReprobadoTr21($idmat){
		$turno=$this->session->userdata("turno");
		$periodo= $this->session->userdata("periodo");
		$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, c.tr1, c.tr2, c.tr3 FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=1 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno' AND c.tr2<=5");

		return $resultado->num_rows();
	}
	public function ReprobadoTr31($idmat){
		$turno=$this->session->userdata("turno");
		$periodo= $this->session->userdata("periodo");
		$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, c.tr1, c.tr2, c.tr3 FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=1 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno' AND c.tr3<=5");

		return $resultado->num_rows();
	}

	//trimestre 1,2,3 grado 2
	public function ReprobadoTr12($idmat){
		$turno=$this->session->userdata("turno");
		$periodo= $this->session->userdata("periodo");
		$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, c.tr1, c.tr2, c.tr3 FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=2 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno' AND c.tr1<=5");

		return $resultado->num_rows();
	}
	public function ReprobadoTr22($idmat){
		$turno=$this->session->userdata("turno");
		$periodo= $this->session->userdata("periodo");
		$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, c.tr1, c.tr2, c.tr3 FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=2 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno' AND c.tr2<=5");

		return $resultado->num_rows();
	}
	public function ReprobadoTr32($idmat){
		$turno=$this->session->userdata("turno");
		$periodo= $this->session->userdata("periodo");
		$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, c.tr1, c.tr2, c.tr3 FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=2 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno' AND c.tr3<=5");

		return $resultado->num_rows();
	}
	//trimestre 1,2,3 grado 3
	public function ReprobadoTr13($idmat){
		$turno=$this->session->userdata("turno");
		$periodo= $this->session->userdata("periodo");
		$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, c.tr1, c.tr2, c.tr3 FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=3 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno' AND c.tr1<=5");

		return $resultado->num_rows();
	}
	public function ReprobadoTr23($idmat){
		$turno=$this->session->userdata("turno");
		$periodo= $this->session->userdata("periodo");
		$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, c.tr1, c.tr2, c.tr3 FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=3 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno' AND c.tr2<=5");

		return $resultado->num_rows();
	}
	public function ReprobadoTr33($idmat){
		$turno=$this->session->userdata("turno");
		$periodo= $this->session->userdata("periodo");
		$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, c.tr1, c.tr2, c.tr3 FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=3 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno' AND c.tr3<=5");

		return $resultado->num_rows();
	}
	///LOS QUE NO TIENEN CALIFICACION O IGUAL A 0
	//trimestre 1,2,3 grado 1
	public function SinCalifTr11($idmat){
		$turno=$this->session->userdata("turno");
		$periodo= $this->session->userdata("periodo");
		$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, c.tr1, c.tr2, c.tr3 FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=1 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno' AND c.tr1=0 or c.tr1=NULL");

		return $resultado->num_rows();
	}
	public function SinCalifTr21($idmat){
		$turno=$this->session->userdata("turno");
		$periodo= $this->session->userdata("periodo");
		$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, c.tr1, c.tr2, c.tr3 FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=1 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno' AND c.tr2=0 OR c.tr2=NULL");

		return $resultado->num_rows();
	}
	public function SinCalifTr31($idmat){
		$turno=$this->session->userdata("turno");
		$periodo= $this->session->userdata("periodo");
		$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, c.tr1, c.tr2, c.tr3 FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=3 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno' AND c.tr3=0 OR c.tr3=NULL");

		return $resultado->num_rows();
	}
//trimestre 1,2,3 grado 2
public function SinCalifTr12($idmat){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, c.tr1, c.tr2, c.tr3 FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=2 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno' AND c.tr1=0 or c.tr1=NULL");

	return $resultado->num_rows();
}
public function SinCalifTr22($idmat){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, c.tr1, c.tr2, c.tr3 FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=2 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno' AND c.tr2=0 OR c.tr2=NULL");

	return $resultado->num_rows();
}
public function SinCalifTr32($idmat){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, c.tr1, c.tr2, c.tr3 FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=2 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno' AND c.tr3=0 OR c.tr3=NULL");

	return $resultado->num_rows();
}
//trimestre 1,2,3 grado 2
public function SinCalifTr13($idmat){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, c.tr1, c.tr2, c.tr3 FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=3 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno' AND c.tr1=0 or c.tr1=NULL");

	return $resultado->num_rows();
}
public function SinCalifTr23($idmat){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, c.tr1, c.tr2, c.tr3 FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=3 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno' AND c.tr2=0 OR c.tr2=NULL");

	return $resultado->num_rows();
}
public function SinCalifTr33($idmat){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, c.tr1, c.tr2, c.tr3 FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=3 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno' AND c.tr3=0 OR c.tr3=NULL");

	return $resultado->num_rows();
}
//	PROMEDIO DE LA MATERIA POR TRIMESTRE
//grado 1
public function ProMatTrim1($idmat){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, AVG(c.tr1) AS prom FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=1 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno';");

	return $resultado->row();
}
public function ProMatTrim2($idmat){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, AVG(c.tr2) AS prom FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=1 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno';");

	return $resultado->row();
}
public function ProMatTrim3($idmat){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, AVG(c.tr3) AS prom FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=1 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno';");

	return $resultado->row();
}
public function ProMatTrim4($idmat){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, AVG(c.tr1) AS prom FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=2 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno';");

	return $resultado->row();
}
public function ProMatTrim5($idmat){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, AVG(c.tr2) AS prom FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=2 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno';");

	return $resultado->row();
}
public function ProMatTrim6($idmat){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, AVG(c.tr3) AS prom FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=2 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno';");

	return $resultado->row();
}
public function ProMatTrim7($idmat){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, AVG(c.tr1) AS prom FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=3 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno';");

	return $resultado->row();
}
public function ProMatTrim8($idmat){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, AVG(c.tr2) AS prom FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=3 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno';");

	return $resultado->row();
}
public function ProMatTrim9($idmat){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT h.idh, h.idmat, h.idg, c.matricula, AVG(c.tr3) AS prom FROM horario h, grupo g, cursa c WHERE c.idh=h.idh and g.idg=h.idg AND g.grado=3 and h.idmat='$idmat' AND h.idp='$periodo' AND h.turno='$turno';");

	return $resultado->row();
}

public function AlumosPrimero(){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT DISTINCT c.matricula FROM cursa c, horario h, grupo g WHERE g.idg=h.idg AND h.idh=c.idh AND h.idp='$periodo' AND h.turno='$turno' AND g.grado=1");

	return $resultado->num_rows();
}
public function AlumosSegundo(){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT DISTINCT c.matricula FROM cursa c, horario h, grupo g WHERE g.idg=h.idg AND h.idh=c.idh AND h.idp='$periodo' AND h.turno='$turno' AND g.grado=2");

	return $resultado->num_rows();
}
public function AlumosTercero(){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT DISTINCT c.matricula FROM cursa c, horario h, grupo g WHERE g.idg=h.idg AND h.idh=c.idh AND h.idp='$periodo' AND h.turno='$turno' AND g.grado=3");

	return $resultado->num_rows();
}
//CALIF DE CALLER 
//APROBADOS 1 AÑO
public function TallerAp11(){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT distinct c.matricula, g.grado, c.tr1 FROM cursa c, grupo g, horario h, taller t, materia m WHERE c.idh=h.idh AND g.idg=h.idg and h.idmat=m.idmat AND t.idt=m.idmat AND h.idp='$periodo' AND h.turno='$turno' AND g.grado=1 AND c.tr1>5;");

	return $resultado->num_rows();
}
public function TallerAp12(){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT distinct c.matricula, g.grado, c.tr2 FROM cursa c, grupo g, horario h, taller t, materia m WHERE c.idh=h.idh AND g.idg=h.idg and h.idmat=m.idmat AND t.idt=m.idmat AND h.idp='$periodo' AND h.turno='$turno' AND g.grado=1 AND c.tr2>5;");

	return $resultado->num_rows();
}
public function TallerAp13(){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT distinct c.matricula, g.grado, c.tr3 FROM cursa c, grupo g, horario h, taller t, materia m WHERE c.idh=h.idh AND g.idg=h.idg and h.idmat=m.idmat AND t.idt=m.idmat AND h.idp='$periodo' AND h.turno='$turno' AND g.grado=1 AND c.tr3>5;");

	return $resultado->num_rows();
}
//APROBADOS 2 AÑO
public function TallerAp21(){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT distinct c.matricula, g.grado, c.tr1 FROM cursa c, grupo g, horario h, taller t, materia m WHERE c.idh=h.idh AND g.idg=h.idg and h.idmat=m.idmat AND t.idt=m.idmat AND h.idp='$periodo' AND h.turno='$turno' AND g.grado=2 AND c.tr1>5;");

	return $resultado->num_rows();
}
public function TallerAp22(){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT distinct c.matricula, g.grado, c.tr2 FROM cursa c, grupo g, horario h, taller t, materia m WHERE c.idh=h.idh AND g.idg=h.idg and h.idmat=m.idmat AND t.idt=m.idmat AND h.idp='$periodo' AND h.turno='$turno' AND g.grado=2 AND c.tr2>5;");

	return $resultado->num_rows();
}
public function TallerAp23(){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT distinct c.matricula, g.grado, c.tr3 FROM cursa c, grupo g, horario h, taller t, materia m WHERE c.idh=h.idh AND g.idg=h.idg and h.idmat=m.idmat AND t.idt=m.idmat AND h.idp='$periodo' AND h.turno='$turno' AND g.grado=2 AND c.tr3>5;");

	return $resultado->num_rows();
}
//APROBADOS 3 AÑO
public function TallerAp31(){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT distinct c.matricula, g.grado, c.tr3 FROM cursa c, grupo g, horario h, taller t, materia m WHERE c.idh=h.idh AND g.idg=h.idg and h.idmat=m.idmat AND t.idt=m.idmat AND h.idp='$periodo' AND h.turno='$turno' AND g.grado=3 AND c.tr1>5;");

	return $resultado->num_rows();
}
public function TallerAp32(){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT distinct c.matricula, g.grado, c.tr3 FROM cursa c, grupo g, horario h, taller t, materia m WHERE c.idh=h.idh AND g.idg=h.idg and h.idmat=m.idmat AND t.idt=m.idmat AND h.idp='$periodo' AND h.turno='$turno' AND g.grado=3 AND c.tr2>5;");

	return $resultado->num_rows();
}
public function TallerAp33(){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT distinct c.matricula, g.grado, c.tr3 FROM cursa c, grupo g, horario h, taller t, materia m WHERE c.idh=h.idh AND g.idg=h.idg and h.idmat=m.idmat AND t.idt=m.idmat AND h.idp='$periodo' AND h.turno='$turno' AND g.grado=3 AND c.tr3>5;");

	return $resultado->num_rows();
}

//promedio general de taller 1 grado
public function Tallerprom11(){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT g.grado, AVG(c.tr1) AS prom FROM cursa c, grupo g, horario h, taller t, materia m WHERE c.idh=h.idh AND g.idg=h.idg and h.idmat=m.idmat AND t.idt=m.idmat AND h.idp='$periodo' AND h.turno='$turno' AND g.grado=1");

	return $resultado->row();
}
public function Tallerprom12(){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT g.grado, AVG(c.tr2) AS prom FROM cursa c, grupo g, horario h, taller t, materia m WHERE c.idh=h.idh AND g.idg=h.idg and h.idmat=m.idmat AND t.idt=m.idmat AND h.idp='$periodo' AND h.turno='$turno' AND g.grado=1");

	return $resultado->row();
}
public function Tallerprom13(){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT g.grado, AVG(c.tr3) AS prom FROM cursa c, grupo g, horario h, taller t, materia m WHERE c.idh=h.idh AND g.idg=h.idg and h.idmat=m.idmat AND t.idt=m.idmat AND h.idp='$periodo' AND h.turno='$turno' AND g.grado=1");

	return $resultado->row();
}

//promedio general de taller 2 grado
public function Tallerprom21(){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT g.grado, AVG(c.tr1) AS prom FROM cursa c, grupo g, horario h, taller t, materia m WHERE c.idh=h.idh AND g.idg=h.idg and h.idmat=m.idmat AND t.idt=m.idmat AND h.idp='$periodo' AND h.turno='$turno' AND g.grado=2");

	return $resultado->row();
}
public function Tallerprom22(){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT g.grado, AVG(c.tr2) AS prom FROM cursa c, grupo g, horario h, taller t, materia m WHERE c.idh=h.idh AND g.idg=h.idg and h.idmat=m.idmat AND t.idt=m.idmat AND h.idp='$periodo' AND h.turno='$turno' AND g.grado=2");

	return $resultado->row();
}
public function Tallerprom23(){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT g.grado, AVG(c.tr3) AS prom FROM cursa c, grupo g, horario h, taller t, materia m WHERE c.idh=h.idh AND g.idg=h.idg and h.idmat=m.idmat AND t.idt=m.idmat AND h.idp='$periodo' AND h.turno='$turno' AND g.grado=2");

	return $resultado->row();
}
//promedio general de taller 3 grado
public function Tallerprom31(){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT g.grado, AVG(c.tr1) AS prom FROM cursa c, grupo g, horario h, taller t, materia m WHERE c.idh=h.idh AND g.idg=h.idg and h.idmat=m.idmat AND t.idt=m.idmat AND h.idp='$periodo' AND h.turno='$turno' AND g.grado=3");

	return $resultado->row();
}
public function Tallerprom32(){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT g.grado, AVG(c.tr2) AS prom FROM cursa c, grupo g, horario h, taller t, materia m WHERE c.idh=h.idh AND g.idg=h.idg and h.idmat=m.idmat AND t.idt=m.idmat AND h.idp='$periodo' AND h.turno='$turno' AND g.grado=3");

	return $resultado->row();
}
public function Tallerprom33(){
	$turno=$this->session->userdata("turno");
	$periodo= $this->session->userdata("periodo");
	$resultado=$this->db->query("SELECT g.grado, AVG(c.tr3) AS prom FROM cursa c, grupo g, horario h, taller t, materia m WHERE c.idh=h.idh AND g.idg=h.idg and h.idmat=m.idmat AND t.idt=m.idmat AND h.idp='$periodo' AND h.turno='$turno' AND g.grado=3");

	return $resultado->row();
}
}
