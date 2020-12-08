<style type="text/css">
  input[class = "report"]{
    border : none;
    font-size: 1rem !important;
  }

  <style>
    .alignRight {
      text-align: right;
    }
  </style>
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


    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <p class="card-text">Patient Information</p>
          <?php echo form_open_multipart('tests/checkbutton');?>
          Patient Name : <input type="text" class="report" name="patientname" readonly value="<?=$basic['patientname'];?>">
          <br>
          Patient ID : <input type="text" class="report" name="patientid" readonly value="<?=$basic['patientid'];?>">
          <br>
          Age : <input type="text" class="report" name="patientage" readonly value="<?=$basic['age'];?>">
          <br>
          Mobile No : <input type="text" class="report" name="mobile" readonly value="<?=$basic['mobileno'];?>">
          <br>
          Gender : <input type="text" class="report" name="gender" readonly value="<?=$basic['gender'];?>">
          <br>
          Blood-Group : <input type="text" class="report" name="bloodgroup" readonly value="<?=$basic['bloodgroup'];?>">
          <br>
          Invoice Number : <input type="text" class="report" name="invoice" readonly value="<?=$basic['invoice'];?>">
          <br>
          <input type="hidden" name="docdbid" value="<?=$basic['docdbid']?>">
          <br>
          <?=$basic['img'];?>
        </div>
        <div class="col-md-4">
          <p class="card-text">Consultant By</p>
          Doctor Name : <input type="text" class="report" name="doctorname" readonly value="<?=$basic['doctorname'];?>">
          <input type="hidden" class="report" name="doctorid" readonly value="<?=$basic['doctorid'];?>">
          <input type="hidden" class="report" name="commission" readonly value="<?=$basic['commission'];?>">
        </div>
      </div>
    </div>

    <div class="row" style="margin-top:3rem;">
       <?php $tests = $this->cart->contents();?>
        <div class="col-12">
          <p class="card-text ml-3">Tests list:</p>
          <table class="table table-bordered table-secondary">
            <thead>
              <tr>
                <th>Test Name</th>
                <th>Test Price</th>
                <!-- <th>Cost</th> -->
                <th>Discount</th>
                <th>Price After Discount</th>
              </tr>
            </thead>
            <tbody>
              <?php $grossamount = 0; ?>
              <?php $discountamount = 0; ?>
              <?php $netamount = 0; ?>
              <?php $labcost = 0; ?>

              <?php foreach ($tests as $test) : ?>
                <?php $grossamount += $test['price']; ?>
                <?php $price = (int)$test['price'] - (int)$test['discount']; ?>
                <?php $netamount += $price; ?>
                <?php $labcost += $test['test_cost']; ?>
                <?php $discountamount += $test['discount']; ?>
                
              <tr>
                <td><?=$test['name'];?></td>
                <td><?=$test['price']; ?></td>
                <td><?=$test['discount'];?></td>
                <td><?=$price;?></td>  
              </tr>
              <?php endforeach; ?>
              <tr>
                <td colspan="4"></td>
              </tr>
              <tr>
                <td colspan="3" class="alignRight">Total:</td>
                <td colspan="1"><input type="number" class="report" id="subtotal" name="subtotal" readonly value="<?=$netamount; ?>"></td>
              </tr>
              <tr>
                <td colspan="3" class="alignRight">Paid:</td>
                <td colspan="1"><input type="number" id="paid" onkeypress="hisab()" onkeyup="hisab()" name="paid" class="form-control" autocomplete="off" style="width: 30%;" required></td>
              </tr>
              <tr>
                <td colspan="3" class="alignRight">Pending:</td>
                <td colspan="1"><input type="number" id="pending" name="pending" class="form-control" style="width: 30%; border:none;" readonly></td>
                <input type="hidden" name="grossamount" value="<?=$grossamount; ?>">
                <input type="hidden" name="discountamount" value="<?=$discountamount;?>">
                <input type="hidden" name="labcost" value="<?=$labcost;?>">
                 
                 
              </tr>
            </tbody>
          </table>
        </div>
      </div>

        <div class="row">
          <div class="col-4"></div>
          <div class="col-4">
            <div class="row">
              <div class="col">
                <button type="submit" name="action" value="submit" class="btn btn-outline-primary btn-block" title="Save and Print Report"  onclick="return confirm('Are you sure? Check all tests once again.');"><i class="fas fa-save"></i>&nbsp;Save & <i class="fas fa-print"></i>&nbsp;Print</button>
              </div>
              <div class="col">
                <button type="submit" name="action" value="goback" class="btn btn-outline-danger btn-block" title="Go Back"><i class="fas fa-arrow-circle-left"></i>&nbsp;Go Back</button>
              </div>
            </div>
          </div>
          <div class="col-4"></div>
        </div>

      </form>
       
    </div>

   











        </div>
    </div>
</div>


<script type="text/javascript">

  function hisab(){
    var paid = document.getElementById("paid").value;
    var total = document.getElementById("subtotal").value;

    var pending = total - paid;

    document.getElementById("pending").value = pending;
  }

</script>