<style type="text/css">

.ulistStyle{
    background-color: #eee;
    cursor: pointer;
    height:100px;
    width: 100%; 
    overflow-y:scroll;
    position: absolute;
  }

  .liStyle{
    /*padding: 20px;*/
    font-size: 13px;
  }


#pateintIDResult{
  position: absolute !important;
  left: 0 !important;
  top: 100% !important;
  z-index: 10 !important;
  width: 100% !important;
}

#doctorIDResult{
  position: absolute;
  left: 5;
  top: 100%;
  z-index: 10;
  width: 100%;
}


#pateintIDResult li {
  /*background-color: white;*/
  color: #000;
  padding: 0;
  margin: 0 17px 2px 17px !important;
}

#pateintIDResult li:hover {
  background-color: #4584E8;
  color: white;
}

#doctorIDResult li:hover {
  background-color: #4584E8;
  color: white;
}

#testIDResult li:hover {
  background-color: #4584E8;
  color: white;
}

input{
 padding: 0 0 0 2px !important; 
}

a[id="input"]{
    padding: .02em .75rem !important;
}

.table td, .table th {
    padding: .4rem;
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
						  <td id="am" class = "clock"><!-- <?='  '.date('a'); ?> --></td>	  
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
    <?php echo form_open_multipart('tests/generateReport');?>
		<div class="row">
			<div class="col-12">
				<div class="row">
					<div class="col">
					    Patient Mobile no or ID (For Admitted Patient) : <input type="text" id="patientsearch" class="form-control patientsearch" autocomplete="off" value="<?=$info['patientid'];?>" placeholder="Mobile or ID No" name="patientsearch">
					    <div id="pateintIDResult"></div>
					</div>
				</div>


				<!-- Newly added -->
				<div class="mt-4">
					<!-- Basic Information -->
					<div>
					  <p class="mb-1">For New patient write down here:</p>
					  <div class="row">
				    	<div class="col-3">
				    		<label for="name">Name:</label>
				      		<input type="text" id="name" value="<?=$info['patientname'];?>" class="form-control" placeholder="Name" name="name" required autofocus>
				    	</div>
				    	<div class="col-3">
				    		<label for="mobile">Mobile No:</label>
				      		<input type="text" value="<?=$info['mobile'];?>" id="mobile" class="form-control" placeholder="Mobile" name="mobile" required>
				    	</div>
				    	<div class="col-2">
					  		<label for="age">Age:</label>
				      		<input type="text" value="<?=$info['age'];?>" id="age" class="form-control" placeholder="Age" name="age" required>	
					  </div>
					  <div class="col-2">
			    		<label for="gender">Gender</label>
              <?php $option = $info['gender']; ?>
					   	<select id="gender" class="form-control" name="gender" required>
					       	<option selected value="">Choose...</option>
				        	<option value="male" <?php if($option == "male") echo "selected" ?>>Male</option>
				        	<option value="female" <?php if($option == "female") echo "selected" ?>>Female</option>
				        	<option value="other" <?php if($option == "other") echo "selected" ?>>Other</option>
				      	</select>
					   </div>
					   <div class="col-2">
					    	<label for="bloodgroup">Blood Group</label>
                <?php $option = $info['bloodgroup']; ?>
						   	<select id="bloodgroup" class="form-control" name="bloodgroup" required>
						       	<option selected value="">Choose...</option>
					        	<option value="A+" <?php if($option == "A+") echo "selected" ?>>A+</option>
					        	<option value="A-" <?php if($option == "A-") echo "selected" ?>>A-</option>
					        	<option value="B+" <?php if($option == "B+") echo "selected" ?>>B+</option>
					        	<option value="B-" <?php if($option == "B-") echo "selected" ?>>B-</option>
					        	<option value="AB+" <?php if($option == "AB+") echo "selected" ?>>AB+</option>
					        	<option value="AB-" <?php if($option == "AB-") echo "selected" ?>>AB-</option>
					        	<option value="O+" <?php if($option == "O+") echo "selected" ?>>O+</option>
					        	<option value="O-" <?php if($option == "O-") echo "selected" ?>>O-</option>
					        	<option value="Unknown" <?php if($option == "Unknown") echo "selected" ?>>Unknown</option>
					      	</select>
					    </div>
					  </div>

            <div class="row">
              <div class="col">
                <label for="doctorsearch">Doctor's Name ID or Mobile</label>
                  <input type="text" autocomplete="off" value="<?=$info['doctorname'];?>" id="doctorsearch" class="form-control" placeholder="" name="doctorsearch">
                  <div id="doctorIDResult"></div>
              </div>
              <div class="col">
                <label for="docid">Doctor's ID:</label>
                  <input type="text" id="docid" value="<?=$info['doctorid'];?>" class="form-control" placeholder="Doc ID" name="docid" readonly>
              </div>
              <div class="col">
                <label for="testprice">Commission:</label>
                  <input type="text" id="commission" value="<?=$info['commission'];?>" class="form-control" placeholder="Commission" name="commission" readonly>
              </div>
            </div>

     

            <div class="col-md-12 pull pull-left mt-5 p-0" style="background-color: #DDDDDD;">
              <h3 class="content-title">Add Test</h3>
              <div class="content-process table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Discount</th>
                    </tr>
                  </thead>
                  <tbody id="cartItem">
                    <tr>
                      <td>
                        <input type="text" autocomplete="off" id="testsearch" class="form-control" placeholder="" name="testname">
                        <input type="hidden" autocomplete="off" id="testid" name="testid">
                        <div id="testIDResult"></div>
                      </td>
                      <td>
                        <input type="text" id="testprice" class="form-control" placeholder="" name="testprice"readonly>
                      </td>
                      <td>
                        <input type="text" id="discount" value="0" class="form-control" placeholder="" name="discount">
                      </td>
                      <td>
                        <a href="#" class="btn btn-outline-danger" id="input">+</a>
                      </td>
                    </tr>

                    <?php $tests = $this->cart->contents();?>
                    <?php foreach ($tests as $key => $test) : ?>
                      <tr class="cart-value" id="<?=$key?>">
                        <td class="width-30"><?=$test['name'];?></td>
                        <td class="width-30"><?=$test['price'];?></td>
                        <td class="width-30"><?=$test['discount'];?></td>
                        <td class="width-10"><span class="btn btn-danger btn-sm delete-item" data-cart="<?=$key?>">x</span></td>
                      </tr>
                    <?php endforeach; ?>

                  </tbody>
                </table>
              </div>
            </div>
					  

					  <div class="row mt-5 mb-5">
					  	<div class="col-4"></div>
					  	<div class="col-4">
					  		<button type="Submit" class="btn btn-outline-primary btn-block" onclick="return confirm('Are you sure? Check all tests once again.');">Preview Report</button>
					  	</div>
					  	<div class="col-4"></div>
					  </div>
					</div>
					</form>

				</div>
			</div>
		</div>
	</div>  



        </div>
    </div>
</div>







<script type="text/javascript">
  var base_url = "<?php echo base_url(); ?>";

  $("#input").on("click",function(){

        var id = $("#testid").val();
        var test_name = $("#testsearch").val();
        var test_price = $("#testprice").val();
        var discount = $("#discount").val();

        if(id !== null){
            $.ajax({
                url: base_url + 'tests/add_test_list',
                data: {
                    'id' : id,                  
                    'test_name' : test_name,
                    'price' : test_price,
                    'discount' : discount,
                },
                type: 'POST',
                success: function(data){
                  var html="";
                    var res = $.parseJSON(data);
                    $(".cart-value").remove();
                    $.each(res.data, function(key,value) {
                        var display = '<tr class="cart-value" id="'+ key +'">' +
                                    '<td class="width-20">'+ value.name +'</td>' +
                                    '<td class="width-10">'+ value.price +'</td>' +
                                    '<td class="width-10">'+ value.discount +'</td>' +
                                    '<td class="width-10"><span class="btn btn-danger btn-sm delete-item" data-cart="'+ key +'">x</span></td>' +
                                    '</tr>';
                        $("#cartItem tr:last").after(display);

                    });


                    $("#cartItem").find("input[type=text], input[type=hidden]").val("");
                    $("#discount").val("0");

                    // $("#preview").html(html);
                },
                error: function(){
                    alert('Something Error');
                }
            });
        }

        else{
            alert("Please fill in all boxes");
        }
    });



    $(document).on("click",".delete-item",function(e){
        var rowid = $(this).attr("data-cart");
        //$el.faLoading();
        $.get(base_url + 'tests/delete_test_list/'+rowid,
            function(data,status){
                if(status == 'success'  && data != 'false'){
                    $("#"+rowid).remove();
                    console.log(data);
                    $("#total").text('Tk '+data);

                }
            }
        );
    });

</script>



<!--Patient Section (PROTHOM) -->

<script type="text/javascript">

var base_url = "<?php echo base_url(); ?>"; //declaration of base url


//patientsearch input box on key up (kichu likhle ekhane hit hbe)

$('#patientsearch').keyup(function(){
     var search = $(this).val(); //box er lekha jinish gula variable e neya... ekhane this refer to the same id 
     							 //of the box
     if(search != '')
     {
     	//ajax calling through posting.... 182 number line..
      $.ajax({
       url:base_url + '/tests/fetchPateintIDForSearch',
       method:"POST",
       //dataType: "json",
       data:{search:search}, // data is sending to controller with a posting name 'search'

       success:function(data) //success hole j data asbe ta 'data' naam er variable e neya holo...
       {

         $('#pateintIDResult').fadeIn(); //pateintIDResult div fade in hbe maane vese uthbe
         $('#pateintIDResult').html(data); // pateintIDResult div e contoller theke asha data show krbe
       }
      });
     }
     else {
       $('#pateintIDResult').fadeOut();
       $('#pateintIDResult').html("");
     }
    });


	$(document).on('click','#pID li',function() { //onclick event on declared list in contorller
      var pID= $(this).attr('id'); //getting the id
      if (pID!='') {
      	//ajax calling through that id we have on 'onclick' event
        $.ajax({
         url:base_url + '/tests/fetchPatient',
         method:"POST", //posting method
         dataType: "json", //type json... asking controller to return data in json type
         data:{pID:pID}, // send the ID as name as pID to the controller...
         success:function(response) //here 'response' contains the array sent from controller.. and in js we can use array index like this "response.name" , "response.age" etc
         {
         	//putting the array values in there corresponding feilds...
 
           $('#name').val(response.name);
           $('#age').val(response.age);
           $('#mobile').val(response.mobile);
           if (response.gender=="male") {
             $('#gender').val("male");
           }
           else if (response.gender=="female") {
             $('#gender').val("female");
           }
           else {
             $('#gender').val("female");
           }

           if (response.blood_group=="A+") {
             $('#bloodgroup').val("A+");
           }
           else if (response.blood_group=="A-") {
             $('#bloodgroup').val("A-");
           }
           else if (response.blood_group=="B+") {
             $('#bloodgroup').val("B+");
           }else if (response.blood_group=="B-") {
             $('#bloodgroup').val("B-");
           }else if (response.blood_group=="O+") {
             $('#bloodgroup').val("O+");
           }else if (response.blood_group=="O-") {
             $('#bloodgroup').val("O-");
           }
           else if (response.blood_group=="AB+") {
             $('#bloodgroup').val("AB+");
           }
           else if (response.blood_group=="AB-") {
             $('#bloodgroup').val("AB-");
           }
           
           //$('#ID').val(response.id);
           $('#patientsearch').val(response.patientid);
           

           $('#pateintIDResult').fadeOut(); //fadeout the div that shows the suggestions...
           
         }
        });
      }
      else {
        
        $('#name').val("");
        $('#patAge').val("");
        $('#mobile').val("");
        $('#gender').val("");
        $('#bloodgroup').val("");
        $('#patientsearch').val("");
        
        $('#pateintIDResult').fadeOut();
        
      }

    });

</script>


<!-- Doctors -->

<script type="text/javascript">

var base_url = "<?php echo base_url(); ?>"; //declaration of base url


//patientsearch input box on key up (kichu likhle ekhane hit hbe)

$('#doctorsearch').keyup(function(){
     var search = $(this).val(); //box er lekha jinish gula variable e neya... ekhane this refer to the same id 
     							 //of the box
     if(search != '')
     {
     	//ajax calling through posting.... 182 number line..
      $.ajax({
       url:base_url + '/tests/fetchDoctorIDForSearch',
       method:"POST",
       //dataType: "json",
       data:{search:search}, // data is sending to controller with a posting name 'search'

       success:function(data) //success hole j data asbe ta 'data' naam er variable e neya holo...
       {
         $('#doctorIDResult').fadeIn(); //pateintIDResult div fade in hbe maane vese uthbe
         $('#doctorIDResult').html(data); // pateintIDResult div e contoller theke asha data show krbe
       }
      });
     }
     else {
       $('#doctorIDResult').fadeOut();
       $('#doctorIDResult').html("");
     }
    });
	

	$(document).on('click','#dID li',function() { //onclick event on declared list in contorller
      var dID= $(this).attr('id'); //getting the id
      if (dID!='') {
      	//ajax calling through that id we have on 'onclick' event
        $.ajax({
         url:base_url + '/tests/fetchDoctor',
         method:"POST", //posting method
         dataType: "json", //type json... asking controller to return data in json type
         data:{dID:dID}, // send the ID as name as pID to the controller...
         success:function(response) //here 'response' contains the array sent from controller.. and in js we can use array index like this "response.name" , "response.age" etc
         {
         	//putting the array values in there corresponding feilds...
 
           $('#doctorsearch').val(response.name);
           $('#docid').val(response.doctorid);
           $('#commission').val(response.commission);
           $('#doctorIDResult').fadeOut(); //fadeout the div that shows the suggestions...
           
         }
        });
      }
      else {
        
        $('#name').val("");
        $('#docid').val("");
        $('#commission').val("");
        
        $('#doctorsearch').val("");
        
        $('#doctorIDResult').fadeOut();
        
      }

    });


</script>



<!-- Test Section -->
<script type="text/javascript">
	var base_url = "<?php echo base_url(); ?>"; //declaration of base url
	//patientsearch input box on key up (kichu likhle ekhane hit hbe)
	$('#testsearch').keyup(function(){
     	var search = $(this).val(); //box er lekha jinish gula variable e neya... ekhane this refer to the same id 
     							 //of the box
     	if(search != '')
	     {
	     	//ajax calling through posting.... 182 number line..
	      $.ajax({
	       url:base_url + '/tests/fetchTestIDForSearch',
	       method:"POST",
	       //dataType: "json",
	       data:{search:search}, // data is sending to controller with a posting name 'search'

	       success:function(data) //success hole j data asbe ta 'data' naam er variable e neya holo...
	       {
	         $('#testIDResult').fadeIn(); //pateintIDResult div fade in hbe maane vese uthbe
	         $('#testIDResult').html(data); // pateintIDResult div e contoller theke asha data show krbe
	       }
	      });
	     }
	     else {
	       $('#testIDResult').fadeOut();
	       $('#testIDResult').html("");
	     }
	});

	$(document).on('click','#tID li',function() { //onclick event on declared list in contorller
      var tID= $(this).attr('id'); //getting the id
      if (tID!='') {
      	//ajax calling through that id we have on 'onclick' event
        $.ajax({
         url:base_url + '/tests/fetchTest',
         method:"POST", //posting method
         dataType: "json", //type json... asking controller to return data in json type
         data:{tID:tID}, // send the ID as name as pID to the controller...
         success:function(response) //here 'response' contains the array sent from controller.. and in js we can use array index like this "response.name" , "response.age" etc
         {
         	//putting the array values in there corresponding feilds...
 
           $('#testsearch').val(response.name);
           $('#testid').val(response.id);
           $('#testprice').val(response.price);
           $('#duration').val(response.duration);
           $('#testIDResult').fadeOut(); //fadeout the div that shows the suggestions...
           
         }
        });
      }
      else {
        
        $('#testsearch').val("");
        $('#testid').val("");
        $('#testprice').val("");
        $('#duration').val("");
        $('#testIDResult').fadeOut();
        
      }

    });
</script>
