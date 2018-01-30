<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_ganti extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model('m_ganti');
		$this->load->model('m_upload');
	}

	function index(){
		$data['gbr']=$this->m_upload->cari()->result();
		$this->load->view("nav/header", $data);
		$this->load->view('change');
		$this->load->view('nav/footer');
	}

	public function save_password()
	{ 
		$this->form_validation->set_rules('new','New','required|alpha_numeric');
		$this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');
		if($this->form_validation->run() == FALSE)
		{
			$data['gbr']=$this->m_upload->cari()->result();
			$this->load->view("nav/header", $data);
			$this->load->view('change');
			$this->load->view('nav/footer');
		}else{
			$cek_old = $this->m_ganti->cek_old();
			if ($cek_old == False){
				$this->session->set_flashdata('error','Old password not match!' );
				$data['gbr']=$this->m_upload->cari()->result();
				$this->load->view("nav/header", $data);
				$this->load->view('change');
				$this->load->view('nav/footer');
			}else{
				$this->m_ganti->save();
				$this->session->sess_destroy();
				$this->session->set_flashdata('error','Your password success to change, please relogin !' );
				$data['gbr']=$this->m_upload->cari()->result();
				$this->load->view("nav/header", $data);
				$this->load->view('change');
				$this->load->view('nav/footer');
   }//end if valid_user
}
}


}
