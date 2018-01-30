<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ganti extends CI_Model {

public function showAllUser(){
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get('tb_user');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function cari_id($where1, $where2){
		$this->db->select('id_user');
		$this->db->from('tb_user');
		$this->db->where('usernama',$where1);
		$this->db->where('nama_user', $where2);

		$query = $this->db->get();
		return $query;
	}

	public function edit_pas($where, $data){
		$this->db->where($where);
		$this->db->update('tb_user', $data);

	}	


	public function cari_pas_lama($pass){
		$this->db->select('password');
		$this->db->from('tb_user');
		$this->db->where('password', $pass);
		$this->db->limit(1);

		$query=$this->db->get();

		if($query->num_rows()==1){
			return $query->result();
		}else{
			return false;
		}
	}

}
