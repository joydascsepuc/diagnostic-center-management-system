<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestReports extends CI_Controller {

	
	public function loadAddRecord(){

		$admintype = $this->session->userdata('admintype');
		if(!$this->session->userdata('logged_in') OR (!($admintype === "super" OR "doctor"))) {
				redirect('redirect/index');
			}

		$data['patients'] = $this->TestReports_Model->getPatientData();

		if($admintype === "super"){
			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/testReports/addReportData',$data);
			$this->load->view('templates/footer');
		}elseif($admintype === "doctor"){
			$this->load->view('templates/header');
			$this->load->view('pages/doctors/index');
			$this->load->view('pages/testReports/addReportData',$data);
			$this->load->view('templates/footer');
		}else{
			redirect('redirect/index','refresh');
		}
	}


	public function getTest(){

		$pid = $this->input->post('pid');
		$tid =  $this->TestReports_Model->getTestID($pid);
		if(count($tid)>0)
		{
			$pro_select_box = '';
			
			$pro_select_box .= '<option value="">Select Test</option>';
			foreach ($tid as $key => $value) {
				$tname =  $this->TestReports_Model->getTestName($value['test_id']);
				$pro_select_box .='<option value="'.$value['id'].'">'.$tname['name'].'</option>';
			}
			echo json_encode($pro_select_box);
		}
		else{
			$pro_select_box = '';
			$pro_select_box .= '<option value="">None</option>';
			echo json_encode($pro_select_box);
		}
	}

	public function getDefaultUnits(){
		
		$sid = $this->input->post('sid');
		$pid = $this->TestReports_Model->getPID($sid);
		$tid =  $this->TestReports_Model->getTestIDfromSales($sid);
		$units = $this->TestReports_Model->getUnits($tid['test_id']);
		$pro_select_box='';
		if(count($units)>0){
			$i = 0;
			foreach ($units as $key => $value) {
				$i++;

				$mid = $value['measure_id'];
				$mname = $this->TestReports_Model->getUnitName($mid);

				$pro_select_box .= '<tr>
                <td class="width-33">'.$value['unit_name'].'
                	<input type = "hidden"></input>
                </td>
                
                <td class="width-33">
                	<input type = "hidden" name = "unitid['.$i.']" value = "'.$value['id'].'"></input>
                	<input type = "text" autocomplete = "off" class="form-control text-center" name="gValue['.$i.']"></input></td>
                <td class="width-33">'.$value['base_value'].' '.$mname['name'].'</td>
              </tr>
            ';
			}

			$pro_select_box .= '<tr>
				<td><input type = "hidden" name = "pat_id" value = "'.$pid['test_patient_id'].'"></input></td>

				<td><input type = "hidden" name = "sales_item_id" value = "'.$sid.'"></input></td>
				<td><input type = "hidden" name = "numbers" value = "'.$i.'"></input></td>
			</tr>';

			echo json_encode($pro_select_box);
		}else{
			$pro_select_box .= '<option value="">None</option>';
			echo json_encode($pro_select_box);
		}

		
	}

	public function addTestReport(){
		
		$admintype = $this->session->userdata('admintype');
		if(!$this->session->userdata('logged_in') OR (!($admintype === "super" OR "doctor"))) {
				redirect('redirect/index');
			}

		$result = $this->TestReports_Model->addReport();

		if($result){
			$this->session->set_flashdata('test_data_added','Test Data added Successfully!');
			redirect('testReports/loadAddRecord','refresh');
		}else{
			$this->session->set_flashdata('test_data_not_added','Test Data not added.');
			redirect('testReports/loadAddRecord','refresh');
		}
	}



	/*For Print Reports*/
	public function loadPrintPendings(){

		$admintype = $this->session->userdata('admintype');
		if(!$this->session->userdata('logged_in') OR (!($admintype === "super" OR "doctor"))) {
				redirect('redirect/index');
			}

		if($admintype === "super"){
			$this->load->view('templates/header');
			$this->load->view('pages/supers/index');
			$this->load->view('pages/testReports/printPendings');
			$this->load->view('templates/footer');
		}elseif($admintype === "admin"){
			$this->load->view('templates/header');
			$this->load->view('pages/doctors/index');
			$this->load->view('pages/testReports/printPendings');
			$this->load->view('templates/footer');
		}else{
			redirect('redirect/index','refresh');
		}	
	}
































	/*AJAX PART*/
	public function fetchPateintIDForSearch(){

		$search = $this->input->post('search');
		$html='';
		$patients = $this->TestReports_Model->getPateintIDForSearch($search);

		if (count($patients)>0) {

			$html= '<ul class="list-unstyled ulistStyle" id="pID">'; 
			foreach ($patients as $key => $value) {
 		 		$html.= '<li class="liStyle" id="'.$value['id'].'">'.$value['invoice'].'-'.$value['p_mobile'].'-'.$value['p_name'].'</li>';
 		 	}

			$html.= '</ul>';
		}
		
		echo ($html);
	}

	public function fetchPatient(){
		$patID = $this->input->post('pID');
		$pat = $this->TestReports_Model->getsinglePatientRow($patID);
		echo json_encode($pat);
	}


	public function getAllTestIDforDeliver(){

		$invoice = $this->input->post('pid');
		$pid = $this->TestReports_Model->getPIDbyInvoice($invoice);
		$tid =  $this->TestReports_Model->getTestIDforDeliver($pid);
		if(count($tid)>0)
		{
			$pro_select_box = '';
			
			$pro_select_box .= '<option value="">Select Test</option>
								<option value="0">Print All</option>	';
			foreach ($tid as $key => $value) {
				$tname =  $this->TestReports_Model->getTestName($value['test_id']);
				$pro_select_box .='<option value="'.$value['id'].'">'.$tname['name'].'</option>';
			}
			echo json_encode($pro_select_box);
		}
		else{
			$pro_select_box = '';
			$pro_select_box .= '<option value="">None</option>';
			echo json_encode($pro_select_box);
		}
	}






	public function getSinglePreviewReport(){

		$salesid = $this->input->post('sid');
		$html = '

			<div class = "row">
				<div class="col-5">
					<h3>Company Name</h3>
				</div>
				<div class="col-2"></div>
				<div class="col-5">
					<p>Company Address</p>
				</div>
			</div>
			<hr>
			<hr>';

		if($salesid == '0'){
			$html = '';
		}else{

			$patientid = $this->TestReports_Model->getPatientIDbySalesID($salesid);
			$data['patients'] = $this->TestReports_Model->getPatientDatabByPid($patientid);

			foreach ($data['patients'] as $key => $p){
				$did = $p['ref_doc_id'];
				$dname = $this->TestReports_Model->getDocName($did);
				$data['patients'][$key]['ref_doc_id'] = $dname;

				$uid = $p['byuser'];
				$uname = $this->TestReports_Model->getReceiverName($uid);
				$data['patients'][$key]['byuser'] = $uname;
			}

			$testid = $this->TestReports_Model->getTestIDbySalesID($salesid);
			$data['testname'] = $this->TestReports_Model->getTestNameByTestID($testid);
			$data['testunits'] = $this->TestReports_Model->getUnits($testid);

			foreach ($data['testunits'] as $key => $value){
				
				$mid = $value['measure_id'];
				$mname = $this->TestReports_Model->getUnitName($mid)['name'];
				$data['testunits'][$key]['measure_id'] = $mname;
			}

			$data['result'] = $this->TestReports_Model->getResultofP($patientid,$salesid);

			foreach ($data['result'] as $key => $input){
				
				$data['testunits'][$key]['result'] = $input['unit_value'];
			}

			/*var_dump($data['testunits']);*/

			$html .= '

				<div class = "row">
					<div class = "col-6">';
					foreach ($data['patients'] as $key => $patient){
						
						echo "Patient Name : ".$patient['p_name'];
						echo "<br>";
						echo "Mobile : ".$patient['p_mobile'];
						echo "<br>";
						echo "Age : ".$patient['p_age'];
						echo "<br>";
						echo "Gender : ".$patient['p_gender'];
						echo "<br>";
						echo "Blood Group : ".$patient['p_blood_group'];
						echo "<br>";
						echo "ID : ".$patient['patientid'];
						echo "<br>";
						echo "Invoice : ".$patient['invoice'];
						echo "<br>";
					}
					
			$html .= '
				</div>
					<div class="col-6">';
					foreach ($data['patients'] as $key => $patient){
						
						echo "Refer Doc Name: ".$patient['ref_doc_id'];
						echo "<br>";
						echo "Order Taken By: ".$patient['byuser'];
						echo "<br>";
					}

						$html.='</div>	
				</div>
			';

			$html .= '
				<div class = "row">
					<div class = "col">';

					echo "Test Name : ".$data['testname'];

			$html .='</div>
				</div>
			';

			$html .= '

				<div class = "row">
					<div class = "col-12">
						<table class="table">
							<thead>
								<tr>
									<th>Unit Name</th>
									<th>Value Get</th>
									<th>Base Value</th>
								</tr>
							</thead>
							<tbody>';
								
							foreach ($data['testunits'] as $key => $unit){
								$html .= '<tr>';

								echo '<td>'.$unit['unit_name'].'</td>';
								echo '<td>'.$unit['result'].'  '.$unit['measure_id'].'</td>';
								echo '<td>'.$unit['base_value'].'  '.$unit['measure_id'].'</td>';

								$html .= '</tr>';
							}

			$html .='</tbody>
						</table>
					</div>
				</div>

			';

		}

		echo json_encode($html);

	}




	/*Print Tests*/
	public function printTests(){

		$salesid = $this->input->post('sid');

		if($salesid != '0'){

			$this->printSingleReport($salesid);
		}else{

		$patientid = $this->input->post('patientID');
		$Sales = $this->TestReports_Model->getSalesList($patientid);
		$html='<!DOCTYPE html>
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
					<body onload="window.print();">
					
							<div id="example" style="margin-top: 5rem;">';
		

		foreach ($Sales as $key => $sale) {

			$html .= '

	    		
						
							<div class="container-fluid mt-5">
							
								<div class = "row mt-5">
									<div class="col-5">
										<h3>Company Name</h3>
									</div>
									<div class="col-2"></div>
									<div class="col-5">
										<p>Company Address</p>
									</div>
								</div>
							</div>
								<hr>
								<hr>';
			
			$salesid = $sale['id'];

			$patientid = $this->TestReports_Model->getPatientIDbySalesID($salesid);
			$data['patients'] = $this->TestReports_Model->getPatientDatabByPid($patientid);

			foreach ($data['patients'] as $key => $p){
				$did = $p['ref_doc_id'];
				$dname = $this->TestReports_Model->getDocName($did);
				$data['patients'][$key]['ref_doc_id'] = $dname;

				$uid = $p['byuser'];
				$uname = $this->TestReports_Model->getReceiverName($uid);
				$data['patients'][$key]['byuser'] = $uname;
			}

			$testid = $this->TestReports_Model->getTestIDbySalesID($salesid);
			$data['testname'] = $this->TestReports_Model->getTestNameByTestID($testid);
			$data['testunits'] = $this->TestReports_Model->getUnits($testid);

			foreach ($data['testunits'] as $key => $value){
				
				$mid = $value['measure_id'];
				$mname = $this->TestReports_Model->getUnitName($mid)['name'];
				$data['testunits'][$key]['measure_id'] = $mname;
			}

			$data['result'] = $this->TestReports_Model->getResultofP($patientid,$salesid);

			foreach ($data['result'] as $key => $input){
				
				$data['testunits'][$key]['result'] = $input['unit_value'];

				$uid = $input['userId'];
				$uname = $this->TestReports_Model->getReceiverName($uid);
				$data['result'][$key]['userId'] = $uname;
			}


			$html .= '
				<div class="container">
					<div class = "row">
						<div class = "col-6">';
						foreach ($data['patients'] as $key => $patient){
							
						$html .='

							Patient Name : '.$patient['p_name'].
							'<br>'.
							'Mobile : '.$patient['p_mobile'].
							'<br>'.
							'Age : '.$patient['p_age'].
							'<br>'.
							'Gender : '.$patient['p_gender'].
							'<br>'.
							'Blood Group : '.$patient['p_blood_group'].
							'<br>'.
							'ID : '.$patient['patientid'].
							'<br>'.
							'Invoice : '.$patient['invoice'].
							'<br>';
						}
					
			$html .= '
				</div>
				<div class = "col-2"></div>
					<div class="col-4">';
					foreach ($data['patients'] as $key => $patient){
						
						$html .= 'Refer Doc Name: '.$patient['ref_doc_id'].
						'<br>'.
						'Order Taken By: '.$patient['byuser'].
						'<br>';
					}

						$html.='</div>	
				</div>
			';

			$html .= '<br><br>
				<div class = "row">
					<div class = "col">';

						$html .= 'Test Name : '.$data['testname'].'<br><br><br>';
						

			$html .='</div>
				</div>
			';

			$html .= '

				<div class = "row">
					<div class = "col-12">
						<table class="table text-center">
							<thead>
								<tr>
									<th>Unit Name</th>
									<th>Value Get</th>
									<th>Base Value</th>
								</tr>
							</thead>
							<tbody>';
								
							foreach ($data['testunits'] as $key => $unit){
								$html .= '<tr>';

								$html .= '<td>'.$unit['unit_name'].'</td>'.
								'<td>'.$unit['result'].'  '.$unit['measure_id'].'</td>'.
								'<td>'.$unit['base_value'].'  '.$unit['measure_id'].'</td>';

								$html .= '</tr>';
							}

			$html .='</tbody>
						</table>
						</div>
					</div>';

			foreach ($data['result'] as $key => $value) {
				
				$varifiedby = $value['userId'];
			}

			
				
				$html.='
					<br><br>

					<div class="row">
						<div class="col">
							<hr>
						</div>
					</div>
					
					<div class="row">
						<div class="col-4"></div>
						<div class="col-4"></div>
						<div class="col-4 text-center">
						<br><br>
						Verified By : '.$varifiedby.

						'</div>
					</div>
				';
			

			$html.= '<hr><hr>
		    </div>
		    </div>
		       <footer>&copy; Copyright: Ingenuity Software Limited, Bangladesh</footer>
		    </div>
		    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		    	';
		}
	}
		     
		$html.= '</div>
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
		</html> ';

			echo $html;		

	}



	public function printSingleReport($salesid){

		$salesid = $salesid;

			$patientid = $this->TestReports_Model->getPatientIDbySalesID($salesid);
			$data['patients'] = $this->TestReports_Model->getPatientDatabByPid($patientid);

			foreach ($data['patients'] as $key => $p){
				$did = $p['ref_doc_id'];
				$dname = $this->TestReports_Model->getDocName($did);
				$data['patients'][$key]['ref_doc_id'] = $dname;

				$uid = $p['byuser'];
				$uname = $this->TestReports_Model->getReceiverName($uid);
				$data['patients'][$key]['byuser'] = $uname;
			}

			$testid = $this->TestReports_Model->getTestIDbySalesID($salesid);
			$data['testname'] = $this->TestReports_Model->getTestNameByTestID($testid);
			$data['testunits'] = $this->TestReports_Model->getUnits($testid);

			foreach ($data['testunits'] as $key => $value){
				
				$mid = $value['measure_id'];
				$mname = $this->TestReports_Model->getUnitName($mid)['name'];
				$data['testunits'][$key]['measure_id'] = $mname;

			}

			$data['result'] = $this->TestReports_Model->getResultofP($patientid,$salesid);

			foreach ($data['result'] as $key => $input){
				
				$data['testunits'][$key]['result'] = $input['unit_value'];

				$uid = $input['userId'];
				$uname = $this->TestReports_Model->getReceiverName($uid);
				$data['result'][$key]['userId'] = $uname;
			}



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
							<a href="'.base_url('testReports/loadPrintPendings').'" class="btn btn-warning">Back</a>
						<div id="example" style="margin-top: 5rem;">
							<div class="container-fluid">
								<hr>
								<hr>
								<div class = "row">
									<div class="col-5">
										<h3>Company Name</h3>
									</div>
									<div class="col-2"></div>
									<div class="col-5">
										<p>Company Address</p>
									</div>
								</div>
							</div><hr>';




			$html .= '<br><br>
				<div class="container">
					<div class = "row">
						<div class = "col-6">';
						foreach ($data['patients'] as $key => $patient){
							
						$html .='

							Patient Name : '.$patient['p_name'].
							'<br>'.
							'Mobile : '.$patient['p_mobile'].
							'<br>'.
							'Age : '.$patient['p_age'].
							'<br>'.
							'Gender : '.$patient['p_gender'].
							'<br>'.
							'Blood Group : '.$patient['p_blood_group'].
							'<br>'.
							'ID : '.$patient['patientid'].
							'<br>'.
							'Invoice : '.$patient['invoice'].
							'<br><br><br>
							</div>';
						}
					
			$html .= '	<div class="col-3"></div>
						<div class="col-3">';
						foreach ($data['patients'] as $key => $patient){
							
							$html .= 'Refer Doc Name: '.$patient['ref_doc_id'].
							'<br>'.
							'Order Taken By: '.$patient['byuser'].
							'<br>';
						}

						$html.='</div>	
									</div>';

			$html .= '
				<div class = "row">
					<div class = "col">';

						$html .= 'Test Name : '.$data['testname'].'<br><br><br>';
						

			$html .='</div>
				</div>
			';

			$html .= '

				<div class = "row">
					<div class = "col-12">
						<table class="table text-center">
							<thead>
								<tr>
									<th>Unit Name</th>
									<th>Value Get</th>
									<th>Base Value</th>
								</tr>
							</thead>
							<tbody>';
								
							foreach ($data['testunits'] as $key => $unit){
								$html .= '<tr>';

								$html .= '<td>'.$unit['unit_name'].'</td>'.
								'<td>'.$unit['result'].'  '.$unit['measure_id'].'</td>'.
								'<td>'.$unit['base_value'].'  '.$unit['measure_id'].'</td>';

								$html .= '</tr>';
							}

			$html .='</tbody>
						</table>
						</div>
					</div>
				

			';

			foreach ($data['result'] as $key => $value) {
				
				$varifiedby = $value['userId'];
			}

			$html.='
					<br><br>
					<div class="row">
						<div class="col">
							<hr>
						</div>
					</div>

					<div class="row">
						<div class="col-6"></div>
						<div class="col-4"></div>
						<div class="col-2 text-center">
							<br><br>
							Verified By Doc : <br>'.$varifiedby.

						'</div>
					</div>
				';

			$html.= '
			<hr><hr>
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
		</html> ';

		echo $html;
		// var_dump($data);

	}
}