<div class="col-md-10">
  
<!-- <?php var_dump($data); ?> -->

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


  <?php echo form_open_multipart('tests/updateEditTestAllUnits');?>
    <?php $rownumbers = 0; ?>
    <?php foreach($data['units'] as $unit): ?>
      <?php $rownumbers++; ?>
      <input type="hidden" name="id[<?=$rownumbers?>]" value="<?=$unit['id'];?>">
      <?php $options = $unit['measure_id']; ?>
      <div class="row">
        <div class="col">
          <label for="unitName">Unit Name</label>
          <input type="text" name="unitName[<?=$rownumbers?>]" class="form-control" value="<?=$unit['unit_name']?>">
        </div>
        <div class="col">
          <label for="units">Measure In</label>
          <select id="unitMeasurement" class="form-control" name="unitMeasurement[<?=$rownumbers?>]" required>
          <?php foreach($data['measures'] as $measure): ?>
            <option value="<?=$measure['id']?>" <?php if($options == $measure['id']) echo "selected = 'Selected'"?> ><?=$measure['name']?></option>
          <?php endforeach; ?>
          </select>
        </div>
        <div class="col">
          <label for="baseUnit">Unit Name</label>
          <input type="text" class="form-control" name="baseUnit[<?=$rownumbers?>]" value="<?=$unit['base_value']?>">
        </div>
      </div>
    <?php endforeach;?>

    <input type="hidden" name="rownumbers" value="<?=$rownumbers;?>">

    <div class="row mt-4">
      <div class="col-4"></div>
      <div class="col-4">
        <button type="submit" class="btn btn-outline-danger btn-block">Update Units</button>
      </div>
      <div class="col-4"></div>
    </div>
  </form>








        </div>
    </div>
</div>
