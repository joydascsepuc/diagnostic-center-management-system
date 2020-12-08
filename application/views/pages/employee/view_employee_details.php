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
	<?php foreach($employees as $employee): ?>
	<div>
		<table class="table table-striped table-light text-center">
		 <tbody>
		 	<!-- <tr>
		 		<td colspan="2"><span class="text-danger font-weight-bold">All Information :</span></td>
		 	</tr> -->
		 	<tr>
		 		<th>Name</th>
		 		<td><?php echo $employee['name']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Email</th>
		 		<td><?php echo $employee['email']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Mobile</th>
		 		<td><?php echo $employee['mobile']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Gender</th>
		 		<td><?php echo $employee['gender']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Position</th>
		 		<td><?php echo $employee['position']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Salary</th>
		 		<td><?php echo $employee['salary']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Employee ID</th>
		 		<td><?php echo $employee['employeeid']; ?></td>
		 	</tr>
		 	<!-- <tr>
		 		<th>Commission (In%)</th>
		 		<td><?php echo $employee['commission']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Paid</th>
		 		<td><?php echo $employee['paid']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Pending</th>
		 		<td><?php echo $employee['pending']; ?></td>
		 	</tr> -->
		 	<tr>
		 		<th>Address</th>
		 		<td><?php echo $employee['address']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Active Status</th>
		 		<td><?php echo $employee['is_active']; ?></td>
		 	</tr>
		 </tbody>
		</table>
	</div>

<?php endforeach; ?>











            
        </div>
    </div>
</div>