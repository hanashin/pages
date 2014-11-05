 <?php
  if(!empty($result)){
    if(!strncmp($result, "success", 7)){
      echo "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">"."\n";
      echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>"."\n";
      echo "<strong>".$this->lang->line("message_success")."&nbsp;!&nbsp;&nbsp;</strong>".$this->lang->line("user_info_result_$result")."\n";
      echo "</div>"."\n";
    }
    else{
      echo "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\">"."\n";
      echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>"."\n";
      echo "<strong>".$this->lang->line("message_warning")."&nbsp;!&nbsp;&nbsp;</strong>".$this->lang->line("user_info_result_$result")."\n";
      echo "</div>"."\n";
    }
  }
?>
<form id="defaultForm" method="post" action="<?php echo base_url('index.php/management/set_user_info');?>" class="form-horizontal" role="form">

  <div class="form-group">    
    <label for="inputdata1" class="col-sm-5 control-label"><?php echo $this->lang->line('user_info_username')?></label>
    <div class="col-sm-4">
      <input type="text" name="username" class="form-control" id="inputdata1" value="">
    </div>
  </div>

  <div class="form-group">    
    <label for="inputdata2" class="col-sm-5 control-label"><?php echo $this->lang->line('user_info_old_password')?></label>
    <div class="col-sm-4">
      <input type="password" name="old_password" class="form-control" id="inputdata2" value="">
    </div>
  </div>

  <div class="form-group">    
    <label for="inputdata3" class="col-sm-5 control-label"><?php echo $this->lang->line('user_info_new_password')?></label>
    <div class="col-sm-4">
      <input type="password" name="new_password" class="form-control" id="inputdata3" value="">
    </div>
  </div>

  <div class="form-group">    
    <label for="inputdata4" class="col-sm-5 control-label"><?php echo $this->lang->line('user_info_confirm_password')?></label>
    <div class="col-sm-4">
      <input type="password" name="confirm_password" class="form-control" id="inputdata4" value="">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-5 col-sm-2">
      <button type="submit" class="btn btn-primary btn-sm"><?php echo $this->lang->line('button_update')?></button>
    </div>
  </div>
</form>

<script>
$(document).ready(function() {
    $('#defaultForm').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: '<?php echo $this->lang->line('validform_null_username')?>'
                    },
                    stringLength: {
                        min: 4,
                        max: 18,
                        message: '<?php echo $this->lang->line('validform_username')?>'
                    }
                }
            },
            old_password: {
                message: 'The old_password is not valid',
                validators: {
                    notEmpty: {
                        message: '<?php echo $this->lang->line('validform_null_old_password')?>'
                    },
                    stringLength: {
                        min: 6,
                        max: 18,
                        message: '<?php echo $this->lang->line('validform_old_password')?>'
                    }
                }
            },
            new_password: {
                message: 'The new_password is not valid',
                validators: {
                    notEmpty: {
                        message: '<?php echo $this->lang->line('validform_null_new_password')?>'
                    },
                    stringLength: {
                        min: 6,
                        max: 18,
                        message: '<?php echo $this->lang->line('validform_new_password')?>'
                    }
                }
            },
            confirm_password: {
                message: 'The confirm_password is not valid',
                validators: {
                    notEmpty: {
                        message: '<?php echo $this->lang->line('validform_null_confirm_password')?>'
                    },
                    identical: {
                        field: 'new_password',
                        message: '<?php echo $this->lang->line('validform_confirm_password')?>'
                    }
                }
            }
        }
    });
});
</script>