<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    //Do your magic here
    $this->load->model('m_upload');
  }

  public function index()
  {
  $data['title']='<title> File -> Codeigniter</title>';
    // $this->load->view('role','isi','upload',$data);
  $data['gbr']=$this->m_upload->cari()->result();
  $this->load->view('nav/header', $data);
  $this->load->view('gambar/upload',$data);
  $this->load->view('nav/footer');
  }
  public function proses()
  {
            $config =  array(
                  'upload_path'     => "./assets/img/",
                  'allowed_types'   => "gif|jpg|png|jpeg",
                  'encrypt_name'    => False, // 
                  'max_size'        => "50000",  // ukuran file gambar
                  'max_height'      => "9680",
                  'max_width'       => "9024"
                                   );
                  $this->upload->initialize($config);
                  $this->load->library('upload',$config);

               if ( ! $this->upload->do_upload('tb_user')) {
               $data['title']='<title> File -> Codeigniter</title>';
                 $data['pesan']=$this->upload->display_errors();
                 // $this->load->view('role', 'isi','upload',$data);
                  $data['gbr']=$this->m_upload->cari()->result();
                  $this->load->view('nav/header', $data);
                  $this->load->view('gambar/upload',$data);
                  $this->load->view('nav/footer');
                  } else {

                                $upload_data=$this->upload->data();
                                $nama_file=$upload_data['file_name'];
                                $ukuran_file=$upload_data['file_size'];
                                //resize img + thumb Img -- Optional
                                $config['image_library'] = 'gd2';
                                $config['source_image'] =$upload_data['full_path'];
                                $config['create_thumb'] = FALSE;
                                $config['maintain_ratio'] = TRUE;
                                $config['width']         = 150;
                                $config['height']       = 150;
                                $this->image_lib->initialize($config);
                                if (!$this->image_lib->resize())
                                {
                                  $data['pesan']=$this->image_lib->display_errors();
                                  // $this->load->view('role', 'isi','upload',$data);
                                    $data['gbr']=$this->m_upload->cari()->result();
                                    $this->load->view('nav/header', $data);
                                    $this->load->view('gambar/upload',$data);
                                    $this->load->view('nav/footer');
                                  exit;
                                }
                //simpan database
                                $this->m_upload->save($nama_file,$ukuran_file); 
                                $this->session->set_flashdata('pesan','1 gambar berhasil di upload');
                                // redirect('','refresh');
                                    $data['gbr']=$this->m_upload->cari()->result();
                                    $this->load->view('nav/header', $data);
                                    $this->load->view('gambar/upload');
                                    $this->load->view('nav/footer');
                    }                            
  }

}

/* End of file Upload.php */
/* Location: ./application/controllers/Upload.php */