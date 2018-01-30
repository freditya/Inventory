<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerbit_model extends CI_Model {

public function showAllPenerbit(){
		$this->db->order_by('kd_penerbit', 'desc');
		$query = $this->db->get('tb_penerbit');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function get_penerbit(){
        $hasil=$this->db->query("SELECT * FROM tb_penerbit");
        return $hasil;
    }

	public function addPenerbit(){
		$field = array(
			'nama_penerbit'=>$this->input->post('nama_penerbit'),
			'telp_penerbit'=>$this->input->post('telp_penerbit'),
			);
		$this->db->insert('tb_penerbit', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function editPenerbit(){
		$kd_penerbit = $this->input->get('kd_penerbit');
		$this->db->where('kd_penerbit', $kd_penerbit);
		$query = $this->db->get('tb_penerbit');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updatePenerbit(){
		$kd_penerbit = $this->input->post('kd_penerbit');
		$field = array(
		'nama_penerbit'=>$this->input->post('nama_penerbit'),
		'telp_penerbit'=>$this->input->post('telp_penerbit'),
		);
		$this->db->where('kd_penerbit', $kd_penerbit);
		$this->db->update('tb_penerbit', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function deletePenerbit(){
		$kd_penerbit = $this->input->get('kd_penerbit');
		$this->db->where('kd_penerbit', $kd_penerbit);
		$this->db->delete('tb_penerbit');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

}
