<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Altatrim_model extends CI_Model {

    public function activoTrim(){
        $turno=$this->session->userdata("turno");
        if($turno=='M'){
            $id=3;
        }else{
            if($turno=='V'){
                $id=4;
            }
        }
        $resultado=$this->db->query("select * from trimestre t, control c where c.val=t.trim and c.idc='$id'");
        if ($resultado->num_rows() > 0) {
			return $resultado->row();
		}
		else{
			return false;
		}
    }
	public function activoTrim2(){
        $turno=$this->session->userdata("turno");
        if($turno=='M'){
            $id=5;
        }else{
            if($turno=='V'){
                $id=6;
            }
        }
        $resultado=$this->db->query("select * from trimestre t, control c where c.val=t.trim and c.idc='$id'");
        if ($resultado->num_rows() > 0) {
			return $resultado->row();
		}
		else{
			return false;
		}
    }
    public function activoTrimb(){
        $turno=$this->session->userdata("turno");
        
        $resultado=$this->db->query("select * from trimestre t, control c where c.val=t.trim and c.idc=4");
        if ($resultado->num_rows() > 0) {
			return $resultado->row();
		}
		else{
			return false;
		}
    }
    public function updateTrim($trm){
        $turno=$this->session->userdata("turno");
        if($turno=='M'){
            $id=3;
        }else{
            if($turno=='V'){
                $id=4;
            }
        }
        
        $resultado=$this->db->query("update control set val='$trm' where idc='$id'");
        if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
    } 
	public function updateTrimcon($trm){
        $turno=$this->session->userdata("turno");
        if($turno=='M'){
            $id=5;
        }else{
            if($turno=='V'){
                $id=6;
            }
        }
        
        $resultado=$this->db->query("update control set val='$trm' where idc='$id'");
        if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
    }
    public function getTrim(){
        
        $resultado=$this->db->query("select * from trimestre");
        if ($resultado->num_rows() > 0) {
			return $resultado->result();
		}
		else{
			return false;
		}
    }
	public function cambiaTrim(){
		$resultado=$this->db->query("insert into taller (idt, nomt) 
									values ('$idt', '$nomt')"); 
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
}
