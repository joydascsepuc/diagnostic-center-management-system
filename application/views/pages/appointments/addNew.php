<style type="text/css">
  
   .ulistStyle{
    background-color: #eee;
    cursor: pointer;
    height:100px;
    width: 100%; 
    overflow-y:scroll;
    position: absolute !important;
  }

  .liStyle{
    padding: 20px;
    font-size: 13px;
  }

   #doctorIDResult{
    position: absolute;
    left: 0;
    top: 100%;
    z-index: 10;
    width: 100%;
  }

  #doctorIDResult li {
    background-color: white;
    color: #000;
    padding: 0;
    margin: 0 17px 2px 17px !important;
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


  <?php echo form_open_multipart('appointments/addNewAppoiment');?>
    <div class="row">
      <div class="col">
          <label for="doctorsearch">Doctor Name</label>
          <input type="text" name="doctorname" id="doctorsearch" class="form-control doctorsearch" autocomplete="off" required>
          <div id="doctorIDResult"></div>
          <input type="hidden" name="doctorid" id="doctorid">
        </label>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col">
        <label for="patientName">Patient Name</label>
        <input type="text" name="patientName" class="form-control" autocomplete="off" required>
      </div>
      <div class="col">
        <label for="patientMobile">Mobile No</label>
        <input type="text" minlength="11" maxlength="11" name="patientMobile" class="form-control" autocomplete="off" required>
      </div>
      <div class="col">
        <label for="aDate">For Date</label>
        <input type="date" id="aDate" value="<?=date('Y-m-d');?>" name="aDate" class="form-control" required>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-4"></div>
      <div class="col-4">
        <button type="submit" class="btn btn-outline-primary btn-block">--- Add Appointment ---</button>
      </div>
      <div class="col-4"></div>
    </div>
  </form>





















        </div>
    </div>
</div>


<script type="text/javascript">
  
  var base_url = "<?php echo base_url(); ?>";
  $('#doctorsearch').keyup(function(){
     var search = $(this).val();
      if(search != ''){
        $.ajax({
       url:base_url + '/appointments/fetchDoctorIDForSearch',
       method:"POST",
       data:{search:search},
       success:function(data){
         $('#doctorIDResult').fadeIn();
         $('#doctorIDResult').html(data); 
         }
      });
     }
      else{
       $('#doctorIDResult').fadeOut();
       $('#doctorIDResult').html("");
     }
    });


  $(document).on('click','#dID li',function() { 
      var dID= $(this).attr('id'); 
      if (dID!='') {
       
        $.ajax({
         url:base_url + '/appointments/fetchDoctor',
         method:"POST", 
         dataType: "json", 
         data:{dID:dID}, 
         success:function(response){
 
           $('#doctorsearch').val(response.name);
           $('#doctorid').val(response.id);
           $('#doctorIDResult').fadeOut();
          }
        });
      }else{
        
        $('#doctorsearch').val("");
        $('#doctorid').val("");
      }

    });



</script>