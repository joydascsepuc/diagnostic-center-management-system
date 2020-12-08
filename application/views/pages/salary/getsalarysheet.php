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
		<?php echo form_open_multipart('salary/getSalarySheet');?>
		<div class="row text-center">
			<div class="col-5">
				<label for="month">Month</label>
              	<select id="month" class="form-control" name="month" required>
                	<option selected value="">Choose...</option>
                	<option value="1">January</option>
                	<option value="2">February</option>
                	<option value="3">March</option>
	                <option value="4">April</option>
	                <option value="5">May</option>
	                <option value="6">June</option>
	                <option value="7">July</option>
	                <option value="8">August</option>
	                <option value="9">September</option>
	                <option value="10">October</option>
	                <option value="11">November</option>
	                <option value="12">December</option>
              	</select>
			</div>
			<div class="col-5">
				<label for="year">Year</label>
	            <select id="year" class="form-control" name="year" required>
	              	<option selected value="">Choose...</option>
	              	<option value="2019">2019</option>
	              	<option value="2020">2020</option>
	              	<option value="2021">2021</option>
	            </select>
			</div>
			<div class="col-2">
				<button class="btn btn-outline-primary btn-block" type="submit" style="margin-top: 31px;">Get Another</button>
			</div>
		</div>
		</form>




		<p class="font-weight-bold mt-5">Salary Sheet</p>
		<div class="row">
			<div class="col-md-12 text-center">
				<table class="table" id="datatable">
				  <thead>
				    <tr>
				      <th scope="col">Name</th>
				      <th scope="col">Position</th>
				      <th scope="col">Salary</th>
				      <th scope="col">Amount Got</th>
				      <th scope="col">Month</th>
				      <th scope="col">Year</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php foreach ($empsalaries as $empsalary): ?>
					    <tr>
					      <td><?php echo $empsalary['name']; ?></td>
					      <td><?php echo $empsalary['position']; ?></td>
					      <td><?php echo $empsalary['salary']; ?></td>
					      <td><?php echo $empsalary['amount']; ?></td>
					      <td><?php echo $empsalary['month']; ?></td>
					      <td><?php echo $empsalary['year']; ?></td>						      
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