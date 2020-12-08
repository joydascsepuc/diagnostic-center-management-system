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
		<p class="text-danger font-weight-bold">This application Users</p>
		<div class="row">
			<div class="col-md-12 text-center">
					<table class="table" id="datatable">
					  <thead>
					    <tr>
					      <th scope="col">Name</th>
					      <th scope="col">Mobile</th>					      
					      <th scope="col">User-type</th>					     
					      <th>Actions</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php foreach ($users as $user): ?>
						    <tr>
						      <td><a href="<?php echo base_url(); ?>users/user_details/<?php echo $user['id']; ?>"><?php echo $user['name']; ?></a></td>
						      <td><?php echo $user['mobile']; ?></td>						      
						      <td><?php echo $user['admintype']; ?></td>						      
						      <td>
						      	<a class="text-secondary font-weight-bold" href="<?php echo base_url(); ?>users/edit/<?php echo $user['id']; ?>"><i class="far fa-edit"></i></a> | 
					      		<a class="text-danger font-weight-bold" href="#"><i class="far fa-trash-alt"></i></a>
					      	  </td>
						    </tr>
					    <?php endforeach; ?>
					  </tbody>
					</table>

				
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>












        </div>
    </div>
</div>