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
        <p class="text-danger font-weight-bold">All Tests</p>
      </div>
      
      <div class="col">
        <a href="<?php echo base_url(); ?>tests/LoadAddUnit" class="text-primary font-weight-bold btn float-right">Add Unit</a>
      </div>
    </div>
    
    
    <div class="row">
      <div class="col table table-responsive pl-0 pr-0 text-left">
          <table class="table" id="datatable">
            <thead>
              <tr>
                <th scope="col">Name</th>                       
                <th scope="col">Actions :</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($units as $unit): ?>
                <tr>
                  <td><?php echo $unit['name']; ?></td>                  
                  
                  <td>
                    <a class="text-secondary font-weight-bold" href="<?php echo base_url(); ?>tests/editUnit/<?php echo $unit['id']; ?>"><i class="far fa-edit"></i></a> |
                    <a class="text-danger font-weight-bold" href="#"><i class="far fa-trash-alt"></i></a>
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


