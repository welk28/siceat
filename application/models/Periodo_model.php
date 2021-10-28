<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periodo_model extends CI_Model {
	public function getPeriodos(){
		$resultados=$this->db->query("select * from periodo order by idp desc");

		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
		
	}

	
}