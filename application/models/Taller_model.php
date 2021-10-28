<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Taller_model extends CI_Model {
	public function getTaller(){
		$resultados=$this->db->query("select * from taller");

		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
		
	}

	public function addtaller($idt, $nomt){
		$resultado=$this->db->query("insert into taller (idt, nomt) 
									values ('$idt', '$nomt')"); 
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}

	public function Modtaller($idt, $nomt, $idt2){
		$resultado=$this->db->query("update taller set idt='$idt2', nomt='$nomt' where idt='$idt'"); 
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
}