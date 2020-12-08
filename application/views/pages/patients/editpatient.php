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
					<?php echo form_open_multipart('patients/update');?>
					<?php foreach($patients as $patient): ?>
					<!-- Basic Information -->
					<div>
						<p class="text-primary font-weight-bold">Patient Information</p>
					  <div class="row">
					    	<div class="col">
					    		<label for="name">Name:</label>
					      		<input type="text" id="name" class="form-control" placeholder="Name" name="name" value="<?php echo $patient['name']; ?>" required autofocus>
					    	</div>
					  </div>
					  <div class="row">
					  	<div class="col">
					  		<label for="age">Age:</label>
				      		<input type="text" id="age" class="form-control" placeholder="Age" name="age" value="<?php echo $patient['age']; ?>" required>	
					  </div>
					  <div class="col">
			    		<label for="gender">Gender</label>
			    		<?php $options = $patient['gender']; ?>
					   	<select id="gender" class="form-control" name="gender" required>
					       	<option selected value="">Choose...</option>
				        	<option value="male" <?php if($options=="male") echo 'selected="selected"'; ?>>Male</option>
				        	<option value="female" <?php if($options=="female") echo 'selected="selected"'; ?>>Female</option>
				        	<option value="other" <?php if($options=="other") echo 'selected="selected"'; ?>>Other</option>
				      	</select>
					   </div>
					    <div class="col">
					    	<label for="bloodgroup">Blood Group</label>
					    	<?php $options = $patient['blood_group']; ?>
						   	<select id="bloodgroup" class="form-control" name="bloodgroup" required>
						       	<option selected value="">Choose...</option>
					        	<option value="A+" <?php if($options=="A+") echo 'selected="selected"'; ?>>A+</option>
					        	<option value="A-" <?php if($options=="A-") echo 'selected="selected"'; ?>>A-</option>
					        	<option value="B+" <?php if($options=="B+") echo 'selected="selected"'; ?>>B+</option>
					        	<option value="B-" <?php if($options=="B-") echo 'selected="selected"'; ?>>B-</option>
					        	<option value="AB+" <?php if($options=="AB+") echo 'selected="selected"'; ?>>AB+</option>
					        	<option value="AB-" <?php if($options=="AB-") echo 'selected="selected"'; ?>>AB-</option>
					        	<option value="O+" <?php if($options=="O+") echo 'selected="selected"'; ?>>O+</option>
					        	<option value="O-" <?php if($options=="O-") echo 'selected="selected"'; ?>>O-</option>
					        	<option value="Unknown" <?php if($options=="Unknown") echo 'selected="selected"'; ?>>Unknown</option>
					      	</select>
					    </div>
					    <!-- <div class="col">
					    	<label for="reference">Reference By: </label>
						   	<input type="text" id="reference" class="form-control" placeholder="Reference Doctor Name" value="<?php echo $patient['reference']; ?>" name="reference" >	
					    </div> 	 -->
					    <div class="col">
					    	<label for="patientid">Patient ID: </label>
						   	<input type="text" id="patientid" class="form-control" placeholder="Patient ID" name="patientid" value="<?php echo $patient['patientid']; ?>" required readonly>	
					    </div> 
					  </div>
					</div>

					<!-- Personal Information -->

					<div class="mt-3">
						<p class="font-weight-bold text-primary">Personal Information</p>
						<div class="row">
							<div class="col">
							  <label for="guardianname">Guardian Name: </label>
					      	  <input type="text" id="guardianname" class="form-control" placeholder="Father's/Mother's/Spouse's Name" name="guardianname" value="<?php echo $patient['guardian_name']; ?>" required>	
							</div>
						</div>
						<div class="row">
					       <div class="col">					  		
					    	  <label for="contactno">Contact No :</label>
					      	  <input type="text" id="contactno" class="form-control" placeholder="Contact No" name="mobile" value="<?php echo $patient['mobile']; ?>" required>					    	
					  	   </div>					    	
					       <div class="col">
					          <label for="email">Patient Email (if have): </label>
					  	   	  <input type="text" id="email" class="form-control" placeholder="email" name="email" value="<?php echo $patient['email']; ?>">
					    	</div>
					    	<div class="col">
					    	  <label for="maritial">Maritial Status :</label>
					    	  <?php $options = $patient['maritial_status']; ?>
							  <select id="maritial" class="form-control" name="maritial" required>
						       	<option selected value="">Choose...</option>
					        	<option value="married" <?php if($options=="married") echo 'selected="selected"'; ?>>Married</option>
					        	<option value="unmarried" <?php if($options=="unmarried") echo 'selected="selected"'; ?>>Unmarried</option>					       	
						      </select>
					    	</div>
						</div>

						<div class="row">
							<div class="col">
							  <label for="religion">Religion:</label>
							  <?php $options = $patient['religion']; ?>
							  <select id="religion" class="form-control" name="religion" required>
						       	<option selected value="">Choose...</option>
					        	<option value="Islam" <?php if($options=="Islam") echo 'selected="selected"'; ?>>Islam</option>
					        	<option value="Hinduism" <?php if($options=="Hinduism") echo 'selected="selected"'; ?>>Hinduism</option>
					        	<option value="Buddhists" <?php if($options=="Buddhists") echo 'selected="selected"'; ?>>Buddhists</option>
					        	<option value="Christians" <?php if($options=="Christians") echo 'selected="selected"'; ?>>Christians</option>
					        	<option value="others" <?php if($options=="others") echo 'selected="selected"'; ?>>Others</option>							 
						      </select>
							</div>
							<div class="col">
								<label for="nationality">Nationality :</label>
								<?php $options = $patient['nationality']; ?>
								<select id="nationality" class="form-control" name="nationality" required>
						       	<option selected value="">Choose...</option>
					        	<option value="Bangladeshi" <?php if($options=="Bangladeshi") echo 'selected="selected"'; ?>>Bangladeshi</option>
					        	<option value="others" <?php if($options=="others") echo 'selected="selected"'; ?>>Others</option>							 
						      </select>
							</div>
						</div>
						<label for="address">Address : </label>
						<textarea type="text" style="height: 10rem;" id="address" class="form-control" placeholder="address" name="address"><?php echo $patient['address']; ?></textarea>  
					  </div>

					  <!-- Emergency Contacts: -->
					  <div class="mt-3">
					  	<p class="font-weight-bold text-danger">Emergency Contact:</p>
					  	<div class="row">
					  		<div class="col">
					  		  <label for="emergencyName">Name:</label>
					      	  <input type="text" id="emergencyName" class="form-control" placeholder="Name" name="emergencyName" value="<?php echo $patient['emer_name']; ?>" required>
					  		</div>
					  		<div class="col">
					  		  <label for="relationwithpatient">Relation With Patient:</label>
					      	  <input type="text" id="relationwithpatient" class="form-control" placeholder="Relation" name="relationwithpatient" value="<?php echo $patient['emer_relation']; ?>" required>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col">
					  		  <label for="emergencyContact">Contact No:</label>
					      	  <input type="text" id="emergencyContact" class="form-control" placeholder="Emergency Contact no" name="emergencyContact" value="<?php echo $patient['emer_mobile_one']; ?>" required>
					  		</div>
					  		<div class="col">
					  		  <label for="emergencyContacttwo">Alternate Contact No:</label>
					      	  <input type="text" id="emergencyContacttwo" class="form-control" placeholder="Alternate Emergency Contact" name="emergencyContacttwo" value="<?php echo $patient['emer_mobile_two']; ?>">
					  		</div>
					  	</div>
					  </div>

					  <input type="hidden" id="" class="form-control" placeholder="" name="id" value="<?php echo $patient['id']; ?>">

					<?php endforeach; ?>
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