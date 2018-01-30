<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lapbuku_pdf extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
			$this->load->library('pdf');
			$this->load->model('buku_model');
			$this->load->model('retur_model');
			$this->load->model('penjualan_model');
		}

	public function cetak_produk()
		{
			$data['buku'] = $this->buku_model->getAllBuku();
			$this->load->view('laporanbuku_pdf', $data);
	}	

	public function cetak_retur()
		{
			$data['retur'] = $this->retur_model->getAllRetur();
			$this->load->view('laporanretur_pdf', $data);
	}

	public function cetak_penjualan()
		{
			$data['penjualan'] = $this->penjualan_model->getAllPenjualan();
			$this->load->view('laporanpenjualan_pdf', $data);
	}
}