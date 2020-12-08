<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php

	class Doctors extends CI_Controller{
		
		public function index(){

			if(!$this->session->userdata('logged_in')){
					redirect('pages/index');
				}
			
			$this->load->view('templates/header');
			$this->load->view('pages/doctors/index');
			$this->load->view('pages/doctors/dashboard');		
			$this->load->view('templates/footer');
		}




		/*public function viewpatient(){

			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "doctor"))) {
					redirect('redirect/index');
				}

			

			$data['patients'] = $this->Patients_Model->view();

			$this->load->view('templates/header');
			$this->load->view('pages/doctors/index');
			$this->load->view('pages/patients/viewpatient',$data);
			$this->load->view('templates/footer');
		}
		

		public function viewdoctors(){
			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "doctor"))) {
					redirect('redirect/index');
				}

			$data['doctors'] = $this->Users_Model->getdoctors();

			$this->load->view('templates/header');
			$this->load->view('pages/doctors/index');
			$this->load->view('pages/users/showdoctors',$data);
			$this->load->view('templates/footer');
			
		}


		public function all_department(){
			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "doctor"))) {
					redirect('redirect/index');
				}
			$data['departments'] = $this->Departments_Model->get_departments();

			$this->load->view('templates/header');
			$this->load->view('pages/doctors/index');
			$this->load->view('pages/departments/viewall',$data);
			$this->load->view('templates/footer');
		}*/

		public function setting(){

			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "doctor"))) {
					redirect('redirect/index');
				}

			$id = $this->session->userdata('user_id');

			$data['users'] = $this->Users_Model->get_one_user($id);

			$this->load->view('templates/header');
			$this->load->view('pages/doctors/index');
			$this->load->view('pages/users/editself',$data);
			$this->load->view('templates/footer');

		}




















	}