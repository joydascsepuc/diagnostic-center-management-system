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



	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<p class="text-danger font-weight-bold">View All Doctors</p>
			</div>
			<div class="col">
				
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-10 table table-responsive table-striped">
					<table class="table" class="">
					  <thead>
					    <tr>
					      <th scope="col">Name</th>
					      <th scope="col">Email</th>
					      <th scope="col">Mobile</th>
					      <th scope="col">Gender</th>				  
					    </tr>
					  </thead>
					  <tbody>
					  	<?php foreach ($doctors as $doctor): ?>
						    <tr>
						      <td><?php echo $doctor['name']; ?></td>
						      <td><?php echo $doctor['email']; ?></td>
						      <td><?php echo $doctor['mobile']; ?></td>
						      <td><?php echo $doctor['gender']; ?></td>		      
						    </tr>
					    <?php endforeach; ?>
					  </tbody>
					</table>

				
			</div>	
		</div>
	</div>



        </div>
    </div>
</div>