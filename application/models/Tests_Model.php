<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tests_Model extends CI_Model {

	
	public function addtest(){

		$data = array(
			'name' => $this->input->post('testname'),
			'description' => $this->input->post('description'),
			'cost' => $this->input->post('testcost'),
			'price' => $this->input->post('testprice'),
			'is_active' => $this->input->post('isactive'),
			'duration' => $this->input->post('duration'),
		);

		$this->db->insert('tests',$data);
		$testid = $this->db->insert_id();

		$carts = $this->cart->contents();

		foreach ($carts as $key => $cart){
			$items[$key] = array(

				'test_id' => $testid,
				'unit_name' => $cart['name'],
				'measure_id' => $cart['MeasurementId'],
				'base_value' => $cart['baseUnit']
			);
		}

		return $this->db->insert_batch('test_units', $items);

	}

	public function getalltests(){
		$this->db->order_by('tests.id','ASC');
		$query = $this->db->get('tests');
		return $query->result_array();
	}

	/*public function getsingle($id){
		$this->db->where('id',$id);
		$query = $this->db->get('tests',$id);
		return $query->result_array();
	}*/

	public function getsingle($id){

		$this->db->where('id',$id);
		$query = $this->db->get('tests',$id);
		$data['basic'] = $query->result_array();
		$data['units'] = $this->getUnitsOfSingleTest($id);

		foreach ($data['units'] as $key => $value) {
			
			$mid = $value['measure_id'];
			$this->db->where('id',$mid);
			$query = $this->db->get('units');
			$ret = $query->row();
			$unitName = $ret->name;

			$data['units'][$key]['measure_id'] = $unitName;
		}

		return $data;
	}

	public function getUnitsOfSingleTest($id){

		$this->db->where('test_id',$id);
		$query = $this->db->get('test_units',$id);
		return $query->result_array();
	}

	public function getUnitsOfSingleTestwithMeasure($id){

		$data['units'] = $this->getUnitsOfSingleTest($id);
		/*foreach ($data['units'] as $key => $value) {
			
			$mid = $value['measure_id'];
			$this->db->where('id',$mid);
			$query = $this->db->get('units');
			$ret = $query->row();
			$unitName = $ret->name;

			$data['units'][$key]['measure_id_name'] = $unitName;
		}*/

		$data['measures'] = $this->getAllMeasures();
		return $data;
	}

	public function getAllMeasures(){

		$query = $this->db->get('units');
		return $query->result_array();
	}


	/*public function getsingleUnitForEditTest($id){

		$this->db->where('id',$id);
		$query = $this->db->get('test_units',$id);
		$data['basic'] = $query->result_array();
		$data['units'] = $this->getAllUnit();

		return $data;
	}*/

	public function updatetest(){
		$id = $this->input->post('id');
		$data = array(
			'name' => $this->input->post('testname'),
			'description' => $this->input->post('description'),
			'cost' => $this->input->post('testcost'),
			'price' => $this->input->post('testprice'),
			'is_active' => $this->input->post('isactive'),
			'duration' => $this->input->post('duration')
		);

		$this->db->where('id',$id);
		return $this->db->update('tests',$data);
	}

	public function UpdateUnitsOfATest(){

		$count = $this->input->post('rownumbers');

		for($i=1; $i<=$count;$i++) {

			$id = $this->input->post('id')[$i];
			$data[$i] = array(
				  'id' => $id,	
				  'unit_name' => $this->input->post('unitName')[$i], 
		          'measure_id' => $this->input->post('unitMeasurement')[$i],
		          'base_value' => $this->input->post('baseUnit')[$i],
			);
		}

		return $this->db->update_batch('test_units', $data, 'id');
		
	}

	public function addUnitOfExtTest(){

		$test_id = $this->input->post('testid');

		$carts = $this->cart->contents();

		foreach ($carts as $key => $cart){
			$items[$key] = array(

				'test_id' => $test_id,
				'unit_name' => $cart['name'],
				'measure_id' => $cart['MeasurementId'],
				'base_value' => $cart['baseUnit']
			);
		}

		return $this->db->insert_batch('test_units', $items);
	}


	public function deleteSingleUnit($id){

		$this->db->where('id',$id);
		return $this->db->delete('test_units');
	}

	public function getallactivetests(){
		$type = "1";
		$this->db->order_by('tests.id','ASC');
		$this->db->where('is_active',$type);
		$query = $this->db->get('tests');
		return $query->result_array();
	}

	public function getalldeactivetests(){
		$type = "0";
		$this->db->order_by('tests.id','ASC');
		$this->db->where('is_active',$type);
		$query = $this->db->get('tests');
		return $query->result_array();
	}

	/*Add test Patient and several actions related with it*/
	public function addtestpatient($basic){
		
		$carts = $this->cart->contents();

		foreach ($basic as $key => $info) {		
			$patientname = $info['patientname'];
			$patientid = $info['patientid'];
			$patientage = $info['age'];
			$patientmobile = $info['mobile'];
			$patientgender = $info['gender'];
			$patientbloodgroup = $info['bloodgroup'];
			$doctorname = $info['doctorname'];
			$doctorid = $info['doctorid'];
			$docdbid = $info['docdbid'];
			$doctorcommission = $info['commission'];
			$grossamount = $info['grossamount'];
			$discountamount = $info['discountamount'];
			$netamount = $info['netamount'];
			$labcost = $info['labcost'];
			$paidamount = $info['paidamount'];
			$dueamount = $info['dueamount'];
			$invoice = $info['invoice'];
		}

		$data = array(

			'p_name' => $patientname,
            'p_mobile' => $patientmobile,
            'p_age' => $patientage,
            'p_gender' => $patientgender,
            'p_blood_group' => $patientbloodgroup,
            'patientid' => $patientid,
            'ref_doc_id' => $docdbid,
            'grossamount' => $grossamount,
            'discountamount' => $discountamount,
            'netamount' => $netamount,
            'paidamount' => $paidamount,
            'dueamount' => $dueamount,
            'invoice' => $invoice,
            'byuser' => $this->session->userdata('user_id'),
            'd_status' => "0",
            'r_d_by' => "0",
		);

		$this->db->insert('testpatients', $data);
		$testpatientsid = $this->db->insert_id();

		// Insert Doctor's Commission Amount
		if(!$docdbid==NULL){
			$this->db->where('doctorid',$doctorid);
			$query = $this->db->get('doctors');
			$ret = $query->row();
			$currentmoney = $ret->pending;
			$primary = (($doctorcommission*$netamount)/100);
			$currentmoney += $primary;
			$this->db->set('pending',$currentmoney);
		    $this->db->where('doctorid', $doctorid);
		    $this->db->update('doctors');
		    $primary = $this->db->affected_rows();	 
		}
		

		$totallabcost = 0;
		//Insert into Sales Tabel
	    $carts = $this->cart->contents();
	    foreach ($carts as $key => $cart) {
	    	$priceafterdiscount = 0;
	    	$priceafterdiscount = (int)$cart['price'] - (int)$cart['discount'];
	    	$totallabcost += $cart['test_cost'];

	    	$sales[$key] = array(

	    		'test_patient_id' => $testpatientsid,
	    		'test_id' => $cart['id'],
	    		'lab_cost' => $cart['test_cost'],
	    		'test_price' => $cart['price'],
	    		'test_discount' => $cart['discount'],
	    		'net_amount' => $priceafterdiscount,
	    		'data_input_s' => '0',
	    		'by_user' => $this->session->userdata('user_id'),
	    	);
	    }

	    $primary = $this->db->insert_batch('sales_items', $sales);

	    if($primary){

	    	$hisab = array(

	    	'invoice' => $invoice,
	    	'cost' => $totallabcost,
	    	'cost_type' => "lab",
	    	'income' => $paidamount,
	   		
	   		 );
	    	$result = $this->db->insert('hisab', $hisab);
	    }

	    if($result){

	    	$tests = $carts;
	    	$img = $this->Barcode($invoice);

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
<body >
<button target="_blank" style="align: left" onclick="printDiv()" class="btn btn-success">Print</button>
		<a href="'.base_url('tests/loadaddtestpatient').'" class="btn btn-warning">Back</a>
<div id="example">
	<div class="container">
      <div class="row">
        <div class="col-md-8">
          <p class="card-text">Patient Information</p>
          Patient Name : '.$patientage.'
          <br>
          Patient ID : '.$patientid.'
          <br>
          Age : '.$patientage.'
          <br>
          Mobile No : '.$patientmobile.'
          <br>
          Gender : '.$patientgender.'
          <br>
          Blood-Group : '.$patientbloodgroup.'
          <br>
          Invoice Number : '.$invoice.'
          <br>
          <br>
         '.$img.'
        </div>
        <div class="col-md-4">
          <p class="card-text">Consultant By</p>
          Doctor Name : '.$doctorname.'
     
        </div>
      </div>
    </div>

    <div class="row" style="margin-top:3rem;">
        <div class="col-12">
          <p class="card-text ml-3">Tests list:</p>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Test Name</th>
                <th>Test Price</th>           
                <th>Discount</th>
                <th>Price After Discount</th>
              </tr>
            </thead>
            <tbody>';
              	$grossamount = 0; 
              	$discountamount = 0; 
                $netamount = 0; 
                $labcost = 0; 

                foreach ($tests as $test){
                  	$grossamount += $test['price']; 
               		$price = (int)$test['price'] - (int)$test['discount']; 
                 	$netamount += $price; 
                	$labcost += $test['test_cost']; 
                	$discountamount += $test['discount']; 
              
                
             $html.='<tr>
                <td>'.$test['name'].'</td>
                <td>'.$test['price'].'</td>
                <td>'.$test['discount'].'</td>
                <td>'.$price.'</td>  
              </tr>';
              
              }

              $html.='<tr>
                <td colspan="4"></td>
              </tr>
              <tr>
                <td colspan="3" class="alignRight">Total:</td>
                <td colspan="1">'.$netamount.'</td>
              </tr>
              <tr>
                <td colspan="3" class="alignRight">Paid:</td>
                <td colspan="1">'.$paidamount.'</td>
              </tr>
              <tr>
                <td colspan="3" class="alignRight">Pending:</td>
                <td colspan="1">'.$dueamount.'</td>

              </tr>
            </tbody>

          </table>
        </div>
      </div>

      <footer>&copy; Copyright:Softsource Software System Limited, Bangladesh</footer>
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

	}

	public function Barcode($value)
	{
		require "vendor/autoload.php";
		$generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
		return '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($value, $generator::TYPE_CODE_128)) . '">';
	}


	public function getPendingReports(){
		$type = "0";
		$this->db->where('d_status',$type);
		$query = $this->db->get('testpatients');
		return $query->result_array();
	}


	public function getTestPatientDetails($id){

		$this->db->where('invoice',$id);
		$query = $this->db->get('testpatients');
		$data['primary'] = $query->result_array();

		$ret = $query->row();
		$testpatientsid = $ret->id;

		$this->db->where('test_patient_id',$testpatientsid);
		$query = $this->db->get('sales_items');
		$data['tests'] = $query->result_array();

		foreach ($data['tests'] as $key => $test){
			$tid = $test['test_id'];

			$this->db->where('id',$tid);
			$query = $this->db->get('tests');
			$ret = $query->row();
			$name = $ret->name;

			$data['tests'][$key]['test_id'] = $name;
		}

		foreach ($data['primary'] as $key => $value) {
			$did = $value['ref_doc_id'];

			$this->db->where('id',$did);
			$query = $this->db->get('doctors');
			$ret = $query->row();
			$name = $ret->name;

			$data['primary'][$key]['ref_doc_id'] = $name;

			$inv = $value['invoice'];
			$img = $this->Barcode($inv);

			$data['primary'][$key]['img'] = $img;
		}
	
		return $data;
	}


	public function getAllReports(){
	
		$this->db->order_by('testpatients.id','DESC');			
		$query = $this->db->get('testpatients');
		return $query->result_array();
	}


	public function getSingleTP($id){

		$this->db->where('id',$id);
		$query = $this->db->get('testpatients');
		$data = $query->result_array();

		foreach ($data as $key => $value) {
			$ret = $query->row();
			$id = $ret->ref_doc_id;
			$byuser = $ret->byuser;

			$this->db->where('id',$id);
			$query = $this->db->get('doctors');
			$ret = $query->row();
			$name = $ret->name;
			$data[$key]['ref_doc_id'] = $name;

			$this->db->where('id',$byuser);
			$query = $this->db->get('users');
			$ret1 = $query->row();
			$name1 = $ret1->name;
			$data[$key]['byuser'] = $name1;
		}

		// var_dump($data);
		return $data;
	}

	public function deliverReport(){

		$id = $this->input->post('id');
		$dueamount = $this->input->post('dueamount');
		$nowpay = $this->input->post('nowpay');
		$paidamount = $this->input->post('paidamount');
		$invoice = $this->input->post('invoice');

		$nowdueamount = $dueamount - $nowpay;
		$nowpaidamount = $paidamount + $nowpay;

		$data = array(

			'paidamount' => $nowpaidamount,
			'dueamount' => $nowdueamount,
			'd_status' => '1',
			'r_d_by' => $this->session->userdata('user_id'),
		);

		$this->db->where('id',$id);
		$result = $this->db->update('testpatients',$data);

		if($result){
			$hisab = array(

				'invoice' => $invoice,
				'cost' => '0',
				'cost_type' => 'none',
				'income' => $nowpay,
			);

			return $this->db->insert('hisab', $hisab);
		}
		
	}



	public function addUnit(){

		$data = array(

			'name' => $this->input->post('name')
		);

		return $this->db->insert('units', $data);
	}


	public function getAllUnit(){
	
		$query = $this->db->get('units');
		return $query->result_array();
	}

	public function getSingleUnit($id){

		$this->db->where('id',$id);
		$query = $this->db->get('units',$id);
		return $query->result_array();
	}

	public function UpdateUnit(){

		$id = $this->input->post('id');
		$data = array(
			'name' => $this->input->post('name')
		);

		$this->db->where('id',$id);
		return $this->db->update('units',$data);

	}


	public function getUnitName($id){

		$this->db->where('id',$id);
		$query = $this->db->get('units',$id);
		$ret = $query->row();
		$name = $ret->name;
		return $name;
	}


















































	/*AJAX METHODS*/
	public function getPateintIDForSearch($search='')
		{
			if($search)
			{
		 		$sql = "SELECT * FROM  patients WHERE patientid LIKE '$search%' OR mobile LIKE '$search%' ";
				$query = $this->db->query($sql);
				return $query->result_array();
			}
		}

	public function getsinglePatientRow($id){

			$this->db->where('id',$id);
			$query = $this->db->get('patients',$id);
			return $query->row_array(); //so that we can use it without foreach loop.. Because it will always contain only one row... check the documentation...
		}




	/*By Joy Das*/
	public function getDoctorIDForSearch($search='')
		{
			if($search)
			{
		 		$sql = "SELECT * FROM  doctors WHERE name LIKE '$search%' OR doctorid LIKE '$search%' OR mobile LIKE '$search%' ";
				$query = $this->db->query($sql);
				return $query->result_array();
			}
		}

	public function getsingleDoctorRow($id){

			$this->db->where('id',$id);
			$query = $this->db->get('doctors',$id);
			return $query->row_array(); //so that we can use it without foreach loop.. Because it will always contain only one row... check the documentation...
		}


	public function getTestIDForSearch($search='')
		{
			if($search)
			{
		 		$sql = "SELECT * FROM  tests WHERE name LIKE '$search%' AND is_active LIKE '1' ";
				$query = $this->db->query($sql);
				return $query->result_array();
			}
		}

	public function getsingleTestRow($id){

			$this->db->where('id',$id);
			$query = $this->db->get('tests',$id);
			return $query->row_array(); //so that we can use it without foreach loop.. Because it will always contain only one row... check the documentation...
		}













}
