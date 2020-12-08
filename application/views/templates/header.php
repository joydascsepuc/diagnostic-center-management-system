<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Medical Management System</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/fontawsome/css/all.css';?>">
	<!-- <link rel="stylesheet" href="<?php echo base_url().'assets/jquery/jquery-ui.css';?>">-->
	<link rel="stylesheet" href="<?php echo base_url().'assets/jquery/jquery.min.js';?>">
	
	<!-- <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet"> -->
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery.dataTables.min.css';?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/font.css';?>">
	
	
	<script src="<?php echo base_url().'assets/js/jquery-3.3.1.min.js'; ?>"></script>
	<script src="<?php echo base_url().'assets/js/popper.min.js'; ?>"></script>
	<!-- <script src="<?php echo base_url().'assets/js/main.js'; ?>"></script> -->
	<script src="<?php echo base_url().'assets/js/bootstrap.min.js'; ?>"></script>

	<script src="<?php echo base_url().'assets/jquery/external/jquery/jquery.js'; ?>"></script>
   <!--  <script src="<?php echo base_url().'assets/jquery/jquery-ui.js'; ?>"></script>  -->
	<script src="<?php echo base_url().'assets/jquery/time.js'; ?>"></script>
	<script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'; ?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/style.css';?>">
</head>
<body>


<?php if($this->session->flashdata('employee_added')): ?>
<?php echo '<p class="alert alert-success">'.$this->session->flashdata('employee_added');'</p>' ?>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<?php endif; ?>

<?php if($this->session->flashdata('employee_updated')): ?>
<?php echo '<p class="alert alert-success">'.$this->session->flashdata('employee_updated');'</p>' ?>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<?php endif; ?>

<?php if($this->session->flashdata('doctor_added')): ?>
<?php echo '<p class="alert alert-success">'.$this->session->flashdata('doctor_added');'</p>' ?>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<?php endif; ?>

<?php if($this->session->flashdata('doctor_not_added')): ?>
<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('doctor_not_added');'</p>' ?>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<?php endif; ?>

<?php if($this->session->flashdata('doctor_updated')): ?>
<?php echo '<p class="alert alert-success">'.$this->session->flashdata('doctor_updated');'</p>' ?>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<?php endif; ?>

<?php if($this->session->flashdata('employee_not_updated')): ?>
<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('employee_not_updated');'</p>' ?>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<?php endif; ?>

<?php if($this->session->flashdata('validation_error')): ?>
<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('validation_error');'</p>' ?>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<?php endif; ?>

<?php if($this->session->flashdata('patient_updated')): ?>
<?php echo '<p class="alert alert-success">'.$this->session->flashdata('patient_updated');'</p>' ?>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<?php endif; ?>

<?php if($this->session->flashdata('patient_not_updated')): ?>
<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('patient_not_updated');'</p>' ?>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<?php endif; ?>

<?php if($this->session->flashdata('test_added')): ?>
<?php echo '<p class="alert alert-success">'.$this->session->flashdata('test_added');'</p>' ?>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<?php endif; ?>

<?php if($this->session->flashdata('test_not_added')): ?>
<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('test_not_added');'</p>' ?>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<?php endif; ?>

<?php if($this->session->flashdata('test_updated')): ?>
<?php echo '<p class="alert alert-success">'.$this->session->flashdata('test_updated');'</p>' ?>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<?php endif; ?>

<?php if($this->session->flashdata('test_not_updated')): ?>
<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('test_not_updated');'</p>' ?>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<?php endif; ?>

<?php if($this->session->flashdata('test_patient_added')): ?>
<?php echo '<p class="alert alert-success">'.$this->session->flashdata('test_patient_added');'</p>' ?>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<?php endif; ?>

<?php if($this->session->flashdata('test_patient_not_added')): ?>
<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('test_patient_not_added');'</p>' ?>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<?php endif; ?>

<?php if($this->session->flashdata('doctor_commission_given')): ?>
<?php echo '<p class="alert alert-success">'.$this->session->flashdata('doctor_commission_given');'</p>' ?>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<?php endif; ?>

<?php if($this->session->flashdata('appointment_added')): ?>
<?php echo '<p class="alert alert-success">'.$this->session->flashdata('appointment_added');'</p>' ?>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<?php endif; ?>

<?php if($this->session->flashdata('appointment_not_added')): ?>
<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('appointment_not_added');'</p>' ?>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<?php endif; ?>

<?php if($this->session->flashdata('units_updated')): ?>
<?php echo '<p class="alert alert-success">'.$this->session->flashdata('units_updated');'</p>' ?>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<?php endif; ?>

<?php if($this->session->flashdata('units_not_updated')): ?>
<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('units_not_updated');'</p>' ?>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<?php endif; ?>

<?php if($this->session->flashdata('unit_added')): ?>
<?php echo '<p class="alert alert-success">'.$this->session->flashdata('unit_added');'</p>' ?>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<?php endif; ?>

<?php if($this->session->flashdata('unit_not_added')): ?>
<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('unit_not_added');'</p>' ?>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<?php endif; ?>

<?php if($this->session->flashdata('unit_deleted')): ?>
<?php echo '<p class="alert alert-success">'.$this->session->flashdata('unit_deleted');'</p>' ?>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<?php endif; ?>

<?php if($this->session->flashdata('unit_not_deleted')): ?>
<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('unit_not_deleted');'</p>' ?>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<?php endif; ?>

<?php if($this->session->flashdata('test_data_added')): ?>
<?php echo '<p class="alert alert-success">'.$this->session->flashdata('test_data_added');'</p>' ?>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<?php endif; ?>

<?php if($this->session->flashdata('test_data_not_added')): ?>
<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('test_data_not_added');'</p>' ?>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<?php endif; ?>



