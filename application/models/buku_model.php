<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {

// public function showAllRetur(){
// 		$this->db->order_by('kd_retur', 'desc');
// 		$query = $this->db->get('tb_retur');
// 		if($query->num_rows() > 0){
// 			return $query->result();
// 		}else{
// 			return false;
// 		}
// 	}



	public function showAllBuku(){
		$this->db->order_by('kd_buku', 'desc');
		$this->db->select('tb_buku.kd_buku, tb_buku.judul, tb_kategori.nama_kategori, tb_penulis.nama_penulis, tb_penerbit.nama_penerbit, tb_buku.kd_ukuran, tb_ukuran.ukuran, tb_buku.jml_halaman, tb_buku.isbn, tb_buku.thn_terbit, tb_buku.harga, tb_buku.stok, tb_buku.keterangan, tb_buku.status');
		$this->db->from('tb_buku');
		$this->db->join('tb_kategori','tb_buku.kd_kategori=tb_kategori.kd_kategori');
		$this->db->join('tb_penerbit','tb_buku.kd_penerbit=tb_penerbit.kd_penerbit');
		$this->db->join('tb_ukuran','tb_buku.kd_ukuran=tb_ukuran.kd_ukuran');
		$this->db->join('tb_penulis','tb_buku.kd_penulis=tb_penulis.kd_penulis');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}


public function getAllBuku(){
		$this->db->order_by('kd_buku', 'desc');
		$this->db->select('tb_buku.kd_buku, tb_buku.judul, tb_kategori.nama_kategori, tb_penulis.nama_penulis, tb_penerbit.nama_penerbit, tb_buku.kd_ukuran, tb_ukuran.ukuran, tb_buku.jml_halaman, tb_buku.isbn, tb_buku.thn_terbit, tb_buku.harga, tb_buku.stok, tb_buku.keterangan, tb_buku.status');
		$this->db->from('tb_buku');
		$this->db->join('tb_kategori','tb_buku.kd_kategori=tb_kategori.kd_kategori');
		$this->db->join('tb_penerbit','tb_buku.kd_penerbit=tb_penerbit.kd_penerbit');
		$this->db->join('tb_ukuran','tb_buku.kd_ukuran=tb_ukuran.kd_ukuran');
		$this->db->join('tb_penulis','tb_buku.kd_penulis=tb_penulis.kd_penulis');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}




	public function get_detail(){
		$this->db->order_by('kd_buku', 'desc');
		$this->db->select('tb_buku.kd_buku, tb_buku.judul, tb_kategori.nama_kategori, tb_penulis.nama_penulis, tb_penerbit.nama_penerbit, tb_buku.kd_ukuran, tb_ukuran.ukuran, tb_buku.jml_halaman, tb_buku.isbn, tb_buku.thn_terbit, tb_buku.harga, tb_buku.stok, tb_buku.keterangan, tb_buku.status');
		$this->db->from('tb_buku');
		$this->db->join('tb_kategori','tb_buku.kd_kategori=tb_kategori.kd_kategori');
		$this->db->join('tb_penerbit','tb_buku.kd_penerbit=tb_penerbit.kd_penerbit');
		$this->db->join('tb_ukuran','tb_buku.kd_ukuran=tb_ukuran.kd_ukuran');
		$this->db->join('tb_penulis','tb_buku.kd_penulis=tb_penulis.kd_penulis');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function total(){
		$query = $this->db->query("select * from tb_buku");
		$total = $query->num_rows();
		return $total;
	}

	function get_kategori(){
		$hasil=$this->db->query("SELECT * FROM tb_kategori");
		return $hasil;
	}

	function get_ukuran(){
		$hasil=$this->db->query("SELECT * FROM tb_ukuran");
		return $hasil;
	}



	public function addBuku(){
		$field = array(
			'judul'=>$this->input->post('judul'),
			'kd_kategori'=>$this->input->post('kd_kategori'),
			'kd_penulis'=>$this->input->post('kd_penulis'),
			'kd_penerbit'=>$this->input->post('kd_penerbit'),
			'kd_ukuran'=>$this->input->post('kd_ukuran'),
			'jml_halaman'=>$this->input->post('jml_halaman'),
			'isbn'=>$this->input->post('isbn'),
			'thn_terbit'=>$this->input->post('thn_terbit'),
			'harga'=>$this->input->post('harga'),
			'stok'=>$this->input->post('stok'),
			'keterangan'=>$this->input->post('keterangan'),
			'status'=>$this->input->post('status'),
		);
		$this->db->insert('tb_buku', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function editBuku(){
		$kd_buku = $this->input->get('kd_buku');
		$this->db->where('kd_buku', $kd_buku);
		$query = $this->db->get('tb_buku');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateBuku(){
		$kd_buku = $this->input->post('kd_buku');
		$field = array(
			'judul'=>$this->input->post('judul'),
			'kd_kategori'=>$this->input->post('kd_kategori'),
			'kd_penulis'=>$this->input->post('kd_penulis'),
			'kd_penerbit'=>$this->input->post('kd_penerbit'),
			'kd_ukuran'=>$this->input->post('kd_ukuran'),
			'jml_halaman'=>$this->input->post('jml_halaman'),
			'isbn'=>$this->input->post('isbn'),
			'thn_terbit'=>$this->input->post('thn_terbit'),
			'harga'=>$this->input->post('harga'),
			'stok'=>$this->input->post('stok'),
			'keterangan'=>$this->input->post('keterangan'),
			'status'=>$this->input->post('status'),
		);
		$this->db->where('kd_buku', $kd_buku);
		$this->db->update('tb_buku', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function deleteBuku(){
		$kd_buku = $this->input->get('kd_buku');
		$this->db->where('kd_buku', $kd_buku);
		$this->db->delete('tb_buku');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

}
