<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php

	class Logins extends CI_Controller{
		
		public function login(){

			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');

			if($this->form_validation->run() === FALSE){

				$this->load->view('templates/header');
				$this->load->view('users/login');
				$this->load->view('templates/footer');
			}else{

				//Get UserName
				$username = $this->input->post('username');
				//get and encrypt password
				$password = $this->input->post('password');
				//Calling Model & Check Information
				$info = $this->LoginModel->login($username,$password);

				/*var_dump($info);*/

				if($info){

					$id = $info['id'];
					$username = $info['username'];
					$admintype = $info['admintype'];
					$name = $info['name'];

					//Create Session
					$user_data = array(

						'user_id' => $id,
						'username' => $username,
						'admintype' => $admintype,
						'name' => $name,
						'logged_in' => true
					);

					$this->session->set_userdata($user_data);
					/*$this->session->set_flashdata('admintype', $admintype);
					$this->session->keep_flashdata('admintype');*/
					redirect('redirect/index');
					
				}else{
					$this->session->set_flashdata('wrong','Combination of username and password is not correct.');
					redirect('redirect/index');

				}
			}
		}

		public function logout(){

			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('admintype');
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('name');

			/*$admintype = "";*/
			redirect('pages/index');
		}


}