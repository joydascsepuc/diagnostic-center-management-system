<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php 

	class Departments extends CI_Controller{
		
		public function add_department(){

			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super" OR "admin"))) {
					redirect('redirect/index');
				}

			$this->form_validation->set_rules('title','Title','required');

			if($this->form_validation->run() === FALSE){
				redirect('redirect/index');
			}else{
				$this->Departments_Model->add_department();
				redirect('redirect/index');
			}
		}

		public function edit_department(){

			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super" OR "admin"))) {
					redirect('redirect/index');
				}
			$id = $this->uri->segment('3');
			$data['departments'] = $this->Departments_Model->getsingle($id);

			$logged_in = $this->session->userdata('logged_in');
			$admintype = $this->session->userdata('admintype');

			if(!$logged_in){

				redirect('redirect/index');

			}elseif($admintype === "super"){

				$this->load->view('templates/header');
				$this->load->view('pages/supers/index');
				$this->load->view('pages/departments/edit',$data);
				$this->load->view('templates/footer');
			}elseif($admintype === "admin"){
				$this->load->view('templates/header');
				$this->load->view('pages/admins/index');
				$this->load->view('pages/departments/edit',$data);
				$this->load->view('templates/footer');
			}else{
				redirect('redirect/index');
			}
		}

		public function update(){
			$admintype = $this->session->userdata('admintype');
			if(!($this->session->userdata('logged_in')) OR !($admintype === "admin" OR "super")){

				redirect('redirect/index');	
			}

			$this->form_validation->set_rules('title','Title','required');

			if($this->form_validation->run() === FALSE){
			redirect('redirect/index');
		}else{
				$this->Departments_Model->update_department();
				redirect('redirect/index');
			}
		}


		public function load_add_department(){
			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super"))) {
					redirect('redirect/index');
				}

			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/departments/create');
			$this->load->view('templates/footer');
		}

		public function all_department(){
			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in')) {
					redirect('redirect/index');
				}
			$data['departments'] = $this->Departments_Model->get_departments();

			if($admintype === "super"){
				$this->load->view('templates/header');
				$this->load->view('pages/supers/index');
				$this->load->view('pages/departments/viewall',$data);
				$this->load->view('templates/footer');
			}elseif($admintype === "admin"){
				$this->load->view('templates/header');
				$this->load->view('pages/admins/index');
				$this->load->view('pages/departments/viewall',$data);
				$this->load->view('templates/footer');
			}elseif($admintype === "nurse"){
				$this->load->view('templates/header');
				$this->load->view('pages/nurses/index');
				$this->load->view('pages/departments/viewall',$data);
				$this->load->view('templates/footer');
			}elseif($admintype === "doctor"){
				$this->load->view('templates/header');
				$this->load->view('pages/doctors/index');
				$this->load->view('pages/departments/viewall',$data);
				$this->load->view('templates/footer');
			}else{
				redirect('redirect/index');
			}



			
		}












	}