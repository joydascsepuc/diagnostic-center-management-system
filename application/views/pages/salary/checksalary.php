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

  <div class="container text-center">
    <div class="row">
      <div class="col">
        <p class="font-weight-bold">Check monthly</p>
        <?php echo form_open_multipart('salary/getSalarySheet');?>
        <div class="row">
          <div class="col-6">
              <label for="month">Month</label>
              <select id="month" class="form-control" name="month" required>
                <option selected value="">Choose...</option>
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
              </select>
          </div>
          <div class="col-6">
            <label for="year">Year</label>
            <select id="year" class="form-control" name="year" required>
              <option selected value="">Choose...</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
            </select>
          </div>
        </div>
        <button class="btn btn-outline-primary mt-3" type="submit">Get Salary Sheet</button>
      </form>
      </div>

      <div class="col">
        <p class="font-weight-bold">Check Individual User</p>
        <?php echo form_open_multipart('salary/getIndividualSalary');?>
          <div class="form-group">
            <label for="emp_salary">Employee Name or Mobile No or ID :</label>
            <input type="text" id="empsearch" autocomplete="off" name="empsearch" class="form-control" required>
             <div id="empIDResult"></div>
          </div>
        <button type="submit" class="btn btn-outline-primary">Check History</button>   
        </form>
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
