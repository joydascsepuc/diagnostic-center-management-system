<style type="text/css">
  a[id="input"]{
    padding: .02em .75rem !important;
  }
</style>

<div class="col-md-10">
    
     <!-- Date and Time -->
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


  <p class="text-danger font-weight-bold mt-4 mb-3">Add Test</p>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">

        <?php echo form_open_multipart('tests/addtest');?>
          <div class="row">
            <div class="col">
              <label for="name">Test Name:</label>
                <input type="text" id="name" autocomplete="off" class="form-control" placeholder="Name" name="testname" required autofocus>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="description">Test Description: </label>
              <textarea type="text" aria-describedby="descriptionHelp" style="height: 5rem;" id="description" class="form-control" placeholder="Test Description" name="description"></textarea>
              <small id="descriptionHelp" class="form-text text-muted">Can be skipped description part.</small>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col">
              <label for="cost">Our Cost:</label>
              <input type="text" id="cost" class="form-control" placeholder="Cost Us" name="testcost" required>
            </div>
            <div class="col">
              <label for="price">Price:</label>
              <input type="text" id="price" class="form-control" placeholder="Price of Test" name="testprice">
            </div>
            <div class="col">
              <label for="duration">Duration:</label>
              <select id="duration" class="form-control" name="duration" required>
                  <option selected value="">Choose...</option>
                  <option value="1">1 Day</option>
                  <option value="2">2 Days</option>
                  <option value="3">3 Days</option>
                  <option value="4">4 Days</option>
                  <option value="5">5 Days</option>
                  <option value="6">6 Days</option>
                  <option value="7">7 Days</option>
                </select>
            </div>
            <div class="col">
              <label for="isactive">Is Active:</label>
              <select id="isactive" class="form-control" name="isactive" required>
                  <option selected value="">Choose...</option>
                  <option value="1">Active</option>
                  <option value="0">Not Active</option>
                </select>
            </div>
          </div>
         
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
                          <!-- <input type="hidden" name="unitID" id="unitId"> -->
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

         
          <div class="row mt-1">
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <button class="btn btn-outline-primary mt-3 btn-block mb-5 mt-5" type="submit">Add Test</button>
            </div>
            <div class="col-md-4"></div>
          </div>
        </form>

      </div>
    </div>
  </div>











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
