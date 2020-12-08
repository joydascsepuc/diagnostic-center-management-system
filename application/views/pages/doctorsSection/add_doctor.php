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

	<p class="text-danger font-weight-bold mt-4 mb-3">Add Doctor</p>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">

				<?php echo form_open_multipart('doctorsection/add_doctor');?>
					<div class="row">
						<div class="col-6">
							<label for="name">Name:</label>
						    <input type="text" autocomplete="off" value="Dr. " id="name" class="form-control" placeholder="Name" name="name" required autofocus>
						</div>
						<div class="col-3">
							<label for="consult">Consult in Lab:</label>
						   	<select id="consult" class="form-control" name="consult" required>
						       	<option selected value="">Choose...</option>
					        	<option value="1">Yes</option>
					        	<option value="0" selected>No</option>
					      	</select>
						</div>
						<div class="col-3">
							<label for="slot">Daily Slot:</label>
							<input type="text" autocomplete="off" value="0" id="slot" class="form-control" placeholder="Slot Per Day" name="slot">
						</div>
					</div>
					<div class="row mt-3">
						<div class="col">
							<label for="email">Email:</label>
							<input type="email" autocomplete="off" id="email" class="form-control" placeholder="Email (If have)" name="email">
						</div>
						<div class="col">
							<label for="mobile">Mobile:</label>
							<input type="text" autocomplete="off" id="mobile" class="form-control" placeholder="Mobile" name="mobile" required>
						</div>
						<div class="col">
							<label for="mobile2">Alternate Mobile No:</label>
							<input type="text" autocomplete="off" id="mobile2" class="form-control" placeholder="Alternate Mobile No" name="mobile2">
						</div>
					</div>
					<div class="row mt-3">
						<div class="col">
							<label for="gender">Gender:</label>
						   	<select id="gender" class="form-control" name="gender" required>
						       	<option selected value="">Choose...</option>
					        	<option value="male">Male</option>
					        	<option value="female">Female</option>
					        	<option value="other">Other</option>
					      	</select>
						</div>
						<div class="col">
							<label for="commission">Commission Percentage (%) Per test:</label>
							<input  aria-describedby="commissionHelp" autocomplete="off" value="0" type="text" id="commission" class="form-control" placeholder="Commission (In %)" name="commission" required>
							<small id="commissionHelp" class="form-text text-muted">Write 0 if don't have any</small>
						</div>
						<div class="col">
							<label for="chambername">Doctors's Chamber Name:</label>
							<input type="text" autocomplete="off" id="chambername" class="form-control" placeholder="Chamber Name (Not required)" name="chambername">
						</div>
					</div>
					<div class="row mt-5">
						<div class="col">
							<label for="assistantname">Assistant Name:</label>
							<input aria-describedby="anameHelp" type="text" id="assistantname" class="form-control" placeholder="Name of Assistant" autocomplete="off" name="assistantname">
							<small id="anameHelp" class="form-text text-muted">If have any.</small>
						</div>
						<div class="col">
							<label for="assistantmobile">Assistant Mobile No:</label>
							<input aria-describedby="amobileHelp" autocomplete="off" type="text" id="assistantmobile" class="form-control" placeholder="Mobile No of Assistant" name="assistantmobile">
							<small id="amobileHelp" class="form-text text-muted">If have any.</small>
						</div>
						<div class="col">
							<label for="paid">Money Paid:</label>
							<input aria-describedby="paidHelp" type="text" id="paid" class="form-control" placeholder="Paid Money" value="0" name="paid" autocomplete="off">
							<small id="paidHelp" class="form-text text-muted">Write 0 if don't have any.</small>
						</div>
						<div class="col">
							<label for="pending">Money Pending:</label>
							<input aria-describedby="pendingHelp" type="text" id="pending" class="form-control" value="0" placeholder="Pending Money" name="pending" autocomplete="off">
							<small id="pendingHelp" class="form-text text-muted">Write 0 if don't have any.</small>
						</div>
					</div>

					<div class="row mt-5">
						<div class="col">
							<label for="degree">Degree : </label>
							<textarea type="text" style="height: 10rem;" id="degree" class="form-control" placeholder="Doctor's Degree" autocomplete="off" name="degree"></textarea>  
						</div>
						<div class="col">
							<label for="address">Address : </label>
							<textarea type="text" style="height: 10rem;" id="address" class="form-control" placeholder="Doctor's Address" autocomplete="off" name="address"></textarea>  
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<button class="btn btn-outline-primary mt-3 btn-block mb-5 mt-5" type="submit">Add Doctor</button>
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