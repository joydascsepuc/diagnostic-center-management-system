<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salary_Model extends CI_Model {

	public function get_all_employee(){
		$this->db->order_by('employee.id','ASC');			
		$query = $this->db->get('employee');
		return $query->result_array();
	}

	public function addsalary(){

		$count = $this->input->post('rownumbers');
		for($i=0; $i<$count;$i++) {
		$data[$i] = array(	
			  'name' => $this->input->post('name')[$i], 
	          'position' => $this->input->post('position')[$i],
	          'employeeid' => $this->input->post('employeeid')[$i],
	          'mobile' => $this->input->post('mobile')[$i],
	          'salary' => $this->input->post('salary')[$i],
	          'paidstatus' => $this->input->post('paidstatus')[$i], 
	          'amount' => $this->input->post('amount')[$i],
	          'month' => $this->input->post('month'),
	          'year' => $this->input->post('year')
				
			);
		}
		// var_dump($data);
		$this->db->insert_batch('salary', $data);

	}
		
	public function checkIfAlreadyThere(){
		$month = date("m");
		$year = date("Y");

		$this->db->where('month',$month);
		$this->db->where('year',$year);

		$query = $this->db->get('salary');
		$data = $query->result_array();

		if($data == NULL){
			$result = "Not There";
		}else{
			$result = "Already There";
		}

		return $result;
	}
		
	
	public function getSalarySheet(){
		$month = $this->input->post('month');
		$year = $this->input->post('year');

		$this->db->where('month',$month);
		$this->db->where('year',$year);
		$query = $this->db->get('salary');

		return $query->result_array();

	}
	
	public function getEmpIDForSearch($search=''){

		if($search)
		{
	 		$sql = "SELECT * FROM  employee WHERE name LIKE '$search%' OR employeeid LIKE '$search%' OR mobile LIKE '$search%' ";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
	}

	public function getsingleEmployeeRow($id){

		$this->db->where('id',$id);
		$query = $this->db->get('employee',$id);
		return $query->row_array(); //so that we can use it without foreach loop.. Because it will always contain only one row... check the documentation...
	}

	public function getSingleEmployeeSalarySheet(){

		$id = $this->input->post('empsearch');
		$this->db->where('employeeid',$id);
		$query = $this->db->get('salary');
		return $query->result_array();

	}

	

















	

}

/* End of file Salary_Model.php */
/* Location: ./application/models/Salary_Model.php */