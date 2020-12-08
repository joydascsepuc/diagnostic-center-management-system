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

	
	<!-- Main container -->
	<div class="row mt-5 pt-5">
		<!-- Main Container : information -->
		<div class="col mt-1">
			<div class="row mt-2">
				<!-- Sub Information part 1 -->
				<div class="col ml-0 pl-0">
					<div class="information" style="background-color: #65CEA7">
						<i class="fas fa-procedures fa-2x"></i> &nbsp;Total Admission &nbsp; <?php echo "7" ?> <br>
					</div>

					<div class="information" style="background-color: #5AB6DF">
						 <i class="fas fa-briefcase fa-2x"></i> &nbsp;Total Employee
					</div>

					<div class="information" style="background-color: #65CEA7">
						<i class="fas fa-briefcase-medical fa-2x"></i> &nbsp;Total Number of Doctors
					</div>

					<div class="information" style="background-color: #5AB6DF">
						<i class="fas fa-calendar-check fa-2x"></i> &nbsp;Today Appointments
					</div>

				</div>

				<!-- Sub Information Part 2 -->
				<div class="col">
					<div class="information" style="background-color: #5AB6DF">
						<i class="fas fa-toolbox fa-2x"></i> &nbsp;Admitted Patients
					</div>

					<div class="information" style="background-color: #65CEA7">
						 <i class="fas fa-jedi fa-2x"></i> &nbsp;Total Wards Number
					</div>

					<div class="information" style="background-color: #5AB6DF">
						<i class="fas fa-building fa-2x"></i> &nbsp;Total Departments
					</div>

					<div class="information" style="background-color: #65CEA7">
						<i class="fab fa-wolf-pack-battalion fa-2x"></i> &nbsp;Total Appoinments
					</div>
				</div>
			</div>
		</div>

		<!-- Main container : Profile -->
		<!-- <div class="col-md-4 mt-5">
			<div class="mt-5">
				<img src="" style="height: 100px; width: 100px;">
				<div>
					Information:
					Name : Joy Das
					Position : Admin
					Joining Date : 14-04-2017
				</div>
			</div>
		</div> -->
	</div>















	


        </div>
    </div>
</div>