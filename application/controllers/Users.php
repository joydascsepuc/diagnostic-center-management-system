<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php

	class Users extends CI_Controller{
		
		public function adduser(){
			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super"/* OR "admin"*/))) {
					redirect('redirect/index');
				}

		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('admintype','Admintype','required');
		$this->form_validation->set_rules('mobile','Mobile','required'); 
		$this->form_validation->set_rules('address','Address','required');

		if($this->form_validation->run() === FALSE){
			redirect('redirect/index');
		}else{
				$this->Users_Model->adduser();
				redirect('redirect/index');
			}
	}

	function check_email_avalibility(){

           if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){

                echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Invalid Email</span></label>';  
           }else{
                 
                if($this->Users_Model->is_email_available($_POST["email"])){

                     echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span>Email Already registered</label>'; 

                }else{

                     echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> Email Available</label>';  
                }  
           }  
      } 

 
      function check_username_avalibility(){

	        if($this->Users_Model->is_username_available($_POST["username"])){  
	             echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span>Username Already registered</label>';  
	        }else{  
	             echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> Username Available</label>';  
	        }  
             
      }


        
	

	public function edit(){

		$id = $this->uri->segment('3');
		$data['users'] = $this->Users_Model->getsingle($id);

		/*var_dump($data);*/

		$logged_in = $this->session->userdata('logged_in');
		$admintype = $this->session->userdata('admintype');

		if(!$logged_in){

			redirect('redirect/index');

		}elseif($admintype === "super"){

			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/users/edituser',$data);
			$this->load->view('templates/footer');
		}/*elseif($admintype === "admin"){
			$this->load->view('templates/header');
			$this->load->view('admins/index');
			$this->load->view('pages/users/edituser',$data);
			$this->load->view('templates/footer');
		}*/else{
			redirect('redirect/index');
		}
	}

	public function update(){

		$admintype = $this->session->userdata('admintype');
		if(!($this->session->userdata('logged_in')) OR !($admintype === /*"admin" OR*/ "super")){

			redirect('redirect/index');	
		}

		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('mobile','Mobile','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('email','Email');
		$this->form_validation->set_rules('admintype','Admintype');
		$this->form_validation->set_rules('address','Address');

		if($this->form_validation->run() === FALSE){
			redirect('redirect/index');
		}else{
				$this->Users_Model->update();
				redirect('redirect/index');
			}
	}

	public function updateself(){

		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('mobile','Mobile','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('email','Email');
		$this->form_validation->set_rules('password','Password');			
		$this->form_validation->set_rules('address','Address');

		if($this->form_validation->run() === FALSE){
			redirect('redirect/index');
		}else{
				$this->Users_Model->updateself();
				redirect('redirect/index');
			}
	}


	public function load_addnewuser(){

			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super"))) {
					redirect('redirect/index');
				}
			$this->load->view('templates/header');
			$this->load->view('pages/supers/index'); 
			$this->load->view('pages/users/addUserUpdate');
			$this->load->view('templates/footer');
		}

	public function viewalluser(){
			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super" OR "admin"))) {
					redirect('redirect/index');
				}

			$data['users'] = $this->Users_Model->viewall();

			if($admintype === "super"){
				$this->load->view('templates/header');
				$this->load->view('pages/supers/index');
				$this->load->view('pages/users/viewall',$data);
				$this->load->view('templates/footer');
			}elseif($admintype === "admin"){
				$this->load->view('templates/header');
				$this->load->view('pages/admins/index');
				$this->load->view('pages/users/viewall',$data);
				$this->load->view('templates/footer');
			}else{
				redirect('redirect/index');
			}
		}

	public function viewadmins(){
		$admintype = $this->session->userdata('admintype');
		if(!$this->session->userdata('logged_in')) {
				redirect('redirect/index');
			}

		$data['admins'] = $this->Users_Model->getadmins();

		if($admintype === "super"){
			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/users/showadmins',$data);
			$this->load->view('templates/footer');
		}elseif ($admintype === "admin") {
			$this->load->view('templates/header');
			$this->load->view('pages/admins/index');
			$this->load->view('pages/users/showadmins',$data);
			$this->load->view('templates/footer');
		}elseif ($admintype === "doctor") {
			$this->load->view('templates/header');
			$this->load->view('pages/doctors/index');
			$this->load->view('pages/users/showadmins',$data);
			$this->load->view('templates/footer');
		}elseif ($admintype === "nurse") {
			$this->load->view('templates/header');
			$this->load->view('pages/nurses/index');
			$this->load->view('pages/users/showadmins',$data);
			$this->load->view('templates/footer');
		}else{
			redirect('redirect/index');
		}	
	}

		public function viewdoctors(){
			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super" OR "admin"))) {
					redirect('redirect/index');
				}

			$data['doctors'] = $this->Users_Model->getdoctors();

			if($admintype === "super"){
				$this->load->view('templates/header');
				$this->load->view('pages/supers/index');
				$this->load->view('pages/users/showdoctors',$data);
				$this->load->view('templates/footer');
			}elseif ($admintype === "admin") {
				$this->load->view('templates/header');
				$this->load->view('pages/admins/index');
				$this->load->view('pages/users/showdoctors',$data);
				$this->load->view('templates/footer');
			}else{
				redirect('redirect/index');
			}
					
		}

		public function viewnurses(){
			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super" OR "admin"))) {
					redirect('redirect/index');
				}

			$data['nurses'] = $this->Users_Model->getnurses();

			if($admintype === "super"){
				$this->load->view('templates/header');
				$this->load->view('pages/supers/index');
				$this->load->view('pages/users/shownurses',$data);
				$this->load->view('templates/footer');
			}elseif ($admintype === "admin") {
				$this->load->view('templates/header');
				$this->load->view('pages/admins/index');
				$this->load->view('pages/users/shownurses',$data);
				$this->load->view('templates/footer');
			}else{
				redirect('redirect/index');
			}

			
		}

		public function user_details(){
			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super" OR "admin"))) {
					redirect('redirect/index');
				}
			$id = $this->uri->segment('3');
			$data['users'] = $this->Users_Model->getsingle($id);

			if($admintype === "super"){
				$this->load->view('templates/header');
				$this->load->view('pages/supers/index');
				$this->load->view('pages/users/view_user_details',$data);
				$this->load->view('templates/footer');
			}elseif ($admintype === "admin") {
				$this->load->view('templates/header');
				$this->load->view('pages/admins/index');
				$this->load->view('pages/users/view_user_details',$data);
				$this->load->view('templates/footer');
			}else{
				redirect('redirect/index');
			}


		}

		
















	
}