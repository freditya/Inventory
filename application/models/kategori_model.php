<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

public function showAllKategori(){
		$this->db->order_by('kd_kategori', 'desc');
		$query = $this->db->get('tb_kategori');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function addKategori(){
		$field = array(
		'nama_kategori'=>$this->input->post('nama_kategori'),
			);
		$this->db->insert('tb_kategori', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function editKategori(){
		$kd_kategori = $this->input->get('kd_kategori');
		$this->db->where('kd_kategori', $kd_kategori);
		$query = $this->db->get('tb_kategori');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateKategori(){
		$kd_kategori = $this->input->post('kd_kategori');
		$field = array(
		'nama_kategori'=>$this->input->post('nama_kategori'),
		);
		$this->db->where('kd_kategori', $kd_kategori);
		$this->db->update('tb_kategori', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function deleteKategori(){
		$kd_kategori = $this->input->get('kd_kategori');
		$this->db->where('kd_kategori', $kd_kategori);
		$this->db->delete('tb_kategori');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

}
