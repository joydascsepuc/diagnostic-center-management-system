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
				<p class="text-danger font-weight-bold">View All Employee</p>
			</div>
			<div class="col">
				<a href="<?php echo base_url(); ?>employees/load_add_employee" class="text-primary font-weight-bold btn float-right">Add Employee</a>
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
					      <th scope="col">Position</th>
					      <th scope="col">Employee ID</th>							      				      
					      <th scope="col">Current Status</th>         
					      <th>Actions :</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php foreach ($employees as $employee): ?>
						    <tr>
						      <td><a href="<?php echo base_url(); ?>employees/view_employee_details/<?php echo $employee['id'];?>"><?php echo $employee['name']; ?></a></td>						      
						      <td><?php echo $employee['mobile']; ?></td>
						      <td><?php echo $employee['gender']; ?></td>
						      <td><?php echo $employee['position']; ?></td>
						      <td><?php echo $employee['employeeid']; ?></td>							    
						      <td><?php echo $employee['is_active']; ?></td>


						      <td>
						      	<a class="text-secondary font-weight-bold" href="<?php echo base_url(); ?>employees/edit_employee/<?php echo $employee['id']; ?>"><i class="far fa-edit"></i></a> |
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