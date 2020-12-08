<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container-fluid" id="mainindex">
	<div class="row" style="height: 100vh;">
		<div class="col-md-4"></div>
		<div class="col-md-4 login">
			<?php echo form_open('logins/login');?>
			  
			  <div class="design">
			  	<div class="form-group">
			    <label for="username" class="headings">User Name: </label>
			    <input type="text" class="form-control inputs loginInputs" id="username" placeholder="Username" name="username" required autofocus >
			  </div>

			  <div class="form-group">
			    <label for="password" class="headings">Password</label>
			    <input type="password" aria-describedby="userHelp" class="form-control inputs loginInputs" id="password" placeholder="Password" name="password" required> 
			  	<small id="userHelp" class="form-text text-muted font-weight-bold">Never share your username & Password with anyone else!</small> 
			  </div>
			  <div class="row">
			  	<div class="col"></div>
			  	<div class="col">
			  		<button type="submit" class="btn btn-block" id="loginbutton">Log In</button>
			  	</div>
			  	<div class="col"></div>
			  </div>

			 <?php echo $this->session->flashdata('wrong');?>
			  </div>

			</form>	
		</div>
		<div class="col-md-4"></div>
	</div>
</div>