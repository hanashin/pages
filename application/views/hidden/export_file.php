<?php echo form_open('hidden/exec_export_file');?>
  <div class="form-group">    
    <label class="col-sm-12 control-label"><?php echo $this->lang->line('export_file_input')?></label>
    <div class="col-sm-12">
      <input type="text" size=25 name="start_time" value="<?php echo $start_time;?>"> ~ 
      <input type="text" size=25 name="end_time" value="<?php echo $end_time;?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2">
      <button type="submit" class="btn btn-primary btn-sm"><?php echo $this->lang->line('export_file_export')?></button>
    </div>
  </div>
</from>