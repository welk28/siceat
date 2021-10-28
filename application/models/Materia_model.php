<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materia_model extends CI_Model {
	public function getMaterias(){
		$resultados=$this->db->query("select * from materia order by grado");

		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
		
	}

	public function addMateria($idmat, $nommat, $grado, $status){
		$resultado=$this->db->query("insert into materia (idmat, nommat, grado, status) 
									values ('$idmat', '$nommat', $grado, $status)"); 
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}

	public function modMateria($idmat, $nommat, $grado, $status, $idmat2){
		$resultado=$this->db->query("update materia set idmat='$idmat2', nommat='$nommat', grado=$grado, status=$status where idmat='$idmat'"); 
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	
}