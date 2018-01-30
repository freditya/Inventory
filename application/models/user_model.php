<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

public function showAllUser(){
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get('tb_user');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function addUser(){
		$field = array(
		'nama_user'=>$this->input->post('nama_user'),
		'username'=>$this->input->post('username'),
		'password'=>$this->input->post('password'),
			);
		$this->db->insert('tb_user', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function editUser(){
		$id_user = $this->input->get('id_user');
		$this->db->where('id_user', $id_user);
		$query = $this->db->get('tb_user');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateUser(){
		$id_user = $this->input->post('id_user1');
		$field = array(
		'nama_user'=>$this->input->post('nama_user1'),
		'username'=>$this->input->post('username1'),
		// 'password'=>$this->input->post('password1'),
		);
		$this->db->where('id_user', $id_user);
		$this->db->update('tb_user', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function deleteUser(){
		$id_user = $this->input->get('id_user');
		$this->db->where('id_user', $id_user);
		$this->db->delete('tb_user');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

}
