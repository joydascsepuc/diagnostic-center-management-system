<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tests extends CI_Controller{

	public function loadaddtestpatient(){
		$this->cart->destroy();
		$admintype = $this->session->userdata('admintype');
		if(!$this->session->userdata('logged_in') OR (!($admintype === "super" OR "admin"))) {
				redirect('redirect/index');
			}
		if($admintype === "super"){
			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/tests/addtestpatient');
			$this->load->view('templates/footer');
		}elseif($admintype === "admin"){
			$this->load->view('templates/header');
			$this->load->view('pages/admins/index');
			$this->load->view('pages/tests/addtestpatient');
			$this->load->view('templates/footer');
		}
	}

	public function generateReport(){

		$admintype = $this->session->userdata('admintype');
		if(!($this->session->userdata('logged_in')) OR !($admintype === "admin" OR "super")){

			redirect('redirect/index');
		}
		
	    $year = date('Y').date('m').date('d');
	    $sec = (time() % 86400);
	    $invoice = $year."-".$sec;
          
		$data['basic'] = array(
			'patientid' => $this->input->post('patientsearch'),
			'patientname' => $this->input->post('name'),
			'mobileno' => $this->input->post('mobile'),
			'age' => $this->input->post('age'),
			'gender' => $this->input->post('gender'),
			'bloodgroup' => $this->input->post('bloodgroup'),
			'doctorname' => $this->input->post('doctorsearch'),
			'doctorid' => $this->input->post('docid'),
			'commission' => $this->input->post('commission'),
			'invoice' => $invoice,
			'docdbid' => $this->input->post('docdbid'),
			'img' => $this->Barcode($invoice),
		);

		if($admintype === "super"){
			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/tests/generatereport',$data);
			$this->load->view('templates/footer');
		}elseif($admintype === "admin"){
			$this->load->view('templates/header');
			$this->load->view('pages/admins/index');
			$this->load->view('pages/tests/generatereport',$data);
			$this->load->view('templates/footer');
		}
	}

	public function Barcode($value)
	{
		require "vendor/autoload.php";
		$generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
		return '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($value, $generator::TYPE_CODE_128)) . '">';
	}

	public function checkbutton(){

		$admintype = $this->session->userdata('admintype');
		if(!($this->session->userdata('logged_in')) OR !($admintype === "admin" OR "super")){
			redirect('redirect/index');
		}

		$data['info'] = array(
			'patientid' => $this->input->post('patientid'),				
			'patientname' => $this->input->post('patientname'),
			'age' => $this->input->post('patientage'),
			'mobile' => $this->input->post('mobile'),
			'gender' => $this->input->post('gender'),
			'bloodgroup' => $this->input->post('bloodgroup'),
			'docdbid' => $this->input->post('docdbid'),
			'doctorname' => $this->input->post('doctorname'),
			'doctorid' => $this->input->post('doctorid'),
			'commission' => $this->input->post('commission'),
			/*'total' => $this->input->post('subtotal'),
			'totalcost' => $this->input->post('totalcost'),
			'totaldiscount' => $this->input->post('totaldiscount'),*/
			'grossamount' => $this->input->post('grossamount'),
			'discountamount' => $this->input->post('discountamount'),
			'netamount' => $this->input->post('subtotal'),
			'labcost' => $this->input->post('labcost'),
			'paidamount' => $this->input->post('paid'),
			'dueamount' => $this->input->post('pending'),
			'invoice' => $this->input->post('invoice'),
		);

		$action = $this->input->post('action');
		if($action == 'submit') {
		    $result = $this->addtestpatient($data); 
		}
		if($action == 'goback') {
		   if($admintype === "super"){
				$this->load->view('templates/header');
				$this->load->view('pages/supers/index');
				$this->load->view('pages/tests/goback',$data);
				$this->load->view('templates/footer');
			}elseif ($admintype === "admin") {
				$this->load->view('templates/header');
				$this->load->view('pages/admins/index');
				$this->load->view('pages/tests/goback',$data);
				$this->load->view('templates/footer');
			}else{
				redirect('redirect/index');
			}
		}
	}

	public function addtestpatient($data){
		
		$admintype = $this->session->userdata('admintype');
		if(!($this->session->userdata('logged_in')) OR !($admintype === "admin" OR "super")){

			redirect('redirect/index');
		}

		$this->Tests_Model->addtestpatient($data);
		
	}







	/*Test Table Section */

	public function loadaddtest(){
		$this->cart->destroy();
		$data['units'] = $this->Tests_Model->getAllUnit();

		$admintype = $this->session->userdata('admintype');
		if(!$this->session->userdata('logged_in') OR (!($admintype === "super"))) {
				redirect('redirect/index');
			}
		if($admintype === "super"){
			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/tests/addtest',$data);
			$this->load->view('templates/footer');
		}
	}

	public function addtest(){
		$admintype = $this->session->userdata('admintype');
		if(!$this->session->userdata('logged_in') OR (!($admintype === "super"))) {
				redirect('redirect/index'); 
			}

		$this->form_validation->set_rules('testname','Testname','required');
		$this->form_validation->set_rules('description','Description');
		$this->form_validation->set_rules('testcost','Testcost','required');
		$this->form_validation->set_rules('testprice','Testprice','required');
		$this->form_validation->set_rules('isactive','Isactive','required');
		$this->form_validation->set_rules('duration','Duration','required');			

		if($this->form_validation->run() === FALSE){
			$this->session->set_flashdata('validation_error','Validation Error.');
			redirect('tests/loadaddtest');
		}else{

			$result = $this->Tests_Model->addtest();
			if($result){
				$this->session->set_flashdata('test_added','Test Added Successfully!');
				$this->cart->destroy();
				redirect('tests/viewalltest');
			}else{
				$this->session->set_flashdata('test_not_added','Test not Added!');
				redirect('tests/loadaddtest');
			}
		}
	}

	public function viewalltest(){

		$admintype = $this->session->userdata('admintype');
			if(!$this->session->userdata('logged_in')) {
					redirect('redirect/index');
				}

			$data['tests'] = $this->Tests_Model->getalltests();

			if($admintype === "super"){
				$this->load->view('templates/header');
				$this->load->view('pages/supers/index');
				$this->load->view('pages/tests/viewalltests',$data);
				$this->load->view('templates/footer');
			}elseif ($admintype === "admin") {
				$this->load->view('templates/header');
				$this->load->view('pages/admins/index');
				$this->load->view('pages/tests/viewalltests',$data);
				$this->load->view('templates/footer');
			}else{
				redirect('redirect/index');
			}	
	}

	/*public function viewdetailsoftest(){
		$admintype = $this->session->userdata('admintype');
		if(!($this->session->userdata('logged_in')) OR !($admintype === "admin" OR "super")){

			redirect('redirect/index');	
		}

		$id = $this->uri->segment('3');
		$data['tests'] = $this->Tests_Model->getsingle($id);

		if($admintype === "super"){
			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/tests/view_test_details',$data);
			$this->load->view('templates/footer');
		}elseif($admintype === "admin"){
			$this->load->view('templates/header');
			$this->load->view('pages/admins/index');
			$this->load->view('pages/tests/view_test_details',$data);
			$this->load->view('templates/footer');
		}else{
			redirect('redirect/index');
		}
	}*/

	public function viewdetailsoftest(){
		$admintype = $this->session->userdata('admintype');
		if(!($this->session->userdata('logged_in')) OR !($admintype === "admin" OR "super")){

			redirect('redirect/index');	
		}

		$id = $this->uri->segment('3');
		$data['tests'] = $this->Tests_Model->getsingle($id);

		if($admintype === "super"){
			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/tests/view_test_details',$data);
			$this->load->view('templates/footer');
		}elseif($admintype === "admin"){
			$this->load->view('templates/header');
			$this->load->view('pages/admins/index');
			$this->load->view('pages/tests/view_test_details',$data);
			$this->load->view('templates/footer');
		}else{
			redirect('redirect/index');
		}
	}

	public function edit_test(){

		$this->cart->destroy();

		$admintype = $this->session->userdata('admintype');
		if(!($this->session->userdata('logged_in')) OR !($admintype ==="super")){

			redirect('redirect/index');	
		}

		$id = $this->uri->segment('3');
		$data['tests'] = $this->Tests_Model->getsingle($id);

		if($admintype === "super"){
			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/tests/edit_test',$data);
			$this->load->view('templates/footer');
		}elseif($admintype === "admin"){
			$this->load->view('templates/header');
			$this->load->view('pages/admins/index');
			$this->load->view('pages/tests/edit_test',$data);
			$this->load->view('templates/footer');
		}else{
			redirect('redirect/index');
		}
	}

	public function loadEditTestAllUnits(){

		$admintype = $this->session->userdata('admintype');
		if(!($this->session->userdata('logged_in')) OR !($admintype ==="super")){

			redirect('redirect/index');	
		}

		$id = $this->uri->segment('3');
		$data['data'] = $this->Tests_Model->getUnitsOfSingleTestwithMeasure($id);

		if($admintype === "super"){
			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/tests/editAllUnitForATest',$data);
			$this->load->view('templates/footer');
		}else{
			redirect('redirect/index');
		}
	}

	public function updateEditTestAllUnits(){

		$admintype = $this->session->userdata('admintype');
		if(!($this->session->userdata('logged_in')) OR !($admintype ==="super")){

			redirect('redirect/index');	
		}

		$result = $this->Tests_Model->UpdateUnitsOfATest();

		if($result){
			$this->session->set_flashdata('units_updated','Test Units Updated Successfully!');
			redirect('tests/viewalltest','refresh');
		}else{
			$this->session->set_flashdata('units_not_updated','Test Units not Updated Successfully!');
			redirect('tests/viewalltest','refresh');
		}
	}

	public function loadAddUnitOfExtTest(){

		$this->cart->destroy();
		$admintype = $this->session->userdata('admintype');
		if(!($this->session->userdata('logged_in')) OR !($admintype ==="super")){
			redirect('redirect/index');	
		}

		$id = $this->uri->segment('3');
		$data['id'] = $id;
		$data['units'] = $this->Tests_Model->getAllMeasures();

		if($admintype === "super"){
			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/tests/addUnitOfExtTest',$data);
			$this->load->view('templates/footer');
		}else{
			redirect('redirect/index');
		}

	}

	public function addUnitOfExtTest(){

		$admintype = $this->session->userdata('admintype');
		if(!($this->session->userdata('logged_in')) OR !($admintype ==="super")){
			redirect('redirect/index');	
		}

		$result = $this->Tests_Model->addUnitOfExtTest();

		if($result){
			$this->session->set_flashdata('unit_added','Test Unit(s) Added Successfully!');
			redirect('tests/viewalltest');
		}else{
			$this->session->set_flashdata('unit_not_added','Test Unit(s) Not Added.');
			redirect('tests/viewalltest');
		}
	}


	public function deleteSingleUnit(){

		$admintype = $this->session->userdata('admintype');
		if(!($this->session->userdata('logged_in')) OR !($admintype ==="super")){
			redirect('redirect/index');	
		}

		$id = $this->uri->segment('3');
		$result = $this->Tests_Model->deleteSingleUnit($id);

		if($result){
			$this->session->set_flashdata('unit_deleted','Test Unit(s) Deleted');
			redirect('tests/viewalltest');
		}else{
			$this->session->set_flashdata('unit_not_deleted','Test Unit Not Deleted!');
			redirect('tests/viewalltest');
		}

	}


	public function updatetest(){
		$admintype = $this->session->userdata('admintype');
		if(!$this->session->userdata('logged_in') OR (!($admintype === "super"))) {
				redirect('redirect/index'); 
			}

		$this->form_validation->set_rules('testname','Testname','required');
		$this->form_validation->set_rules('description','Description');
		$this->form_validation->set_rules('testcost','Testcost','required');
		$this->form_validation->set_rules('testprice','Testprice','required');
		$this->form_validation->set_rules('isactive','Isactive','required');
		$this->form_validation->set_rules('duration','Duration','required');			

		if($this->form_validation->run() === FALSE){
			$this->session->set_flashdata('validation_error','Validation Error.');
			redirect('tests/loadaddtest');
		}else{

			$result = $this->Tests_Model->updatetest();
			if($result){
				$this->session->set_flashdata('test_updated','Test Basic Information Updated Successfully!');
				redirect('tests/viewalltest');
			}else{
				$this->session->set_flashdata('test_not_updated','Test Information not Update!');
				redirect('tests/viewalltest');
			}
			
		}
	}

	public function viewactivetest(){
		$admintype = $this->session->userdata('admintype');
		if(!($this->session->userdata('logged_in')) OR !($admintype === "admin" OR "super")) {
				redirect('redirect/index');
			}

		$data['tests'] = $this->Tests_Model->getallactivetests();

		if($admintype === "super"){
			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/tests/viewallactivetests',$data);
			$this->load->view('templates/footer');
		}elseif ($admintype === "admin") {
			$this->load->view('templates/header');
			$this->load->view('pages/admins/index');
			$this->load->view('pages/tests/viewallactivetests',$data);
			$this->load->view('templates/footer');
		}else{
			redirect('redirect/index');
		}
	}

	public function viewdeactivetest(){
		$admintype = $this->session->userdata('admintype');
		if(!($this->session->userdata('logged_in')) OR !($admintype === "admin" OR "super")) {
				redirect('redirect/index');
			}

		$data['tests'] = $this->Tests_Model->getalldeactivetests();

		if($admintype === "super"){
			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/tests/viewalldeactivetests',$data);
			$this->load->view('templates/footer');
		}elseif ($admintype === "admin") {
			$this->load->view('templates/header');
			$this->load->view('pages/admins/index');
			$this->load->view('pages/tests/viewalldeactivetests',$data);
			$this->load->view('templates/footer');
		}else{
			redirect('redirect/index');
		}
	}


	public function pendingReports(){

		$admintype = $this->session->userdata('admintype');
		if(!($this->session->userdata('logged_in')) OR !($admintype === "admin" OR "super")) {
				redirect('redirect/index');
			}

		$data['pendingReports'] = $this->Tests_Model->getPendingReports();

		if($admintype === "super"){
			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/tests/pendingReports',$data);
			$this->load->view('templates/footer');
		}elseif ($admintype === "admin") {
			$this->load->view('templates/header');
			$this->load->view('pages/admins/index');
			$this->load->view('pages/tests/pendingReports',$data);
			$this->load->view('templates/footer');
		}else{
			redirect('redirect/index');
		}

	}

	public function viewdetailsoftestpatient(){

		$id = $this->uri->segment('3');

		$admintype = $this->session->userdata('admintype');
		if(!($this->session->userdata('logged_in')) OR !($admintype === "admin" OR "super")) {
				redirect('redirect/index');
			}

		$data['data'] = $this->Tests_Model->getTestPatientDetails($id);

		if($admintype === "super"){
			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/tests/viewTestPatientDetails',$data);
			$this->load->view('templates/footer');
		}elseif ($admintype === "admin") {
			$this->load->view('templates/header');
			$this->load->view('pages/admins/index');
			$this->load->view('pages/tests/viewTestPatientDetails',$data);
			$this->load->view('templates/footer');
		}else{
			redirect('redirect/index');
		}
	}



	public function printReportAgain(){

		$id = $this->uri->segment('3');

		$admintype = $this->session->userdata('admintype');
		if(!($this->session->userdata('logged_in')) OR !($admintype === "admin" OR "super")) {
				redirect('redirect/index');
			}
		$data = $this->Tests_Model->getTestPatientDetails($id);

		$html = '

	    		<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reciption Report</title>


	<link rel="stylesheet" type="text/css" href="'.base_url('assets/css/bootstrap.min.css').'">
	<script src="'.base_url('assets/js/jquery-3.3.1.min.js').'"></script>
	<script src="'.base_url('assets/js/popper.min.js').'"></script>
	<script src="'.base_url('assets/js/main.js').'"></script>
	<script src="'.base_url('assets/js/bootstrap.min.js').'"></script>

	<style>
		.alignRight {
		  text-align: right;
		}
	</style>
</head>
<body>
<button target="_blank" style="align: left" onclick="printDiv()" class="btn btn-success">Print</button>
		<a href="'.base_url('tests/pendingReports').'" class="btn btn-warning">Back</a>
	<div id="example" style="margin-top: 5rem;">
		<div class="container">
      <div class="row">
        <div class="col-md-8">
          <p class="card-text">Patient Information</p> ';

    		foreach ($data['primary'] as $key => $basic){
    			 
    			 $html.= '
    			 Patient Name :'.$basic['p_name'].
    			 '<br>'.
    			 'Patient ID :'.$basic['patientid'].
    			 '<br>'.
    			 'Age :'.$basic['p_age'].
    			 '<br>'.
    			 'Mobile No :'.$basic['p_mobile'].
    			 '<br>'.
    			 'Gender : '.$basic['p_gender'].
    			 '<br>'.
    			 'Blood-Group : '.$basic['p_blood_group'].
    			 '<br>'.
    			 'Invoice Number :'.$basic['invoice'].
    			 '<br>'.
    			 '<br>'.
    			 $basic['img'].
    			 '</div>'.
    			 '<div class="col-md-4">
          <p class="card-text">Consultant By</p>'.
          		'Doctor Name:  '.$basic['ref_doc_id']
          ;
    		}

    		$html.='</div>
      </div>
       <div class="row mt-3">
        <div class="col-12">
          <table class="table">
            <thead>
              <tr>
                <th>Test Name</th>
                <th>O. Amount</th>
                <th>Discount</th>
                <th>Net Price</th>
              </tr>
            </thead>
            <tbody>';

            foreach ($data['tests'] as $key => $test) {
            	
            	$html.= '<tr>'.'<td>'.$test['test_id'].'</td>'.
            			'<td>'.$test['test_price'].'</td>'.
            			'<td>'.$test['test_discount'].'</td>'.
            			'<td>'.$test['net_amount'].'</td>'.'</tr>'
            	;
            }

            $html.= '<tr>
              <td colspan="4"></td>
            </tr>';

            foreach ($data['primary'] as $key => $basic){
            	
            	$html.='<tr>
                <td colspan="3" class="alignRight">Total:</td>'.
                '<td colspan="1">'.$basic['netamount'].'</td>'.
                '</tr>'.
                '<tr>'.
                '<td colspan="3" class="alignRight">Paid-Amount:</td>'.
                '<td colspan="1">'.$basic['paidamount'].'</td>'.
                '</tr>'.
                '<tr>'.
                '<td colspan="3" class="alignRight">Due-Amount:</td>'.
                '<td colspan="1">'.$basic['dueamount'].'</td>'.
                '</tr>'
            	;
            }

    $html.= '

    		</tbody>
          </table>
        </div>
      </div>
       <footer>&copy; Copyright: Ingenuity Software Limited, Bangladesh</footer>
    </div>

     
</div>
</body>
<script type="text/javascript">
	function printDiv() {
			var printContents = document.getElementById("example").innerHTML;
	 var originalContents = document.body.innerHTML;
	 document.body.innerHTML = printContents;
	 window.print();
	 document.body.innerHTML = originalContents;
	 };
	</script>
</html> 	

			';

		echo $html;
	}




	public function reportHistory(){

		$admintype = $this->session->userdata('admintype');
		if(!($this->session->userdata('logged_in')) OR !($admintype === "admin" OR "super")) {
				redirect('redirect/index');
			}

		$data['allReports'] = $this->Tests_Model->getAllReports();

		if($admintype === "super"){
			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/tests/reportHistory',$data);
			$this->load->view('templates/footer');
		}elseif ($admintype === "admin") {
			$this->load->view('templates/header');
			$this->load->view('pages/admins/index');
			$this->load->view('pages/tests/reportHistory',$data);
			$this->load->view('templates/footer');
		}else{
			redirect('redirect/index');
		}
	}


	public function loadGivePendingReport(){

		$admintype = $this->session->userdata('admintype');
		if(!($this->session->userdata('logged_in')) OR !($admintype === "admin" OR "super")) {
				redirect('redirect/index');
			}

		$id = $this->uri->segment('3');
		$data['PendingPRDetails'] = $this->Tests_Model->getSingleTP($id);

		if($admintype === "super"){
			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/tests/giveReport',$data);
			$this->load->view('templates/footer');
		}elseif ($admintype === "admin") {
			$this->load->view('templates/header');
			$this->load->view('pages/admins/index');
			$this->load->view('pages/tests/giveReport',$data);
			$this->load->view('templates/footer');
		}else{
			redirect('redirect/index');
		}

	}

	public function deliverReport(){

		$admintype = $this->session->userdata('admintype');
		if(!$this->session->userdata('logged_in') OR (!($admintype === "super" OR "admin"))) {
				redirect('redirect/index'); 
			}

		$result = $this->Tests_Model->deliverReport();

		if ($result){

			redirect('tests/pendingReports','refresh');
		}

	}



	/*Units*/
	public function LoadAddUnit(){

		$admintype = $this->session->userdata('admintype');
		if(!$this->session->userdata('logged_in') OR (!($admintype === "super"))) {
				redirect('redirect/index'); 
			}

		if($admintype === "super"){
			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/tests/addUnit');
			$this->load->view('templates/footer');
		}else{
			redirect('redirect/index');
		}
	}

	public function addUnit(){

		$admintype = $this->session->userdata('admintype');
		if(!$this->session->userdata('logged_in') OR (!($admintype === "super"))) {
				redirect('redirect/index'); 
			}

		$result = $this->Tests_Model->addUnit();

		if($result){

			redirect('tests/LoadAllUnit','refresh');
		}
	}	


	public function LoadAllUnit(){

		$admintype = $this->session->userdata('admintype');
		if(!$this->session->userdata('logged_in') OR (!($admintype === "super"))) {
				redirect('redirect/index'); 
			}
		$data['units'] = $this->Tests_Model->getAllUnit();

		if($admintype === "super"){
			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/tests/viewAllUnits',$data);
			$this->load->view('templates/footer');
		}else{
			redirect('redirect/index');
		}
	}

	public function editUnit(){

		$admintype = $this->session->userdata('admintype');
		if(!($this->session->userdata('logged_in')) OR !($admintype ==="super")){

			redirect('redirect/index');	
		}

		$id = $this->uri->segment('3');
		$data['units'] = $this->Tests_Model->getSingleUnit($id);

		if($admintype === "super"){
			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/tests/editUnit',$data);
			$this->load->view('templates/footer');
		}else{
			redirect('redirect/index');
		}
	}

	public function updateUnit(){

		$admintype = $this->session->userdata('admintype');
		if(!$this->session->userdata('logged_in') OR (!($admintype === "super"))) {
				redirect('redirect/index'); 
			}

		$result = $this->Tests_Model->UpdateUnit();

		if($result){

			redirect('tests/LoadAllUnit','refresh');
		}
	}













































	/*Get data by AJAX*/
	public function fetchPateintIDForSearch()
	{
		$search = $this->input->post('search'); //posting from ajax... name as search... check 184 no line in view

		$html='';

		$patients = $this->Tests_Model->getPateintIDForSearch($search); // get data from db

		if (count($patients)>0) { // check wether blank or not

			$html= '<ul class="list-unstyled ulistStyle" id="pID">'; // an unorder list for showing the suggestions
			foreach ($patients as $key => $value) {
 		 		$html.= '<li class="liStyle" id="'.$value['id'].'">'.$value['patientid'].'-'.$value['mobile'].'</li>';
 		 	}

			$html.= '</ul>';
		}
		
		echo ($html); // returning data to ajax in view
	}


	public function fetchPatient() //this will fetch the patient by id return it to the ajax in view 
	{
		$patID = $this->input->post('pID'); //getting the ID from controller
		$pat = $this->Tests_Model->getsinglePatientRow($patID); //model function calling
		echo json_encode($pat); // returning data as JSON... check line 219 in view...
	}

	
	/*Doctors-By Joy*/
	public function fetchDoctorIDForSearch()
	{
		$search = $this->input->post('search'); //posting from ajax... name as search... check 184 no line in view

		$html='';

		$doctors = $this->Tests_Model->getDoctorIDForSearch($search); // get data from db

		if (count($doctors)>0) { // check wether blank or not

			$html= '<ul class="list-unstyled ulistStyle" id="dID">'; // an unorder list for showing the suggestions
			foreach ($doctors as $key => $value) {
 		 		$html.= '<li class="liStyle" id="'.$value['id'].'">'.$value['name'].'-'.$value['doctorid'].'-'.$value['mobile'].'</li>';
 		 	}

			$html.= '</ul>';
		}
		
		echo ($html); // returning data to ajax in view
	}

	public function fetchDoctor() //this will fetch the patient by id return it to the ajax in view 
	{
		$docID = $this->input->post('dID'); //getting the ID from controller
		$doc = $this->Tests_Model->getsingleDoctorRow($docID); //model function calling
		echo json_encode($doc); // returning data as JSON... check line 219 in view...
	}



	public function fetchTestIDForSearch()
	{
		$search = $this->input->post('search'); //posting from ajax... name as search... check 184 no line in view

		$html='';

		$tests= $this->Tests_Model->getTestIDForSearch($search); // get data from db

		if (count($tests)>0) { // check wether blank or not

			$html= '<ul class="list-unstyled ulistStyle" id="tID">'; // an unorder list for showing the suggestions
			foreach ($tests as $key => $value) {
 		 		$html.= '<li class="liStyle" id="'.$value['id'].'">'.$value['name'].'</li>';
 		 	}

			$html.= '</ul>';
		}
		
		echo ($html); // returning data to ajax in view
	}

	public function fetchTest() //this will fetch the patient by id return it to the ajax in view 
	{
		$testID = $this->input->post('tID'); //getting the ID from controller
		$test = $this->Tests_Model->getsingleTestRow($testID); //model function calling
		echo json_encode($test); // returning data as JSON... check line 219 in view...
	}


	/*public function add_test_list(){
		$id = $this->input->post('id');
		$p_name = $this->input->post('p_name');
		$p_mobile = $this->input->post('p_mobile');
		$p_age = $this->input->post('p_age');
		$p_gender = $this->input->post('p_gender');
		$p_blood_group = $this->input->post('p_blood_group');
		$patientid = $this->input->post('patientid');
		$test_name = $this->input->post('test_name');
		$test_price = $this->input->post('price');
		$t_duration = $this->input->post('t_duration');
		$discount = $this->input->post('discount');
		$ref_doc = $this->input->post('ref_doc');
		$ref_doc_id = $this->input->post('ref_doc_id');
		$commission = $this->input->post('commission');

		if($patientid && $id){
			$data = array(
				'id' => $id,
				'qty' => 1,
				'name' => $test_name,
	            'price' => $test_price,
				'p_name' => $p_name,
	            'p_mobile' => $p_mobile,
	            'p_age' => $p_age,
	            'p_gender' => $p_gender,
	            'p_blood_group' => $p_blood_group,
	            'patientid' => $patientid,      
	            't_duration' => $t_duration,
	            'discount' => $discount,
	            'ref_doc' => $ref_doc,
	            'ref_doc_id' => $ref_doc_id,
	            'commission' => $commission,
			);
			$this->cart->insert($data);
			echo json_encode(array('status' => 'ok',
							'data' => $this->cart->contents()
						)
				);
		}else{
			echo json_encode(array('status' => 'error'));
		}
        
	}*/

	public function add_test_list(){
		$id = $this->input->post('id');
		$test_name = $this->input->post('test_name');
		$test_cost = $this->input->post('test_cost');
		$test_price = $this->input->post('price');
		$discount = $this->input->post('discount');
		$duration = $this->input->post('duration');

		if($id){
			$data = array(
				'id' => $id, 
				'qty' => 1,
				'name' => $test_name,
				'test_cost' => $test_cost,
	            'price' => $test_price,		
	            'discount' => $discount,
	            'duration' => $duration,

			);
			$this->cart->insert($data);
			echo json_encode(array('status' => 'ok',
							'data' => $this->cart->contents()
						)
				);
		}else{
			echo json_encode(array('status' => 'error'));
		}
        
	}

	public function delete_test_list($rowid){

		if($this->cart->remove($rowid)) {
			echo $this->cart->total();
		}else{
			echo "false";
		}

	}



	/*AJAX FOR UNIT*/
	public function addCartForAddTest(){

		$id = rand(1000,9999);
		$unitName = $this->input->post('unitName');
		$MeasurementId = $this->input->post('unitMeasurementId');
		$MeasurementName = $this->Tests_Model->getUnitName($MeasurementId);
		$baseUnit = $this->input->post('baseUnit');

		if($id){
			$data = array(
				'id' => $id, 
				'qty' => 1,
				'price' => 0,
				'name' => $unitName,
				'MeasurementName' => $MeasurementName,	
	            'MeasurementId' => $MeasurementId,
	            'baseUnit' => $baseUnit,
			);

			$this->cart->insert($data);
			echo json_encode(array('status' => 'ok',
							'data' => $this->cart->contents()
						)
				);
		}else{
			echo json_encode(array('status' => 'error'));
		}

	}

	public function deleteCartForTest($rowid){

		if($this->cart->remove($rowid)) {
			echo $this->cart->total();
		}else{
			echo "false";
		}

	}





















}
