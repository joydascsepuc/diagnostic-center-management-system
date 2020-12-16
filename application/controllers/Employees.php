<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php 

	class Employees extends CI_Controller{
		
		public function add_employee(){

			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super"))) {
					redirect('redirect/index'); 
				}

			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('mobile','Mobile','required');
			$this->form_validation->set_rules('gender','Gender','required');
			$this->form_validation->set_rules('salary','Salary','required');
			$this->form_validation->set_rules('address','Address','required');
			$this->form_validation->set_rules('active','Active','required');
			$this->form_validation->set_rules('position','Position','required');
			$this->form_validation->set_rules('employeeid','EmployeeID','required');

			/*$this->form_validation->set_rules('commission','Commission','required');
			$this->form_validation->set_rules('paid','Paid','required');
			$this->form_validation->set_rules('pending','Pending','required');*/

			if($this->form_validation->run() === FALSE){
				$this->session->set_flashdata('validation_error','Validation Error.');
				redirect('employees/view_all_employee');
			}else{

				$this->Employee_Model->add_employee();

				//Set Message
				$this->session->set_flashdata('employee_added','Employee Added Successfully!');

				redirect('redirect/index');
			}
		}

		function check_email_avalibility(){

           if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){

                echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Invalid Email</span></label>';  
           }else{
                 
                if($this->Employee_Model->is_email_available($_POST["email"])){

                     echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span>Email Already registered</label>'; 

                }else{

                     echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> Email Available</label>';  
                }  
           }  
      }

      function check_id_avalibility(){

                 
            if($this->Employee_Model->is_id_available($_POST["employeeid"])){

                 echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span>ID Already registered</label>'; 

            }else{

                 echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span>ID Available</label>';  
            }  
       }  
      

      function check_mobile_avalibility(){
       
            if($this->Employee_Model->is_mobile_available($_POST["mobile"])){

                 echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span>Mobile Already registered</label>'; 

            }else{

                 echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span>Mobile Available</label>';  
            }  
           
      }


		public function update_employee(){

			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super" OR "admin"))) {
					redirect('redirect/index');
				}

			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('mobile','Mobile','required');
			$this->form_validation->set_rules('gender','Gender','required');
			$this->form_validation->set_rules('salary','Salary','required');
			$this->form_validation->set_rules('address','Address','required');
			$this->form_validation->set_rules('active','Active','required');
			$this->form_validation->set_rules('position','Position','required');
			$this->form_validation->set_rules('employeeid','Employeeid','required');

			if($this->form_validation->run() === FALSE){
				$this->session->set_flashdata('validation_error','Validation Error.');
				redirect('employees/view_all_employee');
			}else{

				$result = $this->Employee_Model->update_employee_information();
				if($result){
					$this->session->set_flashdata('employee_updated','Employee Information updated.');
					redirect('employees/view_all_employee');
				}else{
					$this->session->set_flashdata('employee_not_updated','Employee Information not updated.');
					redirect('employees/view_all_employee');
				}
				
			}



		}




		public function view_all_employee(){

			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super" OR "admin"))) {
					redirect('redirect/index');
				}
			$data['employees'] = $this->Employee_Model->get_all_employee();
			
			if($admintype === "super"){
				$this->load->view('templates/header');
				$this->load->view('pages/supers/index');
				$this->load->view('pages/employee/viewAllEmployee',$data);
				$this->load->view('templates/footer');
			}elseif($admintype === "admin"){
				$this->load->view('templates/header');
				$this->load->view('pages/admins/index');
				$this->load->view('pages/employee/viewAllEmployee',$data);
				$this->load->view('templates/footer');
			}else{
				redirect('redirect/index');
			}
		}


		public function load_add_employee(){

			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super"))) {
					redirect('redirect/index');
				}

			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/employee/add_new_employee');
			$this->load->view('templates/footer');
		}



		public function view_doctors_list(){

			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in')) {
					redirect('redirect/index');
				}

			$data['doctors'] = $this->Employee_Model->get_all_doctors();

			if($admintype === "super"){

				$this->load->view('templates/header');
				$this->load->view('pages/supers/index');
				$this->load->view('pages/employee/view_all_doctors',$data);
				$this->load->view('templates/footer');
			}elseif($admintype === "admin"){
				$this->load->view('templates/header');
				$this->load->view('pages/admins/index');
				$this->load->view('pages/employee/view_all_doctors',$data);
				$this->load->view('templates/footer');
			}elseif($admintype === "doctor"){
				$this->load->view('templates/header');
				$this->load->view('pages/doctors/index');
				$this->load->view('pages/employee/special_view',$data);
				$this->load->view('templates/footer');
			}elseif($admintype === "nurse"){
				$this->load->view('templates/header');
				$this->load->view('pages/nurses/index');
				$this->load->view('pages/employee/special_view',$data);
				$this->load->view('templates/footer');
			}else{
				redirect('redirect/index');
			}

		}

		public function view_nurses_list(){

			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in')) {
					redirect('redirect/index');
				}

			$data['nurses'] = $this->Employee_Model->get_all_nurses();

			if($admintype === "super"){
				$this->load->view('templates/header');
				$this->load->view('pages/supers/index');
				$this->load->view('pages/employee/view_all_nurses',$data);
				$this->load->view('templates/footer');
			}elseif($admintype === "admin"){
				$this->load->view('templates/header');
				$this->load->view('pages/admins/index');
				$this->load->view('pages/employee/view_all_nurses',$data);
				$this->load->view('templates/footer');
			}elseif($admintype === "doctor"){
				$this->load->view('templates/header');
				$this->load->view('pages/doctors/index');
				$this->load->view('pages/employee/view_all_nurses',$data);
				$this->load->view('templates/footer');
			}elseif($admintype === "nurse"){
				$this->load->view('templates/header');
				$this->load->view('pages/nurses/index');
				$this->load->view('pages/employee/view_all_nurses',$data);
				$this->load->view('templates/footer');
			}else{
				redirect('redirect/index');
			}

			
		}

		public function edit_employee(){

			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super" OR "admin"))) {
					redirect('redirect/index');
				}
			$id = $this->uri->segment('3');
			$data['employees'] = $this->Employee_Model->get_single_employee($id);

			if($admintype === "super"){
				$this->load->view('templates/header');
				$this->load->view('pages/supers/index');
				$this->load->view('pages/employee/edit_employee',$data);
				$this->load->view('templates/footer');
			}elseif($admintype === "admin"){
				$this->load->view('templates/header');
				$this->load->view('pages/admins/index');
				$this->load->view('pages/employee/edit_employee',$data);
				$this->load->view('templates/footer');
			}else{
				redirect('redirect/index');
			}

			
		}

		public function view_employee_details(){
			$admintype = $this->session->userdata('admintype');
			if(!($this->session->userdata('logged_in')) OR !($admintype === "admin" OR "super")){

				redirect('redirect/index');	
			}

			$id = $this->uri->segment('3');
			$data['employees'] = $this->Employee_Model->get_single_employee($id);

			if($admintype === "super"){
				$this->load->view('templates/header');
				$this->load->view('pages/supers/index');
				$this->load->view('pages/employee/view_employee_details',$data);
				$this->load->view('templates/footer');
			}elseif($admintype === "admin"){
				$this->load->view('templates/header');
				$this->load->view('pages/admins/index');
				$this->load->view('pages/employee/view_employee_details',$data);
				$this->load->view('templates/footer');
			}else{
				redirect('redirect/index');
			}

		}





	}