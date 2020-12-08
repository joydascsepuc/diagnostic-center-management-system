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
	<h5 class="text-danger font-weight-bold mt-4 mb-3">Information about test :</h5>
	<?php foreach($tests['basic'] as $test): ?>
		<?php
			$a = $test['is_active'];
			if($a == '1'){
				$status = "Test is Available";
			}else{
				$status = "Test is not Available";
			}

		?>
	<div>
		<table class="table table-striped table-light">
		 <tbody>
		 	<!-- <tr>
		 		<td colspan="2"><span class="text-danger font-weight-bold">All Information :</span></td>
		 	</tr> -->
		 	<tr>
		 		<th>Name</th>
		 		<td><?php echo $test['name']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Description</th>
		 		<td><?php echo $test['description']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Test Cost us</th>
		 		<td><?php echo $test['cost']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Price for Customers</th>
		 		<td><?php echo $test['price']; ?></td>
		 	</tr>
		 	<tr>
		 		<th>Available Status</th>
		 		<td><?php echo $status?></td>
		 	</tr>
		 	<tr>
		 		<th>Generally Take</th>
		 		<td><?php echo $test['duration'].'Day(s)'; ?></td>
		 	</tr>
		 </tbody>
		</table>
	</div>

	<?php endforeach; ?>

	<p class="text-danger font-weight-bold mt-4">Units :</p>
	<table class="table">
		<thead>
			<tr>
				<th>Unit Name</th>
				<th>Measure In</th>
				<th>Base Measure</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($tests['units'] as $unit): ?>	
			<tr>
				<td><?=$unit['unit_name'];?></td>
				<td><?=$unit['measure_id'];?></td>
				<td><?=$unit['base_value'];?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	

	










            
        </div>
    </div>
</div>