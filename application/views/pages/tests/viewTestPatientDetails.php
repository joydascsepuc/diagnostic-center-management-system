<div class="col-md-10">
  
  <style type="text/css">
  input[class = "report"]{
    border : none;
    font-size: 1rem !important;
  }

  
    .alignRight {
      text-align: right;
    }
  
</style>    
   <!-- Date Time -->          
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
          <?php foreach ($data['primary'] as $key => $basic): ?>
          <?php $invoice = $basic['invoice']; ?>
          <?php echo form_open_multipart('tests/checkbutton');?>
          Patient Name : <?=$basic['p_name']; ?>
          <br>
          Patient ID : <?=$basic['patientid'];?>
          <br>
          Age : <?=$basic['p_age'];?>
          <br>
          Mobile No : <?=$basic['p_mobile'];?>
          <br>
          Gender : <?=$basic['p_gender'];?>
          <br>
          Blood-Group : <?=$basic['p_blood_group'];?>
          <br>
          Invoice Number : <?=$basic['invoice'];?>
          <br>
          <br>
          <?=$basic['img'];?>
        </div>
        <div class="col-md-4">
          <p class="card-text">Consultant By</p>
          Doctor Name:  <?=$basic['ref_doc_id'];?>
        <?php endforeach; ?>
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-12">
          <table class="table">
            <thead>
              <tr>
                <th>Test Name</th>
                <th>O. Amount</th>
                <th>Discount</th>
                <th>Net Price</th>
              </tr>
            </thead>
            <tbody>
             <?php foreach($data['tests'] as $key => $test): ?>
              <tr>
                <td><?=$test['test_id'];?></td>
                <td><?=$test['test_price'];?></td>
                <td><?=$test['test_discount'];?></td>
                <td><?=$test['net_amount'];?></td>
              </tr>
            <?php endforeach; ?>
            <tr>
              <td colspan="4"></td>
            </tr>
            <?php foreach ($data['primary'] as $key => $basic): ?>
              <tr>
                <td colspan="3" class="alignRight">Total:</td>
                <td colspan="1"><?=$basic['netamount']; ?></td>
              </tr>
              <tr>
                <td colspan="3" class="alignRight">Paid-Amount:</td>
                <td colspan="1"><?=$basic['paidamount']; ?></td>
              </tr>
              <tr>
                <td colspan="3" class="alignRight">Due-Amount:</td>
                <td colspan="1"><?=$basic['dueamount']; ?></td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
          <div class="row">
            <div class="col">
              <a href="<?php echo base_url(); ?>tests/printReportAgain/<?=$invoice;?>" class="btn btn-outline-primary">Print Again</a>
            </div>
            <div class="col">
              <a href="<?php echo base_url(); ?>tests/pendingReports" class="btn btn-outline-danger">Go Back</a>
            </div>
          </div>
        </div>
        <div class="col-3"></div>
      </div>
    </div>












        </div>
    </div>
</div>

