<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="col-md-10">
            
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

	<p class="text-danger font-weight-bold mt-4 mb-3">Edit Details</p>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">

				<?php echo form_open_multipart('doctorsection/update_doctor');?>
				<?php foreach($doctors as $doctor) :?>

					<div class="row">
						<div class="col">
							<label for="name">Name:</label>
						    <input value="<?=$doctor['name']; ?>" type="text" id="name" class="form-control" placeholder="Name" name="name" required autofocus>
						</div>
						<div class="col-3">
							<label for="consult">Consult in Lab:</label>
							<?php $options = $doctor['consult_in_lab']; ?>
						   	<select id="consult" class="form-control" name="consult" required>
						       	<option selected value="">Choose...</option>
					        	<option value="1" <?php if($options=="1") echo 'selected="selected"'; ?>>Yes</option>
					        	<option value="0" <?php if($options=="0") echo 'selected="selected"'; ?>>No</option>
					      	</select>
						</div>
						<div class="col-3">
							<label for="slot">Daily Slot:</label>
							<input type="text" autocomplete="off" value="<?=$doctor['slot']; ?>" id="slot" class="form-control" placeholder="Slot Per Day" name="slot">
						</div>

					</div>
					<div class="row mt-3">
						<div class="col">
							<label for="email">Email:</label>
							<input value="<?=$doctor['email']; ?>" type="email" id="email" class="form-control" placeholder="Email (If have)" name="email">
						</div>
						<div class="col">
							<label for="mobile">Mobile:</label>
							<input value="<?=$doctor['mobile']; ?>" type="text" id="mobile" class="form-control" placeholder="Mobile" name="mobile" required>
						</div>
						<div class="col">
							<label for="mobile2">Alternate Mobile No:</label>
							<input value="<?=$doctor['mobile2']; ?>" type="text" id="mobile2" class="form-control" placeholder="Alternate Mobile No" name="mobile2">
						</div>
					</div>
					<div class="row mt-3">
						<div class="col">
				    		<label for="gender">Gender</label>
				    		<?php $options = $doctor['gender']; ?>
						   	<select id="gender" class="form-control" name="gender" required>
						       	<option selected value="">Choose...</option>
					        	<option value="male" <?php if($options=="male") echo 'selected="selected"'; ?>>Male</option>
					        	<option value="female" <?php if($options=="female") echo 'selected="selected"'; ?>>Female</option>
					        	<option value="other" <?php if($options=="other") echo 'selected="selected"'; ?>>Other</option>
					      	</select>
				    	</div>
						<div class="col">
							<label for="doctorsid">Doctor's ID</label>
							<input value="<?=$doctor['doctorid']; ?>" aria-describedby="dpendingHelp" type="text" id="pending" class="form-control" placeholder="Pending Money" name="pending" disabled>
							<small id="dpendingHelp" class="form-text text-muted">Not Changeable</small>
						</div>
						<div class="col">
							<label for="commission">Commission Per test:</label>
							<input value="<?=$doctor['commission']; ?>" aria-describedby="commissionHelp" type="text" id="commission" class="form-control" placeholder="Commission (In %)" name="commission" required>
							<small id="commissionHelp" class="form-text text-muted">Write 0 if don't have any</small>
						</div>
						<div class="col">
							<label for="chambername">Doctors's Chamber Name:</label>
							<input value="<?=$doctor['chambername']; ?>" type="text" id="chambername" class="form-control" placeholder="Chamber Name (Not required)" name="chambername">
						</div>
					</div>
					<div class="row mt-5">
						<div class="col">
							<label for="assistantname">Assistant Name:</label>
							<input value="<?=$doctor['assistantname']; ?>" aria-describedby="anameHelp" type="text" id="assistantname" class="form-control" placeholder="Name of Assistant" name="assistantname">
							<small id="anameHelp" class="form-text text-muted">If have any.</small>
						</div>
						<div class="col">
							<label for="assistantmobile">Assistant Mobile No:</label>
							<input value="<?=$doctor['assistantmobile']; ?>" aria-describedby="amobileHelp" type="text" id="assistantmobile" class="form-control" placeholder="Mobile No of Assistant" name="assistantmobile">
							<small id="amobileHelp" class="form-text text-muted">If have any.</small>
						</div>
						<div class="col">
							<label for="paid">Money Paid:</label>
							<input value="<?=$doctor['paid']; ?>" aria-describedby="paidHelp" type="text" id="paid" class="form-control" placeholder="Paid Money" name="paid" readonly>
							
						</div>
						<div class="col">
							<label for="pending">Money Pending:</label>
							<input value="<?=$doctor['pending']; ?>" aria-describedby="pendingHelp" type="text" id="pending" class="form-control" placeholder="Pending Money" name="pending" readonly>
							
						</div>

					</div>

					<div class="row mt-5">
						<div class="col">
							<label for="degree">Degree : </label>
							<textarea type="text" style="height: 10rem;" id="degree" class="form-control" placeholder="Doctor's Degree" name="degree"><?=$doctor['degree']; ?></textarea>  
						</div>
						<div class="col">
							<label for="address">Address : </label>
							<textarea type="text" style="height: 10rem;" id="address" class="form-control" placeholder="Doctor's Address" name="address"><?=$doctor['address']; ?></textarea>  
						</div>
					</div>

					<input type="hidden" name="id" value="<?php echo $doctor['id']; ?>">

					<?php endforeach; ?>
					<div class="row mt-3">
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<button class="btn btn-outline-primary mt-3 btn-block mb-5 mt-5" type="submit">Update Information</button>
						</div>
						<div class="col-md-4"></div>
					</div>
				</form>

			</div>
		</div>
	</div>




























        </div>
    </div>
</div>