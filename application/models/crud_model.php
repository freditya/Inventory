<?php  
 class Crud_model extends CI_Model  
 {  
      var $table = "tb_user";  
      var $select_column = array("id_user", "username", "password", "nama_user", "image");  
      var $order_column = array(null, "username", "password", "nama_user", null, null);  
      function make_query()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("username", $_POST["search"]["value"]);  
                $this->db->or_like("password", $_POST["search"]["value"]); 
                $this->db->or_like("nama_user", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id_user', 'DESC');  
           }  
      }  
      function make_datatables(){  
           $this->make_query();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_data(){  
           $this->make_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table);  
           return $this->db->count_all_results();  
      }  
      function insert_crud($data)  
      {  
           $this->db->insert('tb_users', $data);  
      }  
      function fetch_single_user($user_id)  
      {  
           $this->db->where("id_user", $user_id);  
           $query=$this->db->get('tb_users');  
           return $query->result();  
      }  
      function update_crud($user_id, $data)  
      {  
           $this->db->where("id_user", $user_id);  
           $this->db->update("tb_users", $data);  
      }  
 }  