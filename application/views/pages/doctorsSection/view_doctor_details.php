<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="col-md-10">
            
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

	<!-- Main Part -->
	<h5 class="text-danger font-weight-bold mt-4 mb-3">All Information :</h5>
	<?php foreach($doctors as $doctor): ?>
	<div>
		<table class="table table-striped table-light text-center">
		 <tbody>
		 	<!-- <tr>
		 		<td colspan="2"><span class="text-danger font-weight-bold">All Information :</span></td>
		 	</tr> -->
		 	<tr>
		 		<th>Name</th>
		 		<td><?php echo $doctor['name']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Consult In Lab</th>
		 		<?php 
		 			$check = $doctor['consult_in_lab'];
		 			if($check==1){
		 				$value = "Yes";
		 			}else{
		 				$value = "No";
		 			}
		 		?>
		 		<td><?php echo $value; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Slot Per Day</th>
		 		<td><?php echo $doctor['slot']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Email</th>
		 		<td><?php echo $doctor['email']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Mobile No</th>
		 		<td><?php echo $doctor['mobile']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Alternate Mobile No</th>
		 		<td><?php echo $doctor['mobile2']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Assistant Name</th>
		 		<td><?php echo $doctor['assistantname']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Assistant Mobile No</th>
		 		<td><?php echo $doctor['assistantmobile']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Gender</th>
		 		<td><?php echo $doctor['gender']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Doctor's ID</th>
		 		<td><?php echo $doctor['doctorid']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Commission (In%)</th>
		 		<td><?php echo $doctor['commission']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Degree</th>
		 		<td><?php echo $doctor['degree']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Chamber Name :</th>
		 		<td><?php echo $doctor['chambername']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Paid</th>
		 		<td><?php echo $doctor['paid']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Pending</th>
		 		<td><?php echo $doctor['pending']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Last Pay Amount</th>
		 		<td><?php echo $doctor['last_pay_amount']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Address</th>
		 		<td><?php echo $doctor['address']; ?></td>
		 	</tr>
		 </tbody>
		</table>
	</div>

<?php endforeach; ?>











            
        </div>
    </div>
</div>