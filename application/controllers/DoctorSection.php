<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
	
	class DoctorSection extends CI_Controller{
		
		public function load_add_doctor(){
			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super"))) {
					redirect('redirect/index');
				}
			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/doctorsSection/add_doctor');
			$this->load->view('templates/footer');

		}

		public function add_doctor(){
			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super"))) {
					redirect('redirect/index');
				}

			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('consult','Consult','required');
			$this->form_validation->set_rules('slot','Slot','required');
			$this->form_validation->set_rules('email','Email');
			$this->form_validation->set_rules('mobile','Mobile','required');
			$this->form_validation->set_rules('mobile2','Mobile2');
			$this->form_validation->set_rules('gender','Gender','required');
			$this->form_validation->set_rules('commission','Commission');
			$this->form_validation->set_rules('chambername','Chambername');
			$this->form_validation->set_rules('assistantname','Assistantname');
			$this->form_validation->set_rules('assistantmobile','Assistantmobile');
			$this->form_validation->set_rules('paid','Paid');
			$this->form_validation->set_rules('pending','Pending');
			$this->form_validation->set_rules('degree','Degree');
			$this->form_validation->set_rules('address','Address');

			if($this->form_validation->run() === FALSE){
				$this->session->set_flashdata('validation_error','Validation Error.');
				redirect('doctorsection/load_add_doctor');
			}else{
				$result = $this->Doctor_Section_Model->add_doctor();
				if($result) {
					$this->session->set_flashdata('doctor_added','Doctor Added Successfully.');
					redirect('doctorsection/view_all_doctors');
				}else{
					$this->session->set_flashdata('doctor_not_added','Doctor Not Added');
				}
			}

		}

		public function view_all_doctors(){

			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super" OR "admin"))) {
					redirect('redirect/index');
				}
			$data['doctors'] = $this->Doctor_Section_Model->get_all_doctors();

			if($admintype === "super"){

				$this->load->view('templates/header');
				$this->load->view('pages/supers/index');
				$this->load->view('pages/doctorsSection/view_all_doctors',$data);
				$this->load->view('templates/footer');
			}elseif($admintype === "admin"){
				$this->load->view('templates/header');
				$this->load->view('pages/admins/index');
				$this->load->view('pages/doctorsSection/view_all_doctors',$data);
				$this->load->view('templates/footer');
			}else{
				redirect('redirect/index');
			}
			
		}

		public function view_doctor_details(){

			$admintype = $this->session->userdata('admintype');
			if(!($this->session->userdata('logged_in')) OR !($admintype === "admin" OR "super")){

				redirect('redirect/index');	
			}

			$id = $this->uri->segment('3');
			$data['doctors'] = $this->Doctor_Section_Model->get_single_doctor($id);

			if($admintype === "super"){
				$this->load->view('templates/header');
				$this->load->view('pages/supers/index');
				$this->load->view('pages/doctorsSection/view_doctor_details',$data);
				$this->load->view('templates/footer');
			}elseif($admintype === "admin"){
				$this->load->view('templates/header');
				$this->load->view('pages/admins/index');
				$this->load->view('pages/doctorsSection/view_doctor_details',$data);
				$this->load->view('templates/footer');
			}else{
				redirect('redirect/index');
			}
		}

		public function edit_doctor(){

			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super"/* OR "admin"*/))) {
					redirect('redirect/index');
				}
			$id = $this->uri->segment('3');
			$data['doctors'] = $this->Doctor_Section_Model->get_single_doctor($id);

			if($admintype === "super"){
				$this->load->view('templates/header');
				$this->load->view('pages/supers/index');
				$this->load->view('pages/doctorsSection/edit_doctor',$data);
				$this->load->view('templates/footer');
			}/*elseif($admintype === "admin"){
				$this->load->view('templates/header');
				$this->load->view('pages/admins/index');
				$this->load->view('pages/doctorsSection/edit_doctor',$data);
				$this->load->view('templates/footer');
			}*/else{
				redirect('redirect/index');
			}
		}

		public function update_doctor(){

			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super"))) {
					redirect('redirect/index');
				}

			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('email','Email');
			$this->form_validation->set_rules('mobile','Mobile','required');
			$this->form_validation->set_rules('mobile2','Mobile2');
			$this->form_validation->set_rules('gender','Gender','required');
			$this->form_validation->set_rules('commission','Commission');
			$this->form_validation->set_rules('chambername','Chambername');
			$this->form_validation->set_rules('assistantname','Assistantname');
			$this->form_validation->set_rules('assistantmobile','Assistantmobile');
			$this->form_validation->set_rules('paid','Paid');
			$this->form_validation->set_rules('pending','Pending');
			$this->form_validation->set_rules('degree','Degree');
			$this->form_validation->set_rules('address','Address');

			if($this->form_validation->run() === FALSE){
				$this->session->set_flashdata('validation_error','Validation Error.');
				redirect('redirect/index');
			}else{

				$this->Doctor_Section_Model->update_doctor_information();

				//Set Message
				$this->session->set_flashdata('doctor_updated','Doctor Information Updated Successfully.');
				redirect('doctorsection/view_all_doctors');
			}

		}


		public function duePayment(){
			
			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super" OR "admin"))) {
					redirect('redirect/index');
				}
				
			$data['doctors'] = $this->Doctor_Section_Model->get_all_duepayment_doctors();

			if($admintype === "super"){

				$this->load->view('templates/header');
				$this->load->view('pages/supers/index');
				$this->load->view('pages/doctorsSection/duePayment',$data);
				$this->load->view('templates/footer');
			}elseif($admintype === "admin"){
				$this->load->view('templates/header');
				$this->load->view('pages/admins/index');
				$this->load->view('pages/doctorsSection/duePayment',$data);
				$this->load->view('templates/footer');
			}else{
				redirect('redirect/index');
			}
		}

		public function loadPayDoctor(){

			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super"/* OR "admin"*/))) {
					redirect('redirect/index');
				}
			$id = $this->uri->segment('3');
			$data['doctors'] = $this->Doctor_Section_Model->get_single_doctor($id);

			if($admintype === "super"){
				$this->load->view('templates/header');
				$this->load->view('pages/supers/index');
				$this->load->view('pages/doctorsSection/payDoc',$data);
				$this->load->view('templates/footer');
			}/*elseif($admintype === "admin"){
				$this->load->view('templates/header');
				$this->load->view('pages/admins/index');
				$this->load->view('pages/doctorsSection/payDoctor',$data);
				$this->load->view('templates/footer');
			}*/else{
				redirect('redirect/index');
			}
		}

		public function payDoctor(){
			
			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super"))) {
					redirect('redirect/index');
				}

			$this->form_validation->set_rules('paid','Paid','required');
			$this->form_validation->set_rules('pending','Pending', 'required');
			$this->form_validation->set_rules('payNow','PayNow','required');
			$this->form_validation->set_rules('docUniqueId','DocUniqueId','required');
			$this->form_validation->set_rules('id','Id','required');

			if($this->form_validation->run() === FALSE){
				$this->session->set_flashdata('validation_error','Validation Error.');
				redirect('doctorsection/duePayment');
			}else{

				$this->Doctor_Section_Model->PayDoctorCommission();
				$this->session->set_flashdata('doctor_commission_given','Doctor Commission Given Successfully.');
				redirect('doctorsection/duePayment');
			}
		}


		public function paymentHistory(){

			$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in') OR (!($admintype === "super" OR "admin"))) {
					redirect('redirect/index');
				}

			$data['history'] = $this->Doctor_Section_Model->getPaymentHistory();

			if($admintype === "super"){
				$this->load->view('templates/header');
				$this->load->view('pages/supers/index');
				$this->load->view('pages/doctorsSection/payHis',$data);
				$this->load->view('templates/footer');
			}elseif($admintype === "admin"){
				$this->load->view('templates/header');
				$this->load->view('pages/admins/index');
				$this->load->view('pages/doctorsSection/payHis',$data);
				$this->load->view('templates/footer');
			}else{
				redirect('redirect/index');
			}
		}












	}