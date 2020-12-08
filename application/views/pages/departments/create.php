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
            

	<div class="">
		<div class="row">
			<div class="col-md-12">
				<p>Add user form</p>
				<div class="pr-2">
					<?php echo form_open_multipart('departments/add_department');?>
					  <div class="row">
					    	<div class="col">
					    		<label for="title">Department Title:</label>
					      		<input type="text" id="title" class="form-control" placeholder="Department Title" name="title" required autofocus>
					    	</div>
					  </div>

					  <button class="btn btn-primary mt-3" type="submit">Add Department</button>
						
					</form>
				</div>
			</div> 
		</div>
	</div> 















        </div>
    </div>
</div>