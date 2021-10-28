<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	public function login($tipo, $usuario, $contra){
		

		$resultados=$this->db->query("select * from rol as r, personal as p, permisos as pe 
where r.idr=pe.idr and p.rfcp=pe.rfcp and p.rfcp='$usuario' and passp='$contra' and pe.idr='$tipo'");

		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}

	public function periodo(){
		$predet=$this->db->query("select * from periodo where predet='1'");
		if($predet->num_rows()>0){
			return $predet->row();
		}else{
			return false;
		}
	}

	public function changePass($contra){
		$rfcp=$this->session->userdata("personal");
		$resultado=$this->db->query("update personal set passp=sha1('$contra') where rfcp='$rfcp'");

		return $resultado;
	}
}
