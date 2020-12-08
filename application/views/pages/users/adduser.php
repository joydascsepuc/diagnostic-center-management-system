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
			<div class="col-md-12">
				<p>Add user form</p>
				<div class="pr-2">
					
					<?php echo form_open_multipart('users/adduser');?>
					
					  <div class="row">
					    	<div class="col">
					    		<label for="name">Name:</label>
					      		<input type="text" id="name" class="form-control" placeholder="Name" name="name" required autofocus>
					    	</div>
					    	<div class="col">
					    		<label for="email">Email : </label>
					  			<input type="text" id="email" class="form-control" placeholder="email" name="email">
					  			<span id="email_result"></span>
					    	</div>
					    	
					  </div>

					  <div class="row">

					  		<div class="col">
					    		<label for="username">User Name : </label>
					  			<input type="text" id="username" class="form-control" placeholder="username" name="username" required>
					  			<span id="username_result"></span> 
					    	</div>
					    	
					    	<div class="col">
					    		<label for="gender">Gender</label>
							   	<select id="gender" class="form-control" name="gender" required>
							       	<option selected value="">Choose...</option>
						        	<option value="male">Male</option>
						        	<option value="female">Female</option>
						        	<option value="other">Other</option>
						      	</select>
					    	</div>		   	
					  </div>

					  <div class="row">
					  	<div class="col">
					  		<label for="password">Password:</label>
					      	<input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
					  	</div>

					  	<div class="col">
					  		<label for="admintype">User Type :</label>
						   	<select id="admintype" class="form-control" name="admintype" required>
						       	<option selected value="">Choose...</option>
					        	<option value="admin">Admin</option>
					        	<option value="doctor">Doctor</option>
					        	<option value="nurse">Nurse</option>
					      	</select>
					  	</div>

					  	<div class="col">
					  		<label for="mobile">Mobile:</label>
					      	<input type="text" id="mobile" class="form-control" placeholder="Mobile No" name="mobile" required>
					  	</div>
					  </div>

					  <label for="address">Address:</label>
					  <textarea id="address" name="address" class="form-control" style="height: 10rem"></textarea>

					  <div class="row">
					  	<div class="col"></div>
					  	<div class="col">
					  		<button type="submit" class="btn btn-block btn-outline-primary" id="submit">Add User</button>
					  	</div>
					  	<div class="col"></div>
					  </div>
						
					</form>
				</div>
			</div>
		</div>
	</div> 














        </div>
    </div>
</div>



