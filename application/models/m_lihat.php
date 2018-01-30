<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_lihat extends CI_Model {

	public function img(){

		$this->db->select('id_user,gambar');
		$this->db->from('tb_user');
		$this->db->order_by('id_user','desc');
		return $this->db->get();
	}
}

/* End of file M_daftar.php */
/* Location: ./application/models/M_daftar.php */