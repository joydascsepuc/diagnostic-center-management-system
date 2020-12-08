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
				<p class="text-danger font-weight-bold">Commission Payment History</p>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col table table-responsive text-center pl-0 pr-0 table-striped">
					<table class="table" id="datatable">
					  <thead>
					    <tr>
					      <th scope="col">Dr. Name</th>					      
					      <th scope="col">Doc ID</th>
					      <th scope="col">Amount</th>				      				      
					      <th scope="col">Pay By</th>
					      <th scope="col">Date</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php foreach ($history as $doctor): ?>
						    <tr>
						      <td><?php echo $doctor['doc_id']; ?></td>						      
						      <td><?php echo $doctor['doc_u_id']; ?></td>
						      <td><?php echo $doctor['amount']; ?></td>
						      <td><?php echo $doctor['by_user']; ?></td>						    
						      <td><?php echo $doctor['date']; ?></td>
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
