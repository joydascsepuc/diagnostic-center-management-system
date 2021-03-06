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
		<div class="row mb-2">
			<div class="col">
				<p class="text-danger font-weight-bold">All Doctors</p>
			</div>
			
			<div class="col">
				<a href="<?php echo base_url(); ?>doctorsection/load_add_doctor" class="text-primary font-weight-bold btn float-right">Add Doctor</a>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col table table-responsive text-center pl-0 pr-0 table-striped">
					<table class="table" id="datatable">
					  <thead>
					    <tr>
					      <th scope="col">Name</th>					      
					      <th scope="col">Mobile</th>
					      <th scope="col">Gender</th>				      				      
					      <th scope="col">Doctor's ID</th>
					      <th scope="col">Commission</th>         
					      <th>Actions :</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php foreach ($doctors as $doctor): ?>
						    <tr>
						      <td><a href="<?php echo base_url(); ?>doctorsection/view_doctor_details/<?php echo $doctor['id'];?>"><?php echo $doctor['name']; ?></a></td>						      
						      <td><?php echo $doctor['mobile']; ?></td>
						      <td><?php echo $doctor['gender']; ?></td>
						      <td><?php echo $doctor['doctorid']; ?></td>						    
						      <td><?php echo $doctor['commission'].'%'; ?></td>


						      <td>
						      	<a class="text-secondary font-weight-bold" href="<?php echo base_url(); ?>doctorsection/edit_doctor/<?php echo $doctor['id']; ?>"><i class="far fa-edit"></i></a> |
					      		<a class="text-danger font-weight-bold" href="#"><i class="far fa-trash-alt"></i></a>
					      	  </td>
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
