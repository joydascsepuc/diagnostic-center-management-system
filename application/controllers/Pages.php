<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php

	class Pages extends CI_Controller{
		
		public function index(){

			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('admintype');
			$this->session->unset_userdata('username');

			 /*$this->session->keep_flashdata('wrong');*/

			$this->load->view('templates/header');
			$this->load->view('pages/index');
			$this->load->view('templates/footer');
		}

	}