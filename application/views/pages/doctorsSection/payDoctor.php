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

	<p class="text-danger font-weight-bold mt-4 mb-3">Pay Doctor:</p>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">

				<?php foreach($doctors as $doctor) :?>

					<div class="row">
						<div class="col">
							Name: <?=$doctor['name'];?><br>
							Email: <?=$doctor['email']; ?><br>
							Mobile: <?=$doctor['mobile']; ?><br>
							Alternate Mobile No: <?=$doctor['mobile2']; ?><br>
							Last Pay Amount: <?=$doctor['last_pay_amount']; ?><br>
						</div>
						<div class="col">

							Gender : <?=$doctor['gender']; ?><br>
							Doctor's ID : <?=$doctor['doctorid']; ?><br>
							Commission Per test: <?=$doctor['commission']; ?><br>
							Doctors's Chamber Name: <?=$doctor['chambername']; ?><br>
							
							<!-- Assistant Name: <?=$doctor['assistantname']; ?><br>
							Assistant Mobile No: <?=$doctor['assistantmobile']; ?><br>
							Money Paid: <?=$doctor['paid']; ?><br>
							Money Pending: <?=$doctor['pending']; ?><br>
							Degree : <?=$doctor['degree']; ?><br>
							Address : <?=$doctor['address']; ?><br> -->
						</div>
					</div>
					
					<?php echo form_open_multipart('doctorsection/payDoctor');?>

					<div class="row mt-5">
						<div class="col">
							<label for="paid">Total Paid</label>
							<input type="text" name="paid" class="form-control" value="<?=$doctor['paid'];?>" readonly>
						</div>
						<div class="col">
							<label for="pending">Pending</label>
							<input type="text" name="pending" class="form-control" value="<?=$doctor['pending'];?>" readonly>
						</div>
						<div class="col">
							<label for="payNow">Now Pay</label>
							<input type="text" name="payNow" class="form-control" value="" required>
						</div>
					</div>
					<div class="row mt-5">
						<div class="col-4"></div>
						<div class="col-4">
							<button class="btn btn-outline-danger btn-block" type="submit">-- Pay Now --</button>
						</div>
						<div class="col-4"></div>
					</div>
					<input type="hidden" name="docUniqueId" value="<?php echo $doctor['doctorid']; ?>">
					<input type="hidden" name="id" value="<?php echo $doctor['id']; ?>">

				<?php endforeach; ?>
						
				</form>

			</div>
		</div>
	</div>




























        </div>
    </div>
</div>