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
				<p class="text-danger font-weight-bold">Salary Entry Sheet</p>
			</div>
			<div class="col">
				<a href="<?php echo base_url(); ?>salary/loadchecksalary" class="text-primary font-weight-bold btn float-right">Check Salary</a>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col table table-responsive pl-0 pr-0 table-bordered">
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">Name</th>					      
				      <th scope="col">Position</th>
				      <th scope="col">Emp ID</th>
				      <th scope="col">Salary</th>
				      <th scope="col">Pay</th>
				      <th scope="col">Amount</th>						      				           
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $rownumbers = 0; ?>
				  	<?php echo form_open_multipart('salary/addsalary');?>
				  	<?php foreach ($employees as $employee): ?>
					    <tr>
					      <td><input type="text" name="name[<?=$rownumbers?>]" value="<?php echo $employee['name'];?>" readonly class = "form-control"></td>					      
					      <td><input type="text" name="position[<?=$rownumbers?>]" value="<?php echo $employee['position']; ?>" readonly class = "form-control"></td>
					      <td><input type="text" name="employeeid[<?=$rownumbers?>]" value="<?php echo $employee['employeeid']; ?>" readonly class = "form-control"></td>
					      <input type="hidden" name="mobile[<?=$rownumbers?>]" value="<?php echo $employee['mobile']; ?>" readonly class = "form-control">
					      <td><input type="text" name="salary[<?=$rownumbers?>]" value="<?php echo $employee['salary']; ?>" readonly class = "form-control"></td>
					      <td>
					      	<select class="form-control" name="paidstatus[<?=$rownumbers?>]" required>
				              <option selected value="">Choose...</option>
				              <option value="full">Full Paid</option>
				              <option value="half">Half Paid</option>
				              <option value="not">Not Paid</option>
				        	</select>
					      </td>
					      <td><input type="text" name="amount[<?=$rownumbers?>]" class="form-control" placeholder="Money" required></td>
					    </tr>
					<?php $rownumbers++; ?>	    
				    <?php endforeach; ?>
				    <td colspan="2">
				    	<select class="form-control" name="month" required>
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
				    </td>
				    <?php $first = date("Y"); ?>
				    <?php date("m"); ?>
				    <td colspan="1">
				    	<select id="year" class="form-control" name="year" required>
				          <option selected value="">Choose...</option>
				          <option value="<?=$first;?>"><?=$first;?></option>
				          <option value="<?=$first+1;?>"><?=$first+1;?></option>
				          <option value="<?=$first+2;?>"><?=$first+2;?></option>
				        </select>
				    </td>
				    <input type="hidden" name="rownumbers" value="<?=$rownumbers;?>">
				    <td colspan="3">
				    	<button type="submit" <?php if($check == "Already There") echo "disabled" ?> class="btn btn-outline-danger btn-block" onclick="return confirm('Are you sure? You cannot change this for this month once you submitted.');"><i class="fas fa-money-check-alt"></i>&nbsp;&nbsp;Submit Sheet</button>
				    </td>
				    </form>				    
				  </tbody>
				</table>
			</div>
		</div>
	</div>










        </div>
    </div>
</div>