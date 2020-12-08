<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="col-md-10 pl-0">
            
	<div class="row mb-3">
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


	
	<div class="row">
		<div class="col-12">
			<!-- <p>Edit Information of <?=$employee['name']; ?></p> -->
			<div class="pr-5">
				<?php echo form_open_multipart('employees/update_employee');?>

				<?php foreach($employees as $employee) :?>
					<p class="text-primary mb-4">Edit Information of employee <?=$employee['name']; ?></p>
				  <div class="row">
				    	<div class="col">
				    		<label for="name">Name</label>
				      		<input type="text" id="name" class="form-control" placeholder="Employee's Name" name="name" value="<?php echo $employee['name']; ?>" required autofocus>
				    	</div>

				    	<div class="col">
				    		<label for="email">Email</label>
				      		<input type="email" id="email" class="form-control" placeholder="Email" name="email" value="<?php echo $employee['email']; ?>"  required>
				    	</div>

				    	<div class="col">
				    		<label for="position">Position</label>
				    		<?php $options = $employee['position']; ?>
						   	<select id="position" class="form-control" name="position" required>
						       	<option selected value="">Choose...</option>
					        	<option value="Duty Doctor" <?php if($options=="Duty Doctor") echo 'selected="selected"'; ?>>Duty Doctor</option>
					        	<option value="nurse" <?php if($options=="nurse") echo 'selected="selected"'; ?>>Nurse</option>
					      	</select>
				    	</div>

				    	<div class="col">
					    		<label for="employeeid">Emplopyee ID</label>
					      		<input type="text" id="employeeid" class="form-control" placeholder="Employee's ID" name="employeeid"  value="<?=$employee['employeeid']; ?>" required readonly>
					    </div>
				  </div>

				  <div class="row mt-2">
					  	<div class="col">
					    		<label for="mobile">Mobile</label>
					      		<input type="text" id="mobile" class="form-control" placeholder="Employee's Mobile number" name="mobile"  value="<?php echo $employee['mobile']; ?>"  required>
					    </div>

					    <div class="col">
				    		<label for="gender">Gender</label>
				    		<?php $options = $employee['gender']; ?>
						   	<select id="gender" class="form-control" name="gender" required>
						       	<option selected value="">Choose...</option>
					        	<option value="male" <?php if($options=="male") echo 'selected="selected"'; ?>>Male</option>
					        	<option value="female" <?php if($options=="female") echo 'selected="selected"'; ?>>Female</option>
					        	<option value="other" <?php if($options=="other") echo 'selected="selected"'; ?>>Other</option>
					      	</select>
				    	</div>

				    	<div class="col">
				    		<label for="salary">Salary</label>
					      	<input type="text" id="salary" class="form-control" placeholder="salary" name="salary" value="<?php echo $employee['salary']; ?>" required>
				    	</div>

				    	<div class="col">
					  		<label for="active">Active Status</label>
					  		<?php $options = $employee['is_active']; ?>
						   	<select id="active" class="form-control" name="active" required>
						       	<option selected value="">Choose...</option>
					        	<option value="active" <?php if($options=="active") echo 'selected="selected"'; ?>>Active</option>
					        	<option value="deactive" <?php if($options=="deactive") echo 'selected="selected"'; ?>>Deactive</option>
					      	</select>
					  	</div>

				    	<!-- <div class="col">
				    		<label for="commission">Commission</label>
					      	<input type="text" id="commission" class="form-control" placeholder="Commission" name="commission" aria-describedby="userHelp"  value="<?php echo $employee['commission']; ?>"  required>
					      	<small id="userHelp" class="form-text text-muted font-weight-bold">Only for doctors. For others write 0.</small>
				    	</div> -->
				  </div>

				 <!--  <div class="row mt-2">
				  	<div class="col">
				  		<label for="paid">Paid</label>
					    <input type="text" id="paid" class="form-control" placeholder="Paid Money" name="paid" value="<?php echo $employee['paid']; ?>"  required>
				  	</div>

				  	<div class="col">
				  		<label for="pending">Pending</label>
					    <input type="text" id="pending" class="form-control" placeholder="Pending Money" name="pending" value="<?php echo $employee['pending']; ?>"  required>
				  	</div> 

				  </div>-->

				  <div class="row">
				  	<div class="col-md-12">
				  		<label for="address">Address</label>
				  		<textarea name="address" id="address" class="form-control" style="height: 110px;"><?php echo $employee['address']; ?>				  			 
				  		</textarea>
				  	</div>
				  </div>

				  <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">

				<?php endforeach; ?>
				  <div class="row">
				  	<div class="col"></div>
				  	<div class="col">
				  		<button class="btn btn-primary mt-3 btn-block" type="submit">Update Information</button>
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