<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lihat extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_lihat');
	}

	public function index()
	{
	$data['title']='<title> Lihat File -> Codeigniter</title>';
	$data['gbr']=$this->m_lihat->img()->result();
	$this->load->view('nav/header');
    $this->load->view('gambar/lihat',$data);
    $this->load->view('nav/footer');
	}

}

/* End of file Lihat_file.php */
/* Location: ./application/controllers/Lihat_file.php */