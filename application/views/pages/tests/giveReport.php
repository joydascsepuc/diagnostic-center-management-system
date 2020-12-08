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


    <?php foreach($PendingPRDetails as $data): ?>

      <div class="row">
        <div class="col">
          Patient Name : <?=$data['p_name']?>
          <br>
          Patient Mobile No : <?=$data['p_mobile'];?>
          <br>
          Patient Age : <?=$data['p_age'];?>
          <br>
          Patient Gender : <?=$data['p_gender'];?>
          <br>
          Patient Blood Group : <?=$data['p_blood_group'];?>
          <br>
          Patient ID : <?=$data['patientid'];?>
          <br>
          Refer By : <?=$data['ref_doc_id'];?>
        </div>
        <div class="col">
          Gross Amount : <?=$data['grossamount']?>
          <br>
          Discount Amount : <?=$data['discountamount']?>
          <br>
          Net Amount : <?=$data['netamount']?>
          <br>
          Paid Amount : <?=$data['paidamount']?>
          <br>
          Due Amount : <?=$data['dueamount']?>
          <br>
          Invoice : <?=$data['invoice']?>
          <br>
          Add By : <?=$data['byuser']?>
        </div>
      </div>

      <?php echo form_open_multipart('tests/deliverReport');?>
        <div class="row mt-5">
          <div class="col">
            <label for="due">Due Payment</label>
            <input type="text" name="dueamount" class="form-control" value="<?=$data['dueamount'];?>" readonly>
          </div>
          <div class="col">
            <label for="due">Now Pay</label>
            <input type="text" name="nowpay" class="form-control" value="<?=$data['dueamount'];?>">
            <input type="hidden" name="paidamount" value="<?=$data['paidamount']; ?>">
            <input type="hidden" name="id" value="<?=$data['id']; ?>">
            <input type="hidden" name="invoice" value="<?=$data['invoice'];?>">
          </div>
        </div>

        <div class="row mt-4">
          <div class="col-4"></div>
          <div class="col-4">
            <button type="submit" class="btn btn-outline-danger btn-block">--- Deliver Report ---</button>
          </div>
          <div class="col-4"></div>
        </div>
      </form>

    <?php endforeach; ?>






















        </div>
    </div>
</div>
