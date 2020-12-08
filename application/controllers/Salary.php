<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salary extends CI_Controller {

	public function loadentrysalary(){
		$admintype = $this->session->userdata('admintype');
		if(!$this->session->userdata('logged_in') OR (!($admintype === "super"))) {
				redirect('redirect/index');
			}
		$data['employees'] = $this->Salary_Model->get_all_employee();
		$data['check'] = $this->Salary_Model->checkIfAlreadyThere();

		if($admintype === "super"){
 
			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/salary/entrysalary',$data);
			$this->load->view('templates/footer');
		}else{
			redirect('redirect/index');
		}
	}


	public function addsalary(){
		$admintype = $this->session->userdata('admintype');
		if(!$this->session->userdata('logged_in') OR (!($admintype === "super"))) {
				redirect('redirect/index');
			}

		/*$count = $this->input->post('rownumbers');
		var_dump($count);
		for($i=0; $i<$count; $i++) {
			$this->form_validation->set_rules('name'.$i,'Name'.$i,'required');
			$this->form_validation->set_rules('position'.$i,'Position'.$i,'required');
			$this->form_validation->set_rules('salary'.$i,'Salary'.$i,'required');
			$this->form_validation->set_rules('paidstatus'.$i,'Paidstatus'.$i,'required');
			$this->form_validation->set_rules('amount'.$i,'Amount'.$i,'required');		
		}
		$this->form_validation->set_rules('month','Month','required');
		$this->form_validation->set_rules('year','Year','required');

		if($this->form_validation->run() === FALSE){
			$this->session->set_flashdata('validation_error','Validation Error.');
			redirect('salary/loadentrysalary',$data);
		}else{
			// $this->Salary_Model->addsalary();
			// redirect('load/loadchecksalary');
			echo "Validation success";
		}*/

		/*$count = $this->input->post('rownumbers');
		for($i=0; $i<$count;$i++) {
		$data[$i] = array(	
				  		array(
				  			'field' => 'name'.$i,
				  			'label' => 'Name',
				  			'rules' => 'required'
				  		),
				  		array(
				  			'field' => 'position'.$i,
				  			'label' => 'Position',
				  			'rules' => 'required'
				  		),
				  		array(
				  			'field' => 'salary'.$i,
				  			'label' => 'Salary',
				  			'rules' => 'required'
				  		),
				  		array(
				  			'field' => 'paidstatus'.$i,
				  			'label' => 'Paidstatus',
				  			'rules' => 'required'
				  		),
				  		array(
				  			'field' => 'amount'.$i,
				  			'label' => 'Amount',
				  			'rules' => 'required'
				  		)				
				);
		}
		
		for($i=0; $i<$count;$i++) {
		 	$this->form_validation->set_rules($data[$i]);
		 }

		 if($this->form_validation->run() === FALSE){
			$this->session->set_flashdata('validation_error','Validation Error.');
			redirect('salary/loadentrysalary',$data);
		}else{
			// $this->Salary_Model->addsalary();
			// redirect('load/loadchecksalary');
			echo "Validation success";
		}*/


		$this->Salary_Model->addsalary();
		redirect('salary/loadchecksalary');

	}



	public function loadchecksalary(){
		$admintype = $this->session->userdata('admintype');
		if(!$this->session->userdata('logged_in') OR (!($admintype === "super" OR "admin"))) {
				redirect('redirect/index');
			}
		if($admintype === "super"){
			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/salary/checksalary');
			$this->load->view('templates/footer');
		}else if($admintype === "admin"){
			$this->load->view('templates/header');
			$this->load->view('pages/admins/index');
			$this->load->view('pages/salary/checksalary');
			$this->load->view('templates/footer');
		}else{
			redirect('redirect/index');
		}	
	}

	public function getSalarySheet(){
		$admintype = $this->session->userdata('admintype');
		if(!$this->session->userdata('logged_in') OR (!($admintype === "super" OR "admin"))) {
				redirect('redirect/index');
			}

		$data['empsalaries'] = $this->Salary_Model->getSalarySheet();
		if($admintype === "super"){
			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/salary/getsalarysheet',$data);
			$this->load->view('templates/footer');
		}else if($admintype === "admin"){
			$this->load->view('templates/header');
			$this->load->view('pages/admins/index');
			$this->load->view('pages/salary/getsalarysheet',$data);
			$this->load->view('templates/footer');
		}else{
			redirect('redirect/index');
		}
	}

	
	public function fetchEmpForSearch(){

		$admintype = $this->session->userdata('admintype');
		if(!$this->session->userdata('logged_in') OR (!($admintype === "super" OR "admin"))) {
				redirect('redirect/index');
			}


		$search = $this->input->post('search'); //posting from ajax... name as search... check 184 no line in view

		$html='';

		$employees = $this->Salary_Model->getEmpIDForSearch($search); // get data from db

		if (count($employees)>0) { // check wether blank or not

			$html= '<ul class="list-unstyled ulistStyle" id="empID">'; // an unorder list for showing the suggestions
			foreach ($employees as $key => $value) {
 		 		$html.= '<li class="liStyle" id="'.$value['id'].'">'.$value['name'].'-'.$value['employeeid'].'-'.$value['mobile'].'</li>';
 		 	}

			$html.= '</ul>';
		}
		
		echo ($html); // returning data to ajax in view
	}

	public function fetchEmployee() //this will fetch the patient by id return it to the ajax in view 
	{
		$empID = $this->input->post('eID'); //getting the ID from controller
		$emp = $this->Salary_Model->getsingleEmployeeRow($empID); //model function calling
		echo json_encode($emp); // returning data as JSON... check line 219 in view...
	}

	public function getIndividualSalary(){
		$admintype = $this->session->userdata('admintype');
		if(!$this->session->userdata('logged_in') OR (!($admintype === "super" OR "admin"))) {
				redirect('redirect/index');
			}
		$data['singlesalary'] = $this->Salary_Model->getSingleEmployeeSalarySheet();
		if($admintype === "super"){
			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/salary/getsalarysheetofSingle',$data);
			$this->load->view('templates/footer');
		}else{
			redirect('redirect/index');
		}

	}






















}

/* End of file Salary.php */
/* Location: ./application/controllers/Salary.php */