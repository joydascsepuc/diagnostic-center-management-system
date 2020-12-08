<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style type="text/css">

.ulistStyle{
    background-color: #eee;
    cursor: pointer;
   /* height:100px; */
    overflow-y:scroll;
  }

/*  .liStyle{
    padding: 20px;
  }


  #empIDResult{
  position: absolute;
  left: 0;
  top: 100%;
  z-index: 10;
  width: 100%;
}*/

#empIDResult li {
  background-color: white;
  color: #000;
  padding: 0;
  margin: 0 17px 2px 17px !important;
}
#empIDResult li:hover {
  background-color: #4584E8;
}

</style>

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
		<?php echo form_open_multipart('salary/getIndividualSalary');?>
		<div class="row text-center">
			<div class="col-8">
				<div class="form-group">
	            <label for="emp_salary">Employee Name or Mobile No or ID :</label>
	            <input type="text" id="empsearch" autocomplete="off" name="empsearch" class="form-control" required>
	             <div id="empIDResult"></div>
	          </div>
			</div>
			<div class="col-4">
				<button class="btn btn-outline-primary btn-block" type="submit" style="margin-top: 31px;">Check Another Employee</button>
			</div>
		</div>
		</form>




		<p class="font-weight-bold mt-5">Salary Sheet</p>
		<div class="row">
			<div class="col-md-12 text-center">
				<table class="table" id="datatable">
				  <thead>
				    <tr>
				      <th scope="col">Name</th>
				      <th scope="col">Position</th>
				      <th scope="col">Salary</th>
				      <th scope="col">Amount Got</th>
				      <th scope="col">Month</th>
				      <th scope="col">Year</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php foreach ($singlesalary as $single): ?>
					    <tr>
					      <td><?php echo $single['name']; ?></td>
					      <td><?php echo $single['position']; ?></td>
					      <td><?php echo $single['salary']; ?></td>
					      <td><?php echo $single['amount']; ?></td>
					      <td><?php echo $single['month']; ?></td>
					      <td><?php echo $single['year']; ?></td>						      
					    </tr>
				    <?php endforeach; ?>
				  </tbody>
				</table>
			</div>
		</div>
	</div>






        </div>
    </div>
</div>




<script type="text/javascript">
  var base_url = "<?php echo base_url(); ?>"; //declaration of base url
  //patientsearch input box on key up (kichu likhle ekhane hit hbe)
  $('#empsearch').keyup(function(){
      var search = $(this).val(); //box er lekha jinish gula variable e neya... ekhane this refer to the same id 
                   //of the box
      if(search != '')
       {
        //ajax calling through posting.... 182 number line..
        $.ajax({
         url:base_url + '/salary/fetchEmpForSearch',
         method:"POST",
         //dataType: "json",
         data:{search:search}, // data is sending to controller with a posting name 'search'

         success:function(data) //success hole j data asbe ta 'data' naam er variable e neya holo...
         {
           $('#empIDResult').fadeIn(); //pateintIDResult div fade in hbe maane vese uthbe
           $('#empIDResult').html(data); // pateintIDResult div e contoller theke asha data show krbe
         }
        });
       }
       else {
         $('#empIDResult').fadeOut();
         $('#empIDResult').html("");
       }
  });

  $(document).on('click','#empID li',function() { //onclick event on declared list in contorller
      var eID= $(this).attr('id'); //getting the id
      if (eID!='') {
        //ajax calling through that id we have on 'onclick' event
        $.ajax({
         url:base_url + '/salary/fetchEmployee',
         method:"POST", //posting method
         dataType: "json", //type json... asking controller to return data in json type
         data:{eID:eID}, // send the ID as name as pID to the controller...
         success:function(response) //here 'response' contains the array sent from controller.. and in js we can use array index like this "response.name" , "response.age" etc
         {
          //putting the array values in there corresponding feilds...
 
           $('#empsearch').val(response.employeeid);
           $('#empIDResult').fadeOut(); //fadeout the div that shows the suggestions...
           
         }
        });
      }
      else {
        
        $('#empsearch').val("");
        $('#empIDResult').fadeOut();
        
      }

    });

</script>