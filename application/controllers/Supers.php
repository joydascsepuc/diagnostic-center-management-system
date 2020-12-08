<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php

	class Supers extends CI_Controller{

		public function index(){

			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR !$admintype === "super") {
					redirect('redirect/index');
				}
			
			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/supers/dashboard');
			$this->load->view('templates/footer');
		}

		/*public function load_addpatient(){

			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super"))) {
					redirect('redirect/index');
				}

			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/patients/addpatient');
			$this->load->view('templates/footer');
		}*/

		/*public function viewpatient(){

			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super"))) {
					redirect('redirect/index');
				}



			$data['patients'] = $this->Patients_Model->view();

			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/patients/viewpatient',$data);
			$this->load->view('templates/footer');
		}*/

		/*User controls start here who can log in*/

		/*public function addnewuser(){

			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super"))) {
					redirect('redirect/index');
				}
			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/users/adduser');
			$this->load->view('templates/footer');
		}*/

		/*public function viewalluser(){
			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super"))) {
					redirect('redirect/index');
				}

			$data['users'] = $this->Users_Model->viewall();

			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/users/viewall',$data);
			$this->load->view('templates/footer');
		}*/

		/*public function viewadmins(){
			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super"))) {
					redirect('redirect/index');
				}

			$data['admins'] = $this->Users_Model->getadmins();

			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/users/showadmins',$data);
			$this->load->view('templates/footer');
		}*/

		/*public function viewdoctors(){
			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super"))) {
					redirect('redirect/index');
				}

			$data['doctors'] = $this->Users_Model->getdoctors();

			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/users/showdoctors',$data);
			$this->load->view('templates/footer');
			
		}*/

		/*public function viewnurses(){
			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super"))) {
					redirect('redirect/index');
				}

			$data['nurses'] = $this->Users_Model->getnurses();

			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/users/shownurses',$data);
			$this->load->view('templates/footer');
		}*/

		/*Users controls end here.*/

		/*public function load_add_department(){
			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super"))) {
					redirect('redirect/index');
				}

			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/departments/create');
			$this->load->view('templates/footer');
		}*/

		/*public function all_department(){
			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super"))) {
					redirect('redirect/index');
				}
			$data['departments'] = $this->Departments_Model->get_departments();

			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/departments/viewall',$data);
			$this->load->view('templates/footer');
		}*/

		public function setting(){

			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super"))) {
					redirect('redirect/index');
				}

			$id = $this->session->userdata('user_id');

			$data['users'] = $this->Users_Model->get_one_user($id);

			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/users/editself',$data);
			$this->load->view('templates/footer');

		}


		

	
























	}