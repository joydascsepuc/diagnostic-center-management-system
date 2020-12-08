<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestReports_Model extends CI_Model {

	
	public function getPatientData(){

		$dstatus = "0";
		$this->db->order_by('id','ASC');
		$this->db->where('d_status',$dstatus);
		$query = $this->db->get('testpatients');
		return $query->result_array();
	}

	public function getTestID($id){

		$sql = "SELECT * FROM sales_items WHERE test_patient_id = ? AND data_input_s = ?";
		$query = $this->db->query($sql, array($id,0));
		return $query->result_array();


	}


	public function getTestName($id)
	{
		$sql = "SELECT * FROM tests WHERE id = ?";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}

	public function getTestIDfromSales($id){
		
		$sql = "SELECT test_id FROM sales_items WHERE id = ?";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}


	public function getUnits($tid){
		
		$sql = "SELECT * From test_units WHERE test_id = ?";
		$query = $this->db->query($sql, array($tid));
		return $query->result_array();
	}

	public function getUnitName($mid){
		
		$sql = "SELECT name FROM units WHERE id = ?";
		$query = $this->db->query($sql, array($mid));
		return $query->row_array();
	}

	public function getPID($sid){
		
		$sql = "SELECT test_patient_id FROM sales_items WHERE id = ?";
		$query = $this->db->query($sql, array($sid));
		return $query->row_array();
	}


	public function addReport(){

		$count = $this->input->post('numbers');
		$patid = $this->input->post('pat_id');
		$saleid = $this->input->post('sales_item_id');

		for($i=1; $i<=$count; $i++){

			$data[$i] = array(

				'pat_id' => $patid,
				'sales_item_id' => $saleid,
				'testunit_id' => $this->input->post('unitid')[$i],
				'unit_value' => $this->input->post('gValue')[$i],
				'userId' => $this->session->userdata('user_id'),
			);
		}

		$result = $this->db->insert_batch('testresult', $data);

		if($result){

			$this->db->set('data_input_s', '1');
			$this->db->where('id', $saleid);
			return $this->db->update('sales_items');
		}

	}


	public function getAllPatients(){

		$this->db->order_by('id','ASC');
		$query = $this->db->get('testpatients');
		return $query->result_array();
	}


	public function getAllTestID($pid){

		$sql = "SELECT * FROM sales_items WHERE test_patient_id = ?";
		$query = $this->db->query($sql, array($pid));
		return $query->result_array();
	}













	/*AJAX*/
	public function getPateintIDForSearch($search=''){
		
		if($search){

	 		$sql = "SELECT * FROM  testpatients WHERE (invoice LIKE '$search%' OR p_mobile LIKE '$search%') AND d_status = ?";
			$query = $this->db->query($sql,array('0'));
			return $query->result_array();
		}
	}

	public function getsinglePatientRow($id){

		$this->db->where('id',$id);
		$query = $this->db->get('testpatients',$id);
		return $query->row_array();
	}

	public function getPIDbyInvoice($invoice){

		$sql = "SELECT id FROM  testpatients WHERE invoice = ?";
		$query = $this->db->query($sql,array($invoice));
		return $query->row_array();
	}


	public function getTestIDforDeliver($id){

		$sql = "SELECT * FROM sales_items WHERE test_patient_id = ? AND data_input_s = ?";
		$query = $this->db->query($sql, array($id,'1'));
		return $query->result_array();
	}






	/*For Preview Reports*/
	public function getPatientIDbySalesID($salesid){

		$this->db->where('id',$salesid);
		$query = $this->db->get('sales_items');
		$ret = $query->row();
		$tpid = $ret->test_patient_id;
		return $tpid;
	}

	public function getPatientDatabByPid($patientid){

		$this->db->where('id',$patientid);
		$query = $this->db->get('testpatients');
		return $query->result_array();
	}

	public function getTestNameByTestID($testid){

		$this->db->where('id',$testid);
		$query = $this->db->get('tests');
		$ret = $query->row();
		$tname = $ret->name;
		return $tname;
	}

	public function getTestIDbySalesID($salesid){

		$this->db->where('id',$salesid);
		$query = $this->db->get('sales_items');
		$ret = $query->row();
		$tid = $ret->test_id;
		return $tid;
	}

	public function getResultofP($patientid,$salesid){

		$this->db->where('pat_id',$patientid);
		$this->db->where('sales_item_id',$salesid);
		$query = $this->db->get('testresult');
		return $query->result_array();
	}


	public function getDocName($did){

		$this->db->where('id',$did);
		$query = $this->db->get('doctors');
		$ret = $query->row();
		$dname = $ret->name;
		return $dname;
	}

	public function getReceiverName($uid){

		$this->db->where('id',$uid);
		$query = $this->db->get('users');
		$ret = $query->row();
		$uname = $ret->name;
		return $uname;
	}


	public function getSalesList($patientid){

		$this->db->where('test_patient_id',$patientid);
		$query = $this->db->get('sales_items');
		return $query->result_array();
	}



}



		