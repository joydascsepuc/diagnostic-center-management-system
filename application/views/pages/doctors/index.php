<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 navbarsection">
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

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>patients/viewpatient">
                        <i class="fas fa-users"></i> All Patients
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-user-injured"></i> My Patients
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>employees/view_doctors_list">
                        <i class="fas fa-stethoscope"></i> All Other Doctors
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>departments/all_department">
                        <i class="far fa-building"></i> Departments
                    </a>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <i class="far fa-calendar-check"></i> Appointments&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <i class="fas fa-plus float-right"></i>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">New Appointments</a>
                    <a class="dropdown-item" href="#">All Appointments</a>
                  </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-clock"></i> My Schedule
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>doctors/setting">
                       <i class="fas fa-cogs"></i> Settings
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('logins/logout'); ?>">
                       <i class="fas fa-sign-out-alt"></i> Log out
                    </a>
                </li>
                
              </ul>
            </nav>            
        </div>

        
