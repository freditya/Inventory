<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relasi extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model('relasi_model');
	}

	function index(){
		$data['hasilTransaksi'] = $this->relasi_model-getRelasi();
		$this->load->view('nav/header', $data);
		$this->load->view('retur',$data);
		$this->load->view('nav/footer');
	}


}
