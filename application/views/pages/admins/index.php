<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 pr-0 mr-0 navbarsection">
            <div id="profile" class="ml-2 mt-3">
                <div>
                    <div class="p-1">
                        <img src="<?php echo base_url(); ?>/assets/img/JDPic1.jpg" style="height: 80px; width: 80px; border-radius: 50%;" alt="user-img">
                        <p class="text-primary font-weight-bold"><?php echo $this->session->userdata('name');?><br>Position: <?php echo $this->session->userdata('admintype');?></p>
                    </div>
                </div>
            </div> 

            <nav class="navbar text-left mt-5">
              <!-- Links -->
              <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>redirect/index">
                        <i class="fas fa-chart-pie"></i> Dashboard
                    </a>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <i class="fas fa-user-injured"></i> Employees &nbsp; &nbsp; <i class="fas fa-plus float-right"></i>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo base_url(); ?>employees/view_all_employee">View All</a>  
                                                     
                    <a class="dropdown-item" href="<?php echo base_url(); ?>employees/view_doctors_list">Doctors</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>employees/view_nurses_list">Nurses</a>
                  </div>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <i class="fas fa-stethoscope"></i> Doctors &nbsp; &nbsp;
                    <i class="fas fa-plus float-right float-right"></i>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo base_url(); ?>doctorsection/view_all_doctors">View All</a>  
                    <a class="dropdown-item" href="<?php echo base_url(); ?>doctorsection/duePayment">Due Payment</a>
                  </div>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <i class="fas fa-user-injured"></i> Paitents &nbsp; &nbsp;<i class="fas fa-plus float-right"></i>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo base_url(); ?>patients/load_addpatient">Add new</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>patients/viewpatient">View Patients List</a>
                    <a class="dropdown-item" href="#">Due payment</a>
                    <a class="dropdown-item" href="#">Add Extra Bill</a>
                  </div>
                </li>

                 <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <i class="fas fa-vial"></i></i> Tests &nbsp; &nbsp; <i class="fas fa-plus float-right"></i>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo base_url(); ?>tests/loadaddtestpatient">Add test for Paitent</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>tests/pendingReports">Pending Reports</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>tests/reportHistory">Report History</a>
                    <a class="dropdown-item" href=""></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>tests/loadaddtest">Add test</a>
                    <a class="dropdown-item" href="<?php echo base_url();?>tests/viewalltest">All tests</a>
                    <a class="dropdown-item" href="<?php echo base_url();?>tests/viewactivetest">Active tests</a>
                    <a class="dropdown-item" href="<?php echo base_url();?>tests/viewdeactivetest">Deactive tests</a>
                  </div>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <i class="fas fa-jedi"></i> Wards &nbsp; &nbsp; <i class="fas fa-plus float-right"></i>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Add new</a>
                    <a class="dropdown-item" href="#">View Records</a>
                  </div>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <i class="fas fa-building"></i> Departments &nbsp; &nbsp;  &nbsp;  &nbsp; <i class="fas fa-plus float-right"></i>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo base_url(); ?>departments/all_department">All Departments</a>
                  </div>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                   <i class="fas fa-briefcase-medical"></i> Appoints &nbsp; &nbsp; <i class="fas fa-plus float-right"></i>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Add new</a>
                    <a class="dropdown-item" href="#">All Appointments</a>
                  </div>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                   <i class="fas fa-money-check-alt"></i> Salaries &nbsp; &nbsp; <i class="fas fa-plus float-right"></i>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo base_url();?>salary/loadchecksalary">Check Salary</a>  
                  </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>admins/setting">
                       <i class="fas fa-cogs"></i> Settings
                    </a>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                   <i class="fas fa-user"></i> Users list &nbsp; &nbsp; <i class="fas fa-plus float-right"></i>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo base_url(); ?>users/viewalluser">All Users</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>users/viewadmins">Admins</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>users/viewdoctors">Doctors</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>users/viewnurses">Nurse</a>
                  </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('logins/logout'); ?>">
                       <i class="fas fa-sign-out-alt"></i> Log out
                    </a>
                </li>
                
              </ul>
            </nav>            
        </div>

        
