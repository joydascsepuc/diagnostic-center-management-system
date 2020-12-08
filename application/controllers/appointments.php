<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointments extends CI_Controller {

	public function LoadAddNew(){

		$admintype = $this->session->userdata('admintype');
		if(!$this->session->userdata('logged_in') OR (!($admintype === "super" OR "admin"))) {
				redirect('redirect/index');
			}

		if($admintype === "super"){

			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/appointments/addNew');
			$this->load->view('templates/footer');

		}elseif($admintype === "admin"){

			$this->load->view('templates/header');
			$this->load->view('pages/admins/index');
			$this->load->view('pages/appointments/addNew');
			$this->load->view('templates/footer');

		}else{
			
			redirect('redirect/index');

		}

	}

	public function addNewAppoiment(){

		$admintype = $this->session->userdata('admintype');
		if(!$this->session->userdata('logged_in') OR (!($admintype === "super" OR "admin"))) {
				redirect('redirect/index');
			}
		$result = $this->Appoints_Model->addNewAppoiment();

		if($result){
			$this->session->set_flashdata('appointment_added','Appointment created successfully.');
			redirect('appointments/LoadAddNew','refresh');
		}else{
			$this->session->set_flashdata('appointment_not_added','Appointment not added.');
			redirect('appointments/LoadAddNew','refresh');
		}
	}


	public function allAppoints(){

	}

















	/*AJAX CALLING*/
	public function fetchDoctorIDForSearch(){

		$search = $this->input->post('search');
		$html='';

		$doctors = $this->Appoints_Model->getDoctorIDForSearch($search);

		if (count($doctors)>0){ 

			$html= '<ul class="list-unstyled ulistStyle" id="dID">';

			foreach ($doctors as $key => $value) {
 		 		$html.= '<li class="liStyle" id="'.$value['id'].'">'.$value['name'].'-'.$value['doctorid'].'-'.$value['mobile'].'</li>';
 		 	}

			$html.= '</ul>';
		}
		
		echo ($html);
	}

	public function fetchDoctor(){

		$docID = $this->input->post('dID');
		$doc = $this->Tests_Model->getsingleDoctorRow($docID);
		echo json_encode($doc);
	}














}

