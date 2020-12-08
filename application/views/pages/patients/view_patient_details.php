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
	<?php foreach($patients as $patient): ?>
	<div>
		<table class="table table-striped table-light text-center">
		 <tbody>
		 	<tr>
		 		<td colspan="2"><span class="text-danger font-weight-bold">Basic Information</span></td>
		 	</tr>
		 	<!-- <tr>
		 		<th></th>
		 		<td></td>
		 	</tr> -->
		 	<tr>
		 		<th>Name</th>
		 		<td><?php echo $patient['name']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Age</th>
		 		<td><?php echo $patient['age']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Gender</th>
		 		<td><?php echo $patient['gender']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Blood Group</th>
		 		<td><?php echo $patient['blood_group']; ?></td>
		 	</tr>
		 	<!-- <tr>
		 		<th>Reference Doctor's Name</th>
		 		<td><?php echo $patient['reference']; ?></td>
		 	</tr> -->
		 	<tr>
		 		<th>Patient ID</th>
		 		<td><?php echo $patient['patientid']; ?></td>
		 	</tr>
		 	<tr>
		 		<th></th>
		 		<td></td>
		 	</tr>
		 	<tr>
		 		<td colspan="2"><span class="text-danger font-weight-bold">Additional Information</span></td>
		 	</tr>
		 	<!-- <tr>
		 		<th></th>
		 		<td></td>
		 	</tr> -->
		 	<tr>
		 		<th>Guardian Name</th>
		 		<td><?php echo $patient['emer_name']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Mobile</th>
		 		<td><?php echo $patient['mobile']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Email</th>
		 		<td><?php echo $patient['email']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Maritial Status</th>
		 		<td><?php echo $patient['maritial_status']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Religion</th>
		 		<td><?php echo $patient['religion']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Nationality</th>
		 		<td><?php echo $patient['nationality']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Address</th>
		 		<td><?php echo $patient['address']; ?></td>
		 	</tr>
		 	<tr>
		 		<th></th>
		 		<td></td>
		 	</tr>
		 	<tr>
		 		<td colspan="2"><span class="text-danger font-weight-bold">Emergency Contact Details</span></td>
		 	</tr>
		 	<!-- <tr>
		 		<th></th>
		 		<td></td>
		 	</tr> -->
		 	<tr>
		 		<th>Emergency Guardian Name</th>
		 		<td><?php echo $patient['emer_name']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Relation with Patient</th>
		 		<td><?php echo $patient['emer_relation']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Emergency Contact No</th>
		 		<td><?php echo $patient['emer_mobile_one']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Alternate Contact No</th>
		 		<td><?php echo $patient['emer_mobile_two']; ?></td>
		 	</tr>
		 </tbody>
		</table>
	</div>

<?php endforeach; ?>























            
        </div>
    </div>
</div>