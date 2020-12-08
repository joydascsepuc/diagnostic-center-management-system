<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appoints_Model extends CI_Model {

	


	public function addNewAppoiment(){

		$data = array(
			
			'for_doc' => $this->input->post('doctorid'),
			'p_name' => $this->input->post('patientName'),
			'p_mobile' => $this->input->post('patientMobile'),
			'a_status' => '0',
			'a_date' => $this->input->post('aDate'),
			'byuser' => $this->session->userdata('user_id'),
		);

		return $this->db->insert('appoiments',$data);
	}



















	/*AJAX CALLING*/
	public function getDoctorIDForSearch($search=''){

		$condition = 0;
		if($search){

	 		$sql = "SELECT * FROM  doctors WHERE (name LIKE '$search%' OR doctorid LIKE '$search%' OR mobile LIKE '$search%') AND consult_in_lab = '1'";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
	}

	public function getsingleDoctorRow($docID){

		$this->db->where('id',$id);
		$query = $this->db->get('doctors',$id);
		return $query->row_array();
	}





}

