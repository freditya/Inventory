<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retur_model extends CI_Model {

// public function showAllRetur(){
// 		$this->db->order_by('kd_retur', 'desc');
// 		$query = $this->db->get('tb_retur');
// 		if($query->num_rows() > 0){
// 			return $query->result();
// 		}else{
// 			return false;
// 		}
// 	}

	public function total_r(){
		$query = $this->db->query("select * from tb_retur");
		$total = $query->num_rows();
		return $total;
	}


	public function showAllRetur(){
		$this->db->order_by('kd_retur', 'desc');
		$this->db->select('tb_retur.kd_retur, tb_retur.tgl_retur,tb_distributor.kd_distributor, tb_distributor.distributor, tb_buku.judul, tb_retur.jml_retur, tb_retur.keterangan');
		$this->db->from('tb_retur');
		$this->db->join('tb_buku','tb_buku.kd_buku=tb_retur.kd_buku');
		$this->db->join('tb_distributor','tb_distributor.kd_distributor=tb_retur.kd_distributor');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function getAllRetur(){
		$this->db->order_by('kd_retur', 'desc');
		$this->db->select('tb_retur.kd_retur, tb_retur.tgl_retur,tb_distributor.kd_distributor, tb_distributor.distributor, tb_buku.judul, tb_retur.jml_retur, tb_retur.keterangan');
		$this->db->from('tb_retur');
		$this->db->join('tb_buku','tb_buku.kd_buku=tb_retur.kd_buku');
		$this->db->join('tb_distributor','tb_distributor.kd_distributor=tb_retur.kd_distributor');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	function get_buku(){
        $hasil=$this->db->query("SELECT * FROM tb_buku");
        return $hasil;
    }

    function get_distributor(){
        $hasil=$this->db->query("SELECT * FROM tb_distributor");
        return $hasil;
    }
 
    function get_retur($kd_buku){
        $hasil=$this->db->query("SELECT * FROM tb_retur WHERE kd_buku='$kd_buku'");
        return $hasil->result();
    }

	public function addRetur(){
		$field = array(
			'kd_distributor'=>$this->input->post('kd_distributor'),
			'tgl_retur'=>$this->input->post('tgl_retur'),
			'kd_buku'=>$this->input->post('kd_buku'),
			'jml_retur'=>$this->input->post('jml_retur'),
			'keterangan'=>$this->input->post('keterangan'),
			);
		$this->db->insert('tb_retur', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function editRetur(){
		$kd_retur = $this->input->get('kd_retur');
		$this->db->where('kd_retur', $kd_retur);
		$query = $this->db->get('tb_retur');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateRetur(){
		$kd_retur = $this->input->post('kd_retur');
		$field = array(
		'kd_distributor'=>$this->input->post('kd_distributor'),
		'tgl_retur'=>$this->input->post('tgl_retur'),
		'kd_buku'=>$this->input->post('kd_buku'),
		'jml_retur'=>$this->input->post('jml_retur'),
		'keterangan'=>$this->input->post('keterangan'),
		);
		$this->db->where('kd_retur', $kd_retur);
		$this->db->update('tb_retur', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function deleteRetur(){
		$kd_retur = $this->input->get('kd_retur');
		$this->db->where('kd_retur', $kd_retur);
		$this->db->delete('tb_retur');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

}
