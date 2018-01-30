<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_model extends CI_Model {

		public function total_p(){
		$query = $this->db->query("select * from tb_penjualan");
		$total = $query->num_rows();
		return $total;
	}


	public function showAllPenjualan(){
		$this->db->order_by('kd_penjualan', 'desc');
		$this->db->select('tb_penjualan.kd_penjualan,tb_distributor.kd_distributor, tb_distributor.distributor, tb_penjualan.tgl_jual, tb_buku.judul, tb_kategori.nama_kategori, tb_buku.harga, tb_penjualan.jml_jual, tb_penjualan.total_harga');
		$this->db->from('tb_penjualan');
		$this->db->join('tb_buku','tb_buku.kd_buku=tb_penjualan.kd_buku');
		$this->db->join('tb_distributor','tb_penjualan.kd_distributor=tb_distributor.kd_distributor');
		$this->db->join('tb_kategori','tb_kategori.kd_kategori=tb_buku.kd_kategori');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function getAllPenjualan(){
		$this->db->order_by('kd_penjualan', 'desc');
		$this->db->select('tb_penjualan.kd_penjualan,tb_distributor.kd_distributor, tb_distributor.distributor, tb_penjualan.tgl_jual, tb_buku.judul, tb_kategori.nama_kategori, tb_buku.harga, tb_penjualan.jml_jual, tb_penjualan.total_harga');
		$this->db->from('tb_penjualan');
		$this->db->join('tb_buku','tb_buku.kd_buku=tb_penjualan.kd_buku');
		$this->db->join('tb_distributor','tb_penjualan.kd_distributor=tb_distributor.kd_distributor');
		$this->db->join('tb_kategori','tb_kategori.kd_kategori=tb_buku.kd_kategori');
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
  

    // function get_harga(){
    //     $hasil=$this->db->query("SELECT tb_buku.harga FROM tb_buku");
    //     return $hasil;
    // }


 
	function get_data_buku_bykodebuku($kd_buku){
		$hsl=$this->db->query("SELECT tb_buku.kd_buku,tb_buku.judul, tb_buku.harga, tb_kategori.kd_kategori, tb_kategori.nama_kategori FROM tb_buku,tb_kategori WHERE tb_kategori.kd_kategori=tb_buku.kd_kategori and kd_buku='$kd_buku'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'kd_buku' => $data->kd_buku,
					'judul' => $data->judul,
					'harga' => $data->harga,
					'kd_kategori' => $data->kd_kategori,
					'nama_kategori' => $data->nama_kategori,
					);
			}
		}
		return $hasil;
	}

	function get_data_buku_bykode($kd_buku){
		$hsl=$this->db->query("SELECT tb_buku.kd_buku,tb_buku.judul, tb_buku.harga FROM tb_buku WHERE kd_buku='$kd_buku'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'kd_buku' => $data->kd_buku,
					'judul' => $data->judul,
					'harga' => $data->harga,
					);
			}
		}
		return $hasil;
	}


	public function addPenjualan(){
		$field = array(
			'kd_distributor'=>$this->input->post('kd_distributor'),
			'tgl_jual'=>$this->input->post('tgl_jual'),
			'kd_buku'=>$this->input->post('kd_buku'),
			'harga'=>$this->input->post('harga'),
			'jml_jual'=>$this->input->post('jml_jual'),
			'total_harga'=>$this->input->post('total_harga'),
			);
		$this->db->insert('tb_penjualan', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function editPenjualan(){
		$kd_penjualan = $this->input->get('kd_penjualan');
		$this->db->where('kd_penjualan', $kd_penjualan);
		$query = $this->db->get('tb_penjualan');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updatePenjualan(){
		$kd_penjualan = $this->input->post('kd_penjualan');
		$field = array(
			'kd_distributor'=>$this->input->post('kd_distributor'),
			'tgl_jual'=>$this->input->post('tgl_jual'),
			'kd_buku'=>$this->input->post('kd_buku'),
			'harga'=>$this->input->post('harga'),
			'jml_jual'=>$this->input->post('jml_jual'),
			'total_harga'=>$this->input->post('total_harga'),
		);
		$this->db->where('kd_penjualan', $kd_penjualan);
		$this->db->update('tb_penjualan', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function deletePenjualan(){
		$kd_penjualan = $this->input->get('kd_penjualan');
		$this->db->where('kd_penjualan', $kd_penjualan);
		$this->db->delete('tb_penjualan');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

}
