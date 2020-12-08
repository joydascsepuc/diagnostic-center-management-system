<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php

	class Users_Model extends CI_Model{
		
		public function adduser(){

			$data = array(

				'name' => $this->input->post('name'),
				'gender' => $this->input->post('gender'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'admintype' => $this->input->post('admintype'),
				'mobile' => $this->input->post('mobile'),
				'address' => $this->input->post('address')
			);

			return $this->db->insert('users',$data);
		}

		public function viewall(){
			$this->db->order_by('users.id','DESC');
			$query = $this->db->get('users');
			return $query->result_array();
		}

		public function getsingle($id){

			$this->db->where('id',$id);
			$query = $this->db->get('users',$id);
			return $query->result_array();
		}

		public function update(){

			$id = $this->input->post('id');
			$data = array(	
			'name' => $this->input->post('name'),
			'mobile' => $this->input->post('mobile'),
			'gender' => $this->input->post('gender'),
			'email' => $this->input->post('email'),
			'admintype' => $this->input->post('admintype'),
			'address' => $this->input->post('address')
			);

			$this->db->where('id',$id);
			return $this->db->update('users',$data);
		}

		public function getadmins(){

			$admintype = "admin";
			$this->db->order_by('users.id','DESC');
			$this->db->where('admintype',$admintype);
			$query = $this->db->get('users');
			return $query->result_array();

		}

		public function getdoctors(){
			
			$admintype = "doctor";
			$this->db->order_by('users.id','DESC');
			$this->db->where('admintype',$admintype);
			$query = $this->db->get('users');
			return $query->result_array();
		}

		public function getnurses(){
			
			$admintype = "nurse";
			$this->db->order_by('users.id','DESC');
			$this->db->where('admintype',$admintype);
			$query = $this->db->get('users');
			return $query->result_array();
		}

		public function get_one_user($id){
		
			$this->db->where('id',$id);
			$query = $this->db->get('users');
			return $query->result_array();
		}

		public function updateself(){

			$id = $this->input->post('id');
			$data = array(	
			'name' => $this->input->post('name'),
			'mobile' => $this->input->post('mobile'),
			'gender' => $this->input->post('gender'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),			
			'address' => $this->input->post('address')
			);

			$this->db->where('id',$id);
			return $this->db->update('users',$data);
		}

		
		function is_email_available($email){

           $this->db->where('email', $email);  
           $query = $this->db->get("users");  
           if($query->num_rows() > 0){  
                return true;  
           }else{  
                return false;  
           }  
      	}
		
		 function is_username_available($username){

           $this->db->where('username', $username);  
           $query = $this->db->get("users");  
           if($query->num_rows() > 0){
                return true;  
           }else{
                return false;  
           }  
      	}

      	










	}