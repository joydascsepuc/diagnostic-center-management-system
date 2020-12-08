<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php

	class Patients extends CI_Controller{


		public function load_addpatient(){

			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super" OR "admin"))) {
					redirect('redirect/index');
				}
			if($admintype === "super"){
				$this->load->view('templates/header');
				$this->load->view('pages/supers/index');
				$this->load->view('pages/patients/addpatient');
				$this->load->view('templates/footer');
			}elseif($admintype === "admin"){
				$this->load->view('templates/header');
				$this->load->view('pages/admins/index');
				$this->load->view('pages/patients/addpatient');
				$this->load->view('templates/footer');
			}
	
		}

		public function viewpatient(){

			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in')) {
					redirect('redirect/index');
				}

			$data['patients'] = $this->Patients_Model->view();

			if($admintype === "super"){
				$this->load->view('templates/header');
				$this->load->view('pages/supers/index');
				$this->load->view('pages/patients/viewpatient',$data);
				$this->load->view('templates/footer');
			}elseif($admintype === "admin"){
				$this->load->view('templates/header');
				$this->load->view('pages/admins/index');
				$this->load->view('pages/patients/viewpatient',$data);
				$this->load->view('templates/footer');
			}elseif($admintype === "doctor"){
				$this->load->view('templates/header');
				$this->load->view('pages/doctors/index');
				$this->load->view('pages/patients/viewpatient',$data);
				$this->load->view('templates/footer');
			}elseif($admintype === "nurse"){
				$this->load->view('templates/header');
				$this->load->view('pages/nurses/index');
				$this->load->view('pages/patients/viewpatient',$data);
				$this->load->view('templates/footer');
			}else{
				redirect('redirect/index');
			}	
		}


		
		public function add(){

			$admintype = $this->session->userdata('admintype');
			if(!($this->session->userdata('logged_in')) OR !($admintype === "admin" OR "super")){

				redirect('redirect/index');

			} 

			
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('age','Age','required');
			$this->form_validation->set_rules('gender','Gender','required');
			$this->form_validation->set_rules('bloodgroup','Bloodgroup','required');
			/*$this->form_validation->set_rules('reference','Reference');*/
			/*$this->form_validation->set_rules('patientid','PatientID');*/
			$this->form_validation->set_rules('guardianname','Guardianname','required');
			$this->form_validation->set_rules('mobile','Mobile','required');
			$this->form_validation->set_rules('email','Email');
			$this->form_validation->set_rules('maritial','Maritial','required');
			$this->form_validation->set_rules('religion','Religion','required');
			$this->form_validation->set_rules('nationality','Nationality','required');
			$this->form_validation->set_rules('address','Address');
			$this->form_validation->set_rules('emergencyName','EmergencyName','required');
			$this->form_validation->set_rules('relationwithpatient','Relationwithpatient','required');
			$this->form_validation->set_rules('emergencyContact','emergencyContact','required');
			$this->form_validation->set_rules('emergencyContacttwo','emergencyContacttwo');

			

			if($this->form_validation->run() === FALSE){

				redirect('redirect/index');

			}else{

				$this->Patients_Model->add();

				redirect('redirect/index');
			}
		}

		public function edit(){

			$id = $this->uri->segment('3');
			$data['patients'] = $this->Patients_Model->getsingle($id);

			/*var_dump($data);*/

			$logged_in = $this->session->userdata('logged_in');
			$admintype = $this->session->userdata('admintype');

			if(!$logged_in){

				redirect('redirect/index');

			}elseif($admintype === "super"){

				$this->load->view('templates/header');
				$this->load->view('pages/supers/index');
				$this->load->view('pages/patients/editpatient',$data);
				$this->load->view('templates/footer');
			}elseif($admintype === "admin"){
				$this->load->view('templates/header');
				$this->load->view('pages/admins/index');
				$this->load->view('pages/patients/editpatient',$data);
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

			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('age','Age','required');
			$this->form_validation->set_rules('gender','Gender','required');
			$this->form_validation->set_rules('bloodgroup','Bloodgroup','required');
			/*$this->form_validation->set_rules('reference','Reference');*/
			/*$this->form_validation->set_rules('patientid','PatientID');*/
			$this->form_validation->set_rules('guardianname','Guardianname','required');
			$this->form_validation->set_rules('mobile','Mobile','required');
			$this->form_validation->set_rules('email','Email');
			$this->form_validation->set_rules('maritial','Maritial','required');
			$this->form_validation->set_rules('religion','Religion','required');
			$this->form_validation->set_rules('nationality','Nationality','required');
			$this->form_validation->set_rules('address','Address');
			$this->form_validation->set_rules('emergencyName','EmergencyName','required');
			$this->form_validation->set_rules('relationwithpatient','Relationwithpatient','required');
			$this->form_validation->set_rules('emergencyContact','emergencyContact','required');
			$this->form_validation->set_rules('emergencyContacttwo','emergencyContacttwo');

			if($this->form_validation->run() === FALSE){
				$this->session->set_flashdata('validation_error','Validation Error.');
				redirect('patients/viewpatient');
				
			}else{

				$result = $this->Patients_Model->update();
				if($result){
					$this->session->set_flashdata('patient_updated','Patient Information updated.');
					redirect('patients/viewpatient');
				}else{
					$this->session->set_flashdata('patient_not_updated','Patient Information not updated.');
					redirect('patients/viewpatient');
				}

				
			}

		}

		public function view_patient_details(){
			$admintype = $this->session->userdata('admintype');
			if(!($this->session->userdata('logged_in')) OR !($admintype === "admin" OR "super")){

				redirect('redirect/index');	
			}

			$id = $this->uri->segment('3');
			$data['patients'] = $this->Patients_Model->getsingle($id);

			if($admintype === "super"){
				$this->load->view('templates/header');
				$this->load->view('pages/supers/index');
				$this->load->view('pages/patients/view_patient_details',$data);
				$this->load->view('templates/footer');
			}elseif($admintype === "admin"){
				$this->load->view('templates/header');
				$this->load->view('pages/admins/index');
				$this->load->view('pages/patients/view_patient_details',$data);
				$this->load->view('templates/footer');
			}else{
				redirect('redirect/index');
			}



		}

















	}