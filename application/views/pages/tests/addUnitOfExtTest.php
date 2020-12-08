<style type="text/css">
  a[id="input"]{
    padding: .02em .75rem !important;
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

  <?php $id = $id;?>

  <?php echo form_open_multipart('tests/addUnitOfExtTest');?>
    <div class="row mt-0">
      <div class="col-md-12 pull pull-left mt-5 p-0">
      <p class="font-weight-bold">Add Units</p>
      <div class="content-process table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Unit Name</th>
              <th>Unit Measurement in</th>
              <th>Base Unit</th>
            </tr>
          </thead>
          <tbody id="cartItem">
            <tr>
              <td>
                <input type="text" name="unitName" id="unitName" autocomplete="off" class="form-control">
              </td>
              <td>
                <select id="unitMeasurement" class="form-control" name="unitMeasurement" required>
                  <option value="" selected>Select..</option>
                  <?php foreach($units as $unit): ?>
                    <?php echo '<option value = "'.$unit['id'].'">'.$unit['name'].'</option>' ?>
                  <?php endforeach; ?>
                </select>
              </td>
              <td>
                <input type="text" name="baseUnit" id="baseUnit" class="form-control" autocomplete="off">
              </td>
              <td>
                <a href="#" class="btn btn-outline-danger" id="input">+</a>
              </td>
              </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <input type="hidden" name="testid" value="<?=$id?>">

  <div class="row mt-1">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <button class="btn btn-outline-primary mt-3 btn-block mb-5 mt-5" type="submit">Add Units</button>
    </div>
    <div class="col-md-4"></div>
  </div>

</form>










        </div>
    </div>
</div>




<script type="text/javascript">

  var base_url = "<?php echo base_url(); ?>";

  $("#input").on("click",function(){

      var hello = $("#unitMeasurement").val();
      console.log(hello);

        var unitName = $("#unitName").val();
        var unitMeasurementID = $("#unitMeasurement").val();
        var baseUnit = $("#baseUnit").val();

        if(unitMeasurementID !== null){
            $.ajax({
                url: base_url + 'tests/addCartForAddTest',
                data: {
                    'unitName' : unitName,
                    'unitMeasurementId' : unitMeasurementID,                  
                    'baseUnit' : baseUnit,
                },
                type: 'POST',
                success: function(data){
                  var html="";
                    var res = $.parseJSON(data);
                    $(".cart-value").remove();
                    $.each(res.data, function(key,value) {
                        var display = '<tr class="cart-value" id="'+ key +'">' +
                                    '<td class="width-20">'+ value.name +'</td>' +
                                    '<td class="width-10">'+ value.MeasurementName +'</td>' +
                                    '<td class="width-10">'+ value.baseUnit +'</td>' +
                                    '<td class="width-10"><span class="btn btn-danger btn-sm delete-item" data-cart="'+ key +'">x</span></td>' +
                                    '</tr>';
                        $("#cartItem tr:last").after(display);

                    });
                    $("#cartItem").find("input[type=text], input[type=hidden]").val("");
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
        $.get(base_url + 'tests/deleteCartForTest/'+rowid,
            function(data,status){
                if(status == 'success'  && data != 'false'){
                    $("#"+rowid).remove();
                }
            }
        );
    });

</script>
