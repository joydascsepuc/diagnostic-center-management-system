<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php

	class LoginModel extends CI_Model{
		
		public function login($username,$password){

			//Validate
			$this->db->where('username',$username);
			$this->db->where('password',$password);

			$result = $this->db->get('users');

			/*$data = array(

					'id' => $result->row(0)->id,
					'username' => $result->row(1)->username,
					'admintype' => $result->row(2)->admintype
				);
			var_dump($data);*/
			
			if($result->num_rows() == 1){ 

				$data = array(

					'id' => $result->row(0)->id,
					'username' => $result->row(1)->username,
					'admintype' => $result->row(5)->admintype,
					'name' =>$result->row(6)->name
				);
				return $data;
			}else{
				return false;
			}
		}
	}