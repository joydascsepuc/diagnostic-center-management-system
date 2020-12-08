<?php

	class Doctor_Section_Model extends CI_Model{
		
		public function add_doctor(){

			$check = $this->input->post('consult');

			$words = explode(" ", $this->input->post('name'));
			$acronym = "";
			foreach ($words as $w) {
			  $acronym .= $w[0];
			}

			$doctorID = strtoupper($acronym).strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 4));

			if($check == 0){

				$data = array(

					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'mobile' => $this->input->post('mobile'),
					'mobile2' => $this->input->post('mobile2'),
					'consult_in_lab' => '0',
					'slot' => '0',
					'assistantname' => $this->input->post('assistantname'),
					'assistantmobile' => $this->input->post('assistantmobile'),
					'gender' => $this->input->post('gender'),
					'doctorid' => $doctorID,
					'commission' => $this->input->post('commission'),
					'degree' => $this->input->post('degree'),
					'chambername' => $this->input->post('chambername'),
					'paid' => $this->input->post('paid'),
					'pending' => $this->input->post('pending'),
					'last_pay_amount' => "0",
					'address' => $this->input->post('address')
				);

				return $this->db->insert('doctors',$data);

			}else{

				$data = array(

					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'mobile' => $this->input->post('mobile'),
					'mobile2' => $this->input->post('mobile2'),
					'consult_in_lab' => $check,
					'slot' => $this->input->post('slot'),
					'assistantname' => $this->input->post('assistantname'),
					'assistantmobile' => $this->input->post('assistantmobile'),
					'gender' => $this->input->post('gender'),
					'doctorid' => $doctorID,
					'commission' => $this->input->post('commission'),
					'degree' => $this->input->post('degree'),
					'chambername' => $this->input->post('chambername'),
					'paid' => $this->input->post('paid'),
					'pending' => $this->input->post('pending'),
					'last_pay_amount' => "0",
					'address' => $this->input->post('address')
				);

				return $this->db->insert('doctors',$data);
			}

			

			

		}

		public function get_all_doctors(){

			$this->db->order_by('doctors.id','DESC');			
			$query = $this->db->get('doctors');
			return $query->result_array();
		}


		public function get_single_doctor($id){

			$this->db->where('id',$id);
			$query = $this->db->get('doctors',$id);
			return $query->result_array();
		}

		public function update_doctor_information(){

			$id = $this->input->post('id');

			$data = array(

				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'mobile' => $this->input->post('mobile'),
				'mobile2' => $this->input->post('mobile2'),
				'consult_in_lab' => $this->input->post('consult'),
				'slot' => $this->input->post('slot'),
				'assistantname' => $this->input->post('assistantname'),
				'assistantmobile' => $this->input->post('assistantmobile'),
				'gender' => $this->input->post('gender'),
				'commission' => $this->input->post('commission'),
				'degree' => $this->input->post('degree'),
				'chambername' => $this->input->post('chambername'),
				'paid' => $this->input->post('paid'),
				'pending' => $this->input->post('pending'),
				'address' => $this->input->post('address')
			);

			$this->db->where('id',$id);
			return $this->db->update('doctors',$data);
		}


		public function PayDoctorCommission(){

			$id = $this->input->post('id');
			$uniqid = $this->input->post('docUniqueId');

			$paid = $this->input->post('paid');
			$pending = $this->input->post('pending');
			$nowpay = $this->input->post('payNow');

			$totalpaid = $paid + $nowpay;
			$nowpending = $pending - $nowpay;

			$data = array(

				'paid' => $totalpaid,
				'pending' => $nowpending,
				'last_pay_amount' => $nowpay,
				'last_pay_by' => $this->session->userdata('user_id')
			);

			$this->db->where('id',$id);
			$result = $this->db->update('doctors',$data);

			if($result){

				$basic = array(
					'doc_id' => $id,
					'doc_u_id' => $uniqid,
					'amount' => $nowpay,
					'by_user' => $this->session->userdata('user_id')
				);

				$primary = $this->db->insert('dpayhistory',$basic);
				$hisabinvoice = $this->db->insert_id();
			}

			if($primary){

				$hisab = array(
					'invoice' => $hisabinvoice,
					'cost' => $nowpay,
					'cost_type' => 'doctor',
					'income' => 0,
				);

				return $this->db->insert('hisab',$hisab);
			}
		}

		public function get_all_duepayment_doctors(){
			$limit = 0;
			$this->db->where('pending >', $limit);			
			$query = $this->db->get('doctors');
			return $query->result_array();
		}



		public function getPaymentHistory(){

			$this->db->order_by('dpayhistory.id','DESC');			
			$query = $this->db->get('dpayhistory');
			$data = $query->result_array();

			foreach ($data as $key => $value) {
				
				$docid = $value['doc_id'];
				$this->db->where('id',$docid);
				$query = $this->db->get('doctors');
				$ret = $query->row();
				$name = $ret->name;
				$data[$key]['doc_id'] = $name;

				$uid = $value['by_user'];
				$this->db->where('id',$uid);
				$query = $this->db->get('users');
				$ret = $query->row();
				$uname = $ret->name;
				$data[$key]['by_user'] = $uname;
			}

			return $data;
		}















	}