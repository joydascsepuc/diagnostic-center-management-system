<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php

	class Patients_Model extends CI_Model{
		
		public function add(){

			$words = explode(" ", $this->input->post('name'));
			$acronym = "";
			foreach ($words as $w) {
			  $acronym .= $w[0];
			}
			$patientID = strtoupper($acronym).strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 4));

			$data = array(

				'name' => $this->input->post('name'),
				'age' => $this->input->post('age'),
				'gender' => $this->input->post('gender'),
				'blood_group' => $this->input->post('bloodgroup'),
				/*'reference' => $this->input->post('reference'),*/
				/*'patientid' => $this->input->post('patientid'),*/
				'patientid' => $patientID,
				'guardian_name' => $this->input->post('guardianname'),
				'mobile' => $this->input->post('mobile'),
				'email' => $this->input->post('email'),
				'maritial_status' => $this->input->post('maritial'),
				'religion' => $this->input->post('religion'),
				'nationality' => $this->input->post('nationality'),
				'address' => $this->input->post('address'),
				'emer_name' => $this->input->post('emergencyName'),
				'emer_relation' => $this->input->post('relationwithpatient'),
				'emer_mobile_one' => $this->input->post('emergencyContact'),
				'emer_mobile_two' => $this->input->post('emergencyContacttwo')

			);

			return $this->db->insert('patients',$data);
		}

		public function view(){

			$this->db->order_by('patients.id','DESC');
			$query = $this->db->get('patients');
			return $query->result_array();
		}

		public function getsingle($id){

			$this->db->where('id',$id);
			$query = $this->db->get('patients',$id);
			return $query->result_array();
		}

		public function update(){

			$id = $this->input->post('id');
			$data = array(

				
				'name' => $this->input->post('name'),
				'age' => $this->input->post('age'),
				'gender' => $this->input->post('gender'),
				'blood_group' => $this->input->post('bloodgroup'),
				/*'reference' => $this->input->post('reference'),*/
				'patientid' => $this->input->post('patientid'),
				'guardian_name' => $this->input->post('guardianname'),
				'mobile' => $this->input->post('mobile'),
				'email' => $this->input->post('email'),
				'maritial_status' => $this->input->post('maritial'),
				'religion' => $this->input->post('religion'),
				'nationality' => $this->input->post('nationality'),
				'address' => $this->input->post('address'),
				'emer_name' => $this->input->post('emergencyName'),
				'emer_relation' => $this->input->post('relationwithpatient'),
				'emer_mobile_one' => $this->input->post('emergencyContact'),
				'emer_mobile_two' => $this->input->post('emergencyContacttwo')
			);

			$this->db->where('id',$id);
			return $this->db->update('patients',$data);
		}
	}