<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distributor_model extends CI_Model {

public function showAllDistributor(){
		$this->db->order_by('kd_distributor', 'desc');
		$query = $this->db->get('tb_distributor');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function addDistributor(){
		$field = array(
		'distributor'=>$this->input->post('distributor'),
		'no_telp_dis'=>$this->input->post('no_telp_dis'),
			);
		$this->db->insert('tb_distributor', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function editDistributor(){
		$kd_distributor = $this->input->get('kd_distributor');
		$this->db->where('kd_distributor', $kd_distributor);
		$query = $this->db->get('tb_distributor');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateDistributor(){
		$kd_distributor = $this->input->post('kd_distributor');
		$field = array(
		'distributor'=>$this->input->post('distributor'),
		'no_telp_dis'=>$this->input->post('no_telp_dis'),
		);
		$this->db->where('kd_distributor', $kd_distributor);
		$this->db->update('tb_distributor', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function deleteDistributor(){
		$kd_distributor = $this->input->get('kd_distributor');
		$this->db->where('kd_distributor', $kd_distributor);
		$this->db->delete('tb_distributor');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

}
