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


  <p class="text-danger font-weight-bold mt-4">Edit Test</p>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">

        <?php echo form_open_multipart('tests/updatetest');?>
        <?php foreach($tests['basic'] as $test): ?>
          <div class="row">
            <div class="col">
              <label for="name">Test Name:</label>
                <input type="text" value="<?=$test['name'];?>" id="name" autocomplete="off" class="form-control" placeholder="Name" name="testname" required autofocus>
                <input type="hidden" name="id" value="<?=$test['id'];?>">
                <?php $id = $test['id']; ?>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-6">
              <label for="description">Test Description: </label>
              <textarea type="text" aria-describedby="descriptionHelp" style="height: 5.8rem;" id="description" class="form-control" placeholder="Test Description" name="description"><?=$test['description']?></textarea>
              <small id="descriptionHelp" class="form-text text-muted">Can be skipped description part.</small>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col">
                  <label for="cost">Our Cost:</label>
                  <input type="text" value="<?=$test['cost'];?>" id="cost" class="form-control" placeholder="Cost Us" name="testcost" required>
                </div>
                <div class="col">
                  <label for="price">Price:</label>
                  <input type="text" id="price" value="<?=$test['price'];?>" class="form-control" placeholder="Price of Test" name="testprice">
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label for="duration">Duration:</label>
                  <?php $options = $test['duration']; ?>
                  <select id="duration" class="form-control" name="duration" required>
                      <option selected value="">Choose...</option>
                      <option value="1" <?php if($options=="1") echo 'selected="selected"'; ?>>1 Day</option>
                      <option value="2" <?php if($options=="2") echo 'selected="selected"'; ?>>2 Days</option>
                      <option value="3" <?php if($options=="3") echo 'selected="selected"'; ?>>3 Days</option>
                      <option value="4" <?php if($options=="4") echo 'selected="selected"'; ?>>4 Days</option>
                      <option value="5" <?php if($options=="5") echo 'selected="selected"'; ?>>5 Days</option>
                      <option value="6" <?php if($options=="6") echo 'selected="selected"'; ?>>6 Days</option>
                      <option value="7" <?php if($options=="7") echo 'selected="selected"'; ?>>7 Days</option>
                    </select>
                </div>
                <div class="col">
                  <label for="isactive">Is Active:</label>
                  <?php $options = $test['is_active']; ?>
                  <select id="isactive" class="form-control" name="isactive" required>
                      <option selected value="">Choose...</option>
                      <option value="1" <?php if($options=="1") echo 'selected="selected"'; ?>>Active</option>
                      <option value="0" <?php if($options=="0") echo 'selected="selected"'; ?>>Not Active</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
         <?php endforeach; ?>
         <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <button class="btn btn-outline-primary mt-3 btn-block mb-5 mt-5" type="submit">Update Basic</button>
            </div>
            <div class="col-md-4"></div>
          </div>
        </form>



         <div class="mt-3">
          <div class="row">
            <div class="col-4">
              <p>Test Units:</p>
            </div>
            <div class="col-4"></div>
            <div class="col-4 text-right">
              <a class="font-weight-bold" href="<?php echo base_url(); ?>tests/loadAddUnitOfExtTest/<?php echo $id; ?>"><i class="fas fa-plus">Add Unit &nbsp; &nbsp;</i></a>
              <a class="font-weight-bold" href="<?php echo base_url(); ?>tests/loadEditTestAllUnits/<?php echo $id; ?>"><i class="far fa-edit">&nbsp;Edit Units</i></a>
            </div>
          </div>
           <table class="table">
             <thead>
               <tr>
                 <th>Unit Name</th>
                 <th>Measure In</th>
                 <th>Base Value</th>
                 <th>Action</th>
               </tr>
             </thead>
             <tbody>

              <?php foreach($tests['units'] as $unit): ?>  
              <tr>
                <td><?=$unit['unit_name'];?></td>
                <td><?=$unit['measure_id'];?></td>
                <td><?=$unit['base_value'];?></td>
                <td>
                  <a class="text-danger font-weight-bold" href="<?php echo base_url()?>tests/deleteSingleUnit/<?=$unit['id'];?>"><i class="far fa-trash-alt"></i></a>
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
</div>

