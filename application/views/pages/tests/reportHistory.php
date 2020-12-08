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
    <div class="row mb-2">
      <div class="col">
        <p class="text-danger font-weight-bold">Report History</p>
      </div>
    </div>
  

    <div class="row">
      <div class="col table table-responsive text-center pl-0 pr-0 table-striped">
          <table class="table" id="datatable">
            <thead>
              <tr>
                <th scope="col">P. Name</th>
                <th scope="col">Mobile</th>               
                <th scope="col">Invoice</th>
                <th scope="col">Gross-Total</th>                           
                <th scope="col">D-Amount</th>
                <th scope="col">Net Amount</th>
                <th scope="col">Paid</th>
                <th scope="col">Due</th>         
                <th>Actions :</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($allReports as $pReport): ?>
                <tr>
                  <td><a href="<?php echo base_url(); ?>tests/viewdetailsoftestpatient/<?php echo $pReport['invoice'];?>"><?php echo $pReport['p_name']; ?></a></td>
                  <td><?=$pReport['p_mobile']; ?></td>                  
                  <td><?php echo $pReport['invoice']; ?></td>
                  <td><?php echo $pReport['grossamount']; ?></td>
                  <td><?php echo $pReport['discountamount']; ?></td>
                  <td><?php echo $pReport['netamount']; ?></td>
                  <td><?php echo $pReport['paidamount']; ?></td>
                  <td><?php echo $pReport['dueamount']; ?></td>
                  <td>
                    <a class="text-secondary font-weight-bold" href="#"><i class="far fa-edit"></i></a>
                    </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

        
      </div>
      
    </div>










  </div>










        </div>
    </div>
</div>
