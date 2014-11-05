<?php
 if("" !== $result){
    if(!strncmp($result, "empty", 5)){
      echo "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\">"."\n";
      echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>"."\n";
      echo "<strong>".$this->lang->line("message_warning")."&nbsp;!&nbsp;&nbsp;</strong>".$this->lang->line("debug_command_is_null")."\n";
      echo "</div>"."\n";
    }
    else if($result == 0){
      echo "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">"."\n";
      echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>"."\n";
      echo "<strong>".$this->lang->line("debug_command_success")."&nbsp;&nbsp;&nbsp;</strong>"."\n";
      echo "</div>"."\n";
    }
    else{
      echo "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">"."\n";
      echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>"."\n";
      echo "<strong>".$this->lang->line("debug_command_failed")."&nbsp;:&nbsp;&nbsp;</strong>".$result."\n";
      echo "</div>"."\n";
    }
  }
?>
<?php echo form_open('hidden/exec_command');?>
  <div class="form-group">    
    <label class="col-sm-12 control-label"><?php echo $this->lang->line('debug_command_input')?></label>
    <div class="col-sm-10">
      <input type="text" name="command" class="form-control" value="">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-2">
      <button type="submit" class="btn btn-primary btn-sm"><?php echo $this->lang->line('debug_command_execute')?></button>
    </div>
  </div>
</from>