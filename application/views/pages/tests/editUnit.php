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

  <?php echo form_open_multipart('tests/updateUnit');?>
  <?php foreach($units as $unit): ?>
    <div class="row">
      <div class="col">
        <label for="name">Unit Name</label>
        <input type="text" class="form-control" value="<?=$unit['name'];?>" autocomplete="off" name="name" required>
        <input type="hidden" name="id" value="<?=$unit['id'];?>">
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-4"></div>
      <div class="col-4">
        <button type="submit" class="btn btn-outline-primary btn-block">Update Unit</button>
      </div>
      <div class="col-4"></div>
    </div>
  <?php endforeach; ?>
  </form>










        </div>
    </div>
</div>
