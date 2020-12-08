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




	 <?php echo form_open('departments/update'); ?>
    <div id="box">
	    <?php foreach($departments as $department):?>
	    	<div class="row">
	    		<div class="col">
	    			<div class="form-group">
				    <label for="title">Department's Title</label>
				    <input type="text" class="form-control" id="title" placeholder="Give title" name="title" value="<?=$department['title'];?>"  autofocus required>
				  </div>
	    		</div>
	    	</div>
		  
	  
		  <input type="hidden" name="id" value="<?php echo $department['id']; ?>">

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