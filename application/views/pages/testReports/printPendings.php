<style type="text/css">
  #btn{
    margin-top: 30px;
    padding: 3px;
  }

  .ulistStyle{
    background-color: #eee;
    cursor: pointer;
    height:100px;
    width: 100%; 
    overflow-y:scroll;
    position: absolute;
  }

  .liStyle{
    padding: 20px;
    font-size: 13px;
  }


  #pateintIDResult{
    position: absolute !important;
    left: 0 !important;
    top: 100% !important;
    z-index: 10 !important;
    width: 100% !important;
  }

  #pateintIDResult li {
    /*background-color: white;*/
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

  <?php echo form_open_multipart('testReports/printTests');?>
    <div class="row">
      <div class="col-5">
        <label for="pid">Patient Invoice or Mobile</label>
        <input type="text" autocomplete="off" name="patientID" id="pid" class="form-control">
        <div id="pateintIDResult"></div>
      </div>
      <div class="col-5">
        <label for="sid">Tests Lists:</label>
        <select id="sid" class="form-control" name="sid" required></select>
      </div>

        <input type="hidden" name="patientID" id="patientID" class="form-control">
        <input type="hidden" name="testID" id="testID" class="form-control">

      <div class="col-2">
        <button class="btn btn-outline-danger btn-block font-weight-bold" type="submit" id="btn">Print</button>
      </div>
    </form>


  </div>


  


  <div class="row">
    <div class="col-12">
      <div id="PreviewReport">
        
      </div>
    </div>
  </div>





        </div>
    </div>
</div>



<script type="text/javascript">

var base_url = "<?php echo base_url(); ?>";

$('#pid').keyup(function(){
     var search = $(this).val();
     if(search != ''){

      $.ajax({
       url:base_url + '/testReports/fetchPateintIDForSearch',
       method:"POST",
       data:{search:search},

       success:function(data){

         $('#pateintIDResult').fadeIn();
         $('#pateintIDResult').html(data);
        }
      });
     }
     else {
       $('#pateintIDResult').fadeOut();
       $('#pateintIDResult').html("");
     }
    });


  $(document).on('click','#pID li',function() {
      var pID= $(this).attr('id');
      if (pID!='') {
        
        $.ajax({
         url:base_url + '/testReports/fetchPatient',
         method:"POST",
         dataType: "json",
         data:{pID:pID},
         success:function(response){
 
           $('#pid').val(response.invoice);
           $('#patientID').val(response.id);
           $('#pateintIDResult').fadeOut();

           var pid = response.invoice;
            if(pid == '')
            {
              $('#sid').html("");
            }
            else {
              $.ajax({
                    url:base_url + 'testReports/getAllTestIDforDeliver',
                    type: "POST",
                    data: {'pid' : pid},
                    dataType: 'json',
                    success: function(data){
                       $('#sid').html(data);
                    },
                });
            }

         }
        });
      }
      else {
        
        $('#pid').val("");     
        $('#pateintIDResult').fadeOut();
        
      }

    });



    /*On change Sales Item id Preview Report*/
    $('#sid').on('change', function(){
            var sid = $(this).val();
            if(sid == '')
            {
              $('#PreviewReport').html("");
            }
            else {
              $.ajax({
                    url:base_url + 'testReports/getSinglePreviewReport',
                    type: "POST",
                    data: {'sid' : sid},
                    dataType: 'json',
                    success: function(data){
                       $('#PreviewReport').html(data);
                    },
                });
            }
       });

 
  
    
        
   

  


</script>


