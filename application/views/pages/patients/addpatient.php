<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="col-md-10 ml-0">

	<div class="row">
		<div class="col-md-4">
			<div class="mt-5">
	   			<table>
		   			<tr>
			  			<td><i class="fas fa-clock fa-3x mr-2"></i></td>
						<div>
					  	  <td id="Hour" class = "clock"></td>
						  <td id="Minut" class = "clock"></td>
						  <td id="Second" class = "clock"></td>	  
						</div>
		   			</tr>
		 		</table> 
			</div>
		</div>
		<div class="col-md-4"></div>
		<div class="col-md-4">
			 <div class="mt-5">
			 	<i class="fas fa-calendar-week fa-3x mr-2"></i>
			 	<p class="date"><?php echo "" . date("d/m/Y") . "<br>"; ?></p>
			 </div>
		</div>
	</div>

	<!-- Patient Entry Form -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<h3 class="text-danger font-weight-bold">Paitent Entry Form</h3>
				<div class="mt-5">
					<?php echo form_open_multipart('patients/add');?>
					<!-- Basic Information -->
					<div>
						<p class="text-primary font-weight-bold">Patient Information</p>
					  <div class="row">
					    	<div class="col">
					    		<label for="name">Name:</label>
					      		<input type="text" id="name" class="form-control" placeholder="Name" name="name" required autofocus>
					    	</div>
					  </div>
					  <div class="row">
					  	<div class="col">
					  		<label for="age">Age:</label>
				      		<input type="text" id="age" class="form-control" placeholder="Age" name="age" required>	
					  </div>
					  <div class="col">
			    		<label for="gender">Gender</label>
					   	<select id="gender" class="form-control" name="gender" required>
					       	<option selected value="">Choose...</option>
				        	<option value="male">Male</option>
				        	<option value="female">Female</option>
				        	<option value="other">Other</option>
				      	</select>
					   </div>
					    <div class="col">
					    	<label for="bloodgroup">Blood Group</label>
						   	<select id="bloodgroup" class="form-control" name="bloodgroup" required>
						       	<option selected value="">Choose...</option>
					        	<option value="A+">A+</option>
					        	<option value="A-">A-</option>
					        	<option value="B+">B+</option>
					        	<option value="B-">B-</option>
					        	<option value="AB+">AB+</option>
					        	<option value="AB-">AB-</option>
					        	<option value="O+">O+</option>
					        	<option value="O-">O-</option>
					        	<option value="Unknown">Unknown</option>
					      	</select>
					    </div>
					    <!-- <div class="col">
					    	<label for="reference">Reference By: </label>
						   	<input type="text" id="reference" class="form-control" placeholder="Reference Doctor Name" name="reference">	
					    </div>  -->

					    <!-- <div class="col">
					    	 <?php $data =  date('YmdHis'); ?> 
					    	<label for="patientid">Patient ID: </label>
						   	<input type="text" id="patientid" class="form-control" placeholder="Patient ID" name="patientid"  disabled >	
					    </div>  -->

					  </div>
					</div>

					<!-- Personal Information -->

					<div class="mt-3">
						<p class="font-weight-bold text-primary">Personal Information</p>
						<div class="row">
							<div class="col">
							  <label for="guardianname">Guardian Name: </label>
					      	  <input type="text" id="guardianname" class="form-control" placeholder="Father's/Mother's/Spouse's Name" name="guardianname" required>	
							</div>
						</div>
						<div class="row">
					       <div class="col">					  		
					    	  <label for="contactno">Contact No :</label>
					      	  <input type="text" id="contactno" class="form-control" placeholder="Contact No" name="mobile" required>					    	
					  	   </div>					    	
					       <div class="col">
					          <label for="email">Patient Email (if have): </label>
					  	   	  <input type="text" id="email" class="form-control" placeholder="email" name="email">
					    	</div>
					    	<div class="col">
					    	  <label for="maritial">Maritial Status :</label>
							  <select id="maritial" class="form-control" name="maritial" required>
						       	<option selected value="">Choose...</option>
					        	<option value="married">Married</option>
					        	<option value="unmarried">Unmarried</option>					       	
						      </select>
					    	</div>
						</div>

						<div class="row">
							<div class="col">
							  <label for="religion">Religion:</label>
							  <select id="religion" class="form-control" name="religion" required>
						       	<option selected value="">Choose...</option>
					        	<option value="Islam">Islam</option>
					        	<option value="Hinduism">Hinduism</option>
					        	<option value="Buddhists">Buddhists</option>
					        	<option value="Christians">Christians</option>
					        	<option value="others">Others</option>							 
						      </select>
							</div>
							<div class="col">
								<label for="nationality">Nationality :</label>
								<select id="nationality" class="form-control" name="nationality" required>
						       	<option selected value="">Choose...</option>
					        	<option value="Bangladeshi">Bangladeshi</option>
					        	<option value="others">Others</option>							 
						      </select>
							</div>
						</div>
						<label for="address">Address : </label>
						<textarea type="text" style="height: 10rem;" id="address" class="form-control" placeholder="address" name="address"></textarea>  
					  </div>

					  <!-- Emergency Contacts: -->
					  <div class="mt-3">
					  	<p class="font-weight-bold text-danger">Emergency Contact:</p>
					  	<div class="row">
					  		<div class="col">
					  		  <label for="emergencyName">Name:</label>
					      	  <input type="text" id="emergencyName" class="form-control" placeholder="Name" name="emergencyName" required>
					  		</div>
					  		<div class="col">
					  		  <label for="relationwithpatient">Relation With Patient:</label>
					      	  <input type="text" id="relationwithpatient" class="form-control" placeholder="Relation" name="relationwithpatient" required>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col">
					  		  <label for="emergencyContact">Contact No:</label>
					      	  <input type="text" id="emergencyContact" class="form-control" placeholder="Emergency Contact no" name="emergencyContact" required>
					  		</div>
					  		<div class="col">
					  		  <label for="emergencyContacttwo">Alternate Contact No:</label>
					      	  <input type="text" id="emergencyContacttwo" class="form-control" placeholder="Alternate Emergency Contact" name="emergencyContacttwo">
					  		</div>
					  	</div>
					  </div>

					  <div class="row">
					  	<div class="col"></div>
					  	<div class="col">
					  		<button class="btn btn-outline-primary mt-3 btn-block mb-5 mt-5" type="submit">Add Patient</button>
					  	</div>
					  	<div class="col"></div>
					  </div>		  

					</form>

				</div>
			</div>
		</div>
	</div>  

   
	

		
   













        </div>
    </div>
</div>