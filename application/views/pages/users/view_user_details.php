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
	<h5 class="text-danger font-weight-bold mt-4">Basic Information :</h5>
	<?php foreach($users as $user): ?>
	<div>
		<table class="table table-striped table-light text-center">
		 <tbody>
		 	<!-- <tr>
		 		<td colspan="2"><span class="text-danger font-weight-bold">Basic Information :</span></td>
		 	</tr> -->
		 	<!-- <tr>
		 		<th></th>
		 		<td></td>
		 	</tr> -->
		 	<tr>
		 		<th>Name</th>
		 		<td><?php echo $user['name']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Gender</th>
		 		<td><?php echo $user['gender']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Email</th>
		 		<td><?php echo $user['email']; ?></td>
		 	</tr>		 	
		 	<tr>
		 		<th>User Name</th>
		 		<td><?php echo $user['username']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>User Type</th>
		 		<td><?php echo $user['admintype']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Mobile</th>
		 		<td><?php echo $user['mobile']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Address</th>
		 		<td><?php echo $user['address']; ?></td>
		 	</tr>
		 	
		 	<tr>
		 		<th>Created at</th>
		 		<td><?php echo $user['created_at']; ?></td>
		 	</tr>
		 	
		 </tbody>
		</table>
	</div>

<?php endforeach; ?>







            
        </div>
    </div>
</div>