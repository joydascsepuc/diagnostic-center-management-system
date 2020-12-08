<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php

	class Employee_Model extends CI_Model{

		

				
		public function add_employee(){

			$data = array(

				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'mobile' => $this->input->post('mobile'),
				'gender' => $this->input->post('gender'),
				'position' => $this->input->post('position'),
				'salary' => $this->input->post('salary'),
				'employeeid' => $this->input->post('employeeid'),
				/*'commission' => $this->input->post('commission'),
				'paid' => $this->input->post('paid'),
				'pending' => $this->input->post('pending'),*/
				'address' => $this->input->post('address'),
				'is_active' => $this->input->post('active')
			);

			return $this->db->insert('employee',$data);
		}


		public function get_all_doctors(){

			$position = "Duty Doctor";

			$this->db->order_by('employee.id','DESC');
			$this->db->where('position',$position);
			$query = $this->db->get('employee');
			return $query->result_array();
		}

		public function get_all_nurses(){

			$position = "nurse";

			$this->db->order_by('employee.id','DESC');
			$this->db->where('position',$position);
			$query = $this->db->get('employee');
			return $query->result_array();
		}


		public function get_single_employee($id){

			$this->db->where('id',$id);
			$query = $this->db->get('employee',$id);
			return $query->result_array();
		}

		public function update_employee_information(){

			$id = $this->input->post('id');
			$data = array(

				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'mobile' => $this->input->post('mobile'),
				'gender' => $this->input->post('gender'),
				'position' => $this->input->post('position'),
				'employeeid' => $this->input->post('employeeid'),
				'salary' => $this->input->post('salary'),	
				'address' => $this->input->post('address'),
				'is_active' => $this->input->post('active')
				
			);

			$this->db->where('id',$id);
			return $this->db->update('employee',$data);
		}


		function is_email_available($email){

           $this->db->where('email', $email);  
           $query = $this->db->get("employee");  
           if($query->num_rows() > 0){  
                return true;  
           }else{  
                return false;  
           }  
      	}

      	function is_mobile_available($mobile){

           $this->db->where('mobile', $mobile);  
           $query = $this->db->get("employee");  
           if($query->num_rows() > 0){  
                return true;  
           }else{  
                return false;  
           }  
      	}

      	function is_id_available($employeeid){

           $this->db->where('employeeid', $employeeid);  
           $query = $this->db->get("employee");  
           if($query->num_rows() > 0){  
                return true;  
           }else{  
                return false;  
           }  
      	}

      	public function get_all_employee(){
	
			$this->db->order_by('employee.id','DESC');			
			$query = $this->db->get('employee');
			return $query->result_array();
		}















	}