<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model('penerbit_model', 'm');
		$this->load->model('penulis_model', 'p');
		$this->load->model('retur_model', 'r');
		$this->load->model('penjualan_model', 'j');
		$this->load->model('kategori_model', 'k');
		$this->load->model('buku_model', 'b');
		$this->load->model('user_model', 'u');
		$this->load->model('distributor_model', 'd');
		$this->load->model('model_login');
		$this->load->model('m_ganti');
		$this->load->model('m_upload');
		if (!isset($this->session->userdata['user_id'])) {
  			redirect("auth");
  }
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}

	function index(){
		if($this->model_login->logged_id())
		{
			$data['total'] = $this->b->total();
			$data['total_p'] = $this->j->total_p();
			$data['total_r'] = $this->r->total_r();
			$data['gbr']=$this->m_upload->cari()->result();
			$this->load->view("nav/header", $data);	
			$this->load->view("dashboard", $data);	
			$this->load->view("nav/footer");			

		}else{

			//jika session belum terdaftar, maka redirect ke halaman login
			redirect("auth");

		}
		
	}

	function penerbit(){
		$data['gbr']=$this->m_upload->cari()->result();
		$this->load->view("nav/header", $data);
		$this->load->view('penerbit');
		$this->load->view('nav/footer');
	}


	function penulis(){
		$data['gbr']=$this->m_upload->cari()->result();
		$this->load->view("nav/header", $data);
		$this->load->view('penulis');
		$this->load->view('nav/footer');
	}

	function retur(){
		$x['data']=$this->r->get_buku();
		$x['distributor']=$this->r->get_distributor()->result();
		$data['gbr']=$this->m_upload->cari()->result();
		$this->load->view("nav/header", $data);
		$this->load->view('retur',$x);
		$this->load->view('nav/footer');
	}

	function penjualan(){
		$x['data']=$this->j->get_buku()->result();
		$x['distributor']=$this->j->get_distributor()->result();
		$data['gbr']=$this->m_upload->cari()->result();
		$this->load->view("nav/header", $data);
		$this->load->view('penjualan',$x);
		$this->load->view('nav/footer');
	}
	function kategori(){
		$data['gbr']=$this->m_upload->cari()->result();
		$this->load->view("nav/header", $data);
		$this->load->view('kategori');
		$this->load->view('nav/footer');
	}
	function buku(){
		$x['data'] = $this->b->get_kategori();
		$x['penerbit']=$this->m->get_penerbit()->result();
		$x['penulis']=$this->p->get_penulis()->result();
		$x['ukuran']=$this->b->get_ukuran()->result();
		$data['gbr']=$this->m_upload->cari()->result();
		$this->load->view("nav/header", $data);
		$this->load->view('buku', $x);
		$this->load->view('nav/footer');
	}
	function user(){
		$data['gbr']=$this->m_upload->cari()->result();
		$this->load->view("nav/header", $data);
		$this->load->view('user');
		$this->load->view('nav/footer');
	}

	function change(){
		$data['gbr']=$this->m_upload->cari()->result();
		$this->load->view("nav/header", $data);
		$this->load->view('nav/ganti');
		$this->load->view('nav/footer');
	}

	function distributor(){
		$data['gbr']=$this->m_upload->cari()->result();
		$this->load->view("nav/header", $data);
		$this->load->view('distributor');
		$this->load->view('nav/footer');
	}



	//penerbit

	public function showAllPenerbit(){
		$result = $this->m->showAllPenerbit();
		echo json_encode($result);
	}

	public function addPenerbit(){
		$result = $this->m->addPenerbit();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editPenerbit(){
		$result = $this->m->editPenerbit();
		echo json_encode($result);
	}

	public function updatePenerbit(){
		$result = $this->m->updatePenerbit();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deletePenerbit(){
		$result = $this->m->deletePenerbit();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}


	//penulis

	public function showAllPenulis(){
		$result = $this->p->showAllPenulis();
		echo json_encode($result);
	}

	public function addPenulis(){
		$result = $this->p->addPenulis();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editPenulis(){
		$result = $this->p->editPenulis();
		echo json_encode($result);
	}

	public function updatePenulis(){
		$result = $this->p->updatePenulis();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deletePenulis(){
		$result = $this->p->deletePenulis();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}


	//penjualan

	// function get_harga(){
	// 	$kd_buku=$this->input->post('kd_buku');
	// 	$data1=$this->j->get_data_buku_bykode($kd_buku);
	// 	// foreach ($data1 as $buku) {
	// 	// 	$total = $buku->harga;
	// 	// }
	// 	// $perkalian=$total * $harga;
	// 	echo json_encode($data1);
	// 	}

	function get_buku(){
		$kd_buku=$this->input->post('kd_buku');
		$data=$this->j->get_data_buku_bykode($kd_buku);
		echo json_encode($data);
		}

		// function get_harga(){
		// $data['v1']=$this->input->post('jml_jual')
		// $data['v2'] = $this->j->get_harga();
		// $total['hasil'] = $data['v1']*$data['v2'];
		// }

	// function get_harga(){
	// 	$harga=$this->input->post('harga');
	// 	$data1=$this->j->get_harga($kd_buku)->result();
	// 	foreach ($data1 as $harga) {
	// 		$total=$harga->harga;
	// 	}
	// 	$perkalian = $harga * $total; 
	// 	echo json_encode($perkalian);
	// 	}

	public function showAllPenjualan(){
		$result = $this->j->showAllPenjualan();
		echo json_encode($result);
	}

	public function addPenjualan(){
		$result = $this->j->addPenjualan();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editPenjualan(){
		$result = $this->j->editPenjualan();
		echo json_encode($result);
	}

	public function updatePenjualan(){
		$result = $this->j->updatePenjualan();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deletePenjualan(){
		$result = $this->j->deletePenjualan();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}


	//Retur

	public function showAllRetur(){
		$result = $this->r->showAllRetur();
		echo json_encode($result);
	}

	public function addRetur(){
		$result = $this->r->addRetur();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editRetur(){
		$result = $this->r->editRetur();
		echo json_encode($result);
	}

	public function updateRetur(){
		$result = $this->r->updateRetur();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteRetur(){
		$result = $this->r->deleteRetur();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	//distributor

	public function showAllDistributor(){
		$result = $this->d->showAllDistributor();
		echo json_encode($result);
	}

	public function addDistributor(){
		$result = $this->d->addDistributor();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editDistributor(){
		$result = $this->d->editDistributor();
		echo json_encode($result);
	}

	public function updateDistributor(){
		$result = $this->d->updateDistributor();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteDistributor(){
		$result = $this->d->deleteDistributor();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}


	//kategori

	public function showAllKategori(){
		$result = $this->k->showAllKategori();
		echo json_encode($result);
	}

	public function addKategori(){
		$result = $this->k->addKategori();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editKategori(){
		$result = $this->k->editKategori();
		echo json_encode($result);
	}

	public function updateKategori(){
		$result = $this->k->updateKategori();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteKategori(){
		$result = $this->k->deleteKategori();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	//buku

	public function showAllBuku(){
		$result = $this->b->showAllBuku();
		echo json_encode($result);
	}

	public function get_detail(){
		$result = $this->b->get_detail();
		echo json_encode($result);
	}

	public function addBuku(){
		$result = $this->b->addBuku();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editBuku(){
		$result = $this->b->editBuku();
		echo json_encode($result);
	}

	public function updateBuku(){
		$result = $this->b->updateBuku();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteBuku(){
		$result = $this->b->deleteBuku();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}


	//user

	public function showAllUser(){
		$result = $this->u->showAllUser();
		echo json_encode($result);
	}

	public function addUser(){
		$result = $this->u->addUser();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editUser(){
		$result = $this->u->editUser();
		echo json_encode($result);
	}

	public function updateUser(){
		$result = $this->u->updateUser();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteUser(){
		$result = $this->u->deleteUser();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}
