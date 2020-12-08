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
   
	 <?php echo form_open('users/update'); ?>
    <div id="box">
	    <?php foreach($users as $user):?>
	    	<div class="row">
	    		<div class="col">
	    			<div class="form-group">
				    <label for="name">Name</label>
				    <input type="text" class="form-control" id="name" placeholder="Give name" name="name" value="<?=$user['name'];?>" autofocus required>
				  </div>
	    		</div>

	    		<div class="col">
	    			<div class="form-group">
				    <label for="mobile">Mobile</label>
				    <input type="mobile" class="form-control" id="mobile" placeholder="Give number" name="mobile" value="<?php echo $user['mobile']; ?>" required>
				  </div>
	    		</div>
	    	</div>
		  
	    	<div class="row">
	    		<div class="col">
	    			<label for="gender">Gender</label>
	    			<?php $options = $user['gender']; ?>
				   	<select id="gender" class="form-control" name="gender" required>
				       	<option selected value="">Choose...</option>
			        	<option value="male" <?php if($options=="male") echo 'selected="selected"'; ?>>Male</option>
			        	<option value="female" <?php if($options=="female") echo 'selected="selected"'; ?>>Female</option>
			        	<option value="other" <?php if($options=="other") echo 'selected="selected"'; ?>>Other</option>
			      	</select>
	    		</div>

	    		<div class="col">
	    			<div class="form-group">
				    <label for="email">Email</label>
				    <input type="email" class="form-control" id="email" placeholder="Give Email address" name="email" value="<?php echo $user['email']; ?>">
				  </div>
	    		</div>

	    		<div class="col">
	    			<label for="admintype">User Type :</label>
	    			<?php $options = $user['admintype']; ?>
				   	<select id="admintype" class="form-control" name="admintype" required>
				       	<option selected value="">Choose...</option>
			        	<option value="admin" <?php if($options=="admin") echo 'selected="selected"'; ?>>Admin</option>
			        	<option value="doctor" <?php if($options=="doctor") echo 'selected="selected"'; ?>>Doctor</option>
			        	<option value="nurse" <?php if($options=="nurse") echo 'selected="selected"'; ?>>Nurse</option>
			      	</select>
	    		</div>
	    	</div>

		  <div class="form-group">
		    <label for="address">Address</label>
		    <textarea style="height: 10rem;" type="address" class="form-control" id="address" placeholder="Give Address" name="address"><?php echo $user['address']; ?></textarea>
		  </div>

		  <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

		<?php endforeach;?>
			<div class="row">
				<div class="col"></div>
				<div class="col">
					<button type="submit" class="btn btn-outline-secondary btn-block">Update</button>
				</div>
				<div class="col"></div>
			</div>
	  </div>
	</form>








        </div>
    </div>
</div>