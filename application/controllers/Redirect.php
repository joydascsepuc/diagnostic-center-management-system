<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php 

	class Redirect extends CI_Controller{
		
		public function index(){

			/*$admintype = $this->session->flashdata('admintype');
			
			var_dump($admintype);*/

			$this->session->keep_flashdata('wrong');
			$this->session->keep_flashdata('doctor_added');
			$this->session->keep_flashdata('employee_updated');

			

			$admintype = $this->session->userdata('admintype');
			/*var_dump($admintype);*/

			if($admintype === "super"){
					
				redirect('supers/index');
			}elseif($admintype === "admin") {
				
				redirect('admins/index');
			}elseif($admintype === "doctor"){

				redirect('doctors/index');
			}elseif($admintype === "nurse"){
				redirect('nurses/index');
			}else{

				redirect('pages/index');
			}
	}
}