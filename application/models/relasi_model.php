<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relasi_model extends CI_Model {

public function addBuku(){
		$gambarnya = $this->uploadGambar($this->input->post('kd_buku'));
		$field = array(
			'kd_buku'=>$this->input->post('kd_buku'),
			'kd_kategori'=>$this->input->post('kd_kategori'),
			'judul'=>$this->input->post('judul'),
			'kd_penulis'=>$this->input->post('kd_penulis'),
			'kd_penerbit'=>$this->input->post('kd_penerbit'),
			'gambar'=>$gambarnya,
			'ukuran'=>$this->input->post('ukuran'),
			'halaman'=>$this->input->post('halaman'),
			'deskripsi'=>$this->input->post('deskripsi'),
			'isbn'=>$this->input->post('isbn'),
			'tahun'=>$this->input->post('tahun'),
			'harga'=>$this->input->post('harga'),
			'stok'=>$this->input->post('stok'),
		);
		$this->db->insert('buku', $field);
		if($this->db->affected_rows() > 0){
			return true;
			redirect(base_url().'index.php/web/buku');
		}else{
			return false;
		}
	}
	public function editBuku(){
		$kd_buku = $this->input->get('kd_buku');
		$this->db->where('kd_buku', $kd_buku);
		$query = $this->db->get('buku');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateBuku(){
		$kd_buku = $this->input->post('kd_buku');
		$field = array(
			'kd_buku'=>$this->input->post('kd_buku'),
			'kd_kategori'=>$this->input->post('kd_kategori'),
			'judul'=>$this->input->post('judul'),
			'kd_penulis'=>$this->input->post('kd_penulis'),
			'kd_penerbit'=>$this->input->post('kd_penerbit'),
			'gambar'=>$this->input->post('gambar'),
			'ukuran'=>$this->input->post('ukuran'),
			'berat'=>$this->input->post('berat'),
			'halaman'=>$this->input->post('halaman'),
			'deskripsi'=>$this->input->post('deskripsi'),
			'isbn'=>$this->input->post('isbn'),
			'tahun'=>$this->input->post('tahun'),
			'harga'=>$this->input->post('harga'),
			'stok'=>$this->input->post('stok'),
		);
		$this->db->where('kd_buku', $kd_buku);
		$this->db->update('buku', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	function deleteBuku(){
		$kd_buku = $this->input->get('kd_buku');
		$this->db->where('kd_buku', $kd_buku);
		$this->db->delete('buku');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}


}
