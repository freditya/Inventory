<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ganti extends CI_Model {    
     // public function save()
     // {
     //  $pass = $this->input->post('new');
     //  $data = array (
     //   'password' => $pass
     //   );
     //  $this->db->where('username', $this->session->userdata('username'));
     //  $this->db->update('tb_user', $data);
     // }
     //md5($this->input->post('new'));

    //fungsi untuk mengecek password lama :
 public function cek_old()
 {
   $old = $this->input->post('old');    
   $this->db->where('password',$old);
   $query = $this->db->get('tb_user');
   return $query->result();;
 }




 public function save()
 {
  $pass=$this->input->post('old');
  $npass=$this->input->post('new');
  $rpass=$this->input->post('re_new');
  if($npass!=$rpass){
    return "false";
  }else{
    $this->db->select('*');
    $this->db->from('tb_user');
    $this->db->where('id_user',$this->session->userdata('user_id'));
    $this->db->where('password',$pass);
    $query = $this->db->get();
    if($query->num_rows()==1){
      $data = array(
       'password' => $npass
     );
      $this->db->where('id_user', $this->session->userdata('user_id'));
      $this->db->update('tb_user', $data); 
      return "true";
    }else{
      return "false";
    }
  }
}


}