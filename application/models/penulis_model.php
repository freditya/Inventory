<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penulis_model extends CI_Model {

public function showAllPenulis(){
		$this->db->order_by('kd_penulis', 'desc');
		$query = $this->db->get('tb_penulis');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function get_penulis(){
        $hasil=$this->db->query("SELECT * FROM tb_penulis");
        return $hasil;
    }

	public function addPenulis(){
		$field = array(
			'nama_penulis'=>$this->input->post('nama_penulis'),
			'alamat'=>$this->input->post('alamat'),
			'no_telp'=>$this->input->post('no_telp'),
			);
		$this->db->insert('tb_penulis', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function editPenulis(){
		$kd_penulis = $this->input->get('kd_penulis');
		$this->db->where('kd_penulis', $kd_penulis);
		$query = $this->db->get('tb_penulis');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updatePenulis(){
		$kd_penulis = $this->input->post('kd_penulis');
		$field = array(
		'nama_penulis'=>$this->input->post('nama_penulis'),
		'alamat'=>$this->input->post('alamat'),
		'no_telp'=>$this->input->post('no_telp'),
		);
		$this->db->where('kd_penulis', $kd_penulis);
		$this->db->update('tb_penulis', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function deletePenulis(){
		$kd_penulis = $this->input->get('kd_penulis');
		$this->db->where('kd_penulis', $kd_penulis);
		$this->db->delete('tb_penulis');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

}
