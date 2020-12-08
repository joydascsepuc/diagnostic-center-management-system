<style type="text/css">
  .width-33{
    width: 33%;
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

  <p class="font-weight-bold">Select Test and Patient</p>
  <div class="row">
    <div class="col">
      <label for="pid"></label>
      <select id="pid" class="form-control" name="pid" required>
        <option value="" selected>Select..</option>
        <?php foreach($patients as $patient): ?>
          <?php echo '<option value = "'.$patient['id'].'">'.$patient['p_name'].' - '.$patient['invoice'].'</option>' ?>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="col">
      <label for="sid"></label>
      <select id="sid" class="form-control" name="sid" required></select>
    </div>
  </div>

  <div class="row">
    <div class="col">

      <?php echo form_open_multipart('testReports/addTestReport');?>
        <table class="table text-center" id="table">
            <tr>
              <th>Unit Name</th>
              <th>Value From Lab</th>
              <th>Base Value</th>
            </tr>
        </table>

        <div class="row">
          <div class="col-4"></div>
          <div class="col-4">
            <button type="submit" class="btn btn-outline-danger btn-block">Add Data</button>
          </div>
          <div class="col-4"></div>
        </div>
      </form>

    </div>
  </div>








        </div>
    </div>
</div>


<script type="text/javascript">
  
  var base_url = "<?php echo base_url(); ?>";

  $(document).ready(function() {
    $('#pid').on('change', function(){
          var pid = $(this).val();
          if(pid == '')
          {
            $('#sid').html("");
          }
          else {
            $.ajax({
                  url:base_url + 'testReports/getTest',
                  type: "POST",
                  data: {'pid' : pid},
                  dataType: 'json',
                  success: function(data){
                     $('#sid').html(data);
                  },
              });
          }
     });


    $('#sid').on('change', function(){
      var sid = $(this).val();
      if(sid == '')
      {
        $('#table').html("");
      }
      else {
        $.ajax({
              url:base_url + 'testReports/getDefaultUnits',
              type: "POST",
              data: {'sid' : sid},
              dataType: 'json',
              success: function(data){
                 $("#table tr:last").after(data);
              },
          });
      }
 });

  });
</script>