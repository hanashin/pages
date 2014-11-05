<?php
  if(!empty($result)){
    if(!strncmp($result, "success", 7)){
      echo "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">"."\n";
      echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>"."\n";
      echo "<strong>".$this->lang->line("message_success")."&nbsp;!&nbsp;&nbsp;</strong>".$this->lang->line("updatecenter_result_$result")."\n";
      echo "</div>"."\n";
    }
    else{
      echo "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\">"."\n";
      echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>"."\n";
      echo "<strong>".$this->lang->line("message_warning")."&nbsp;!&nbsp;&nbsp;</strong>".$this->lang->line("updatecenter_result_$result")."\n";
      echo "</div>"."\n";
    }
  }
?>
<form id="defaultForm" method="post" action="<?php echo base_url('index.php/hidden/set_updatecenter');?>" class="form-horizontal" role="form">
  <div class="form-group">    
    <label for="inputdata1" class="col-sm-5 control-label"><?php echo $this->lang->line('updatecenter_domain')?></label>
    <div class="col-sm-4">
      <input type="text" name="domain" class="form-control" id="inputdata1" value="<?php echo $domain;?>">
    </div>
  </div>

  <div class="form-group">    
    <label for="inputdata2" class="col-sm-5 control-label"><?php echo $this->lang->line('updatecenter_ip')?></label>
    <div class="col-sm-4">
      <input type="text" name="ip" class="form-control" id="inputdata2" value="<?php echo $ip;?>">
    </div>
  </div>

  <div class="form-group">    
    <label for="inputdata3" class="col-sm-5 control-label"><?php echo $this->lang->line('updatecenter_port')?></label>
    <div class="col-sm-4">
      <input type="text" name="port" class="form-control" id="inputdata3" value="<?php echo $port;?>">
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
            domain: {
                message: 'The domain is not valid',
                validators: {
                    notEmpty: {
                        message: '<?php echo $this->lang->line('validform_null_domain')?>'
                    },
                    stringLength: {
                        max: 16,
                        message: 'The input string must be less than 16 characters long'
                    },
                    regexp: {
                        regexp: /\w*\.\w+$/,
                        message: '<?php echo $this->lang->line('validform_domain')?>'
                    }
                }
            },
            ip: {
                message: 'The ip is not valid',
                validators: {
                    notEmpty: {
                        message: '<?php echo $this->lang->line('validform_null_ip_address')?>'
                    },
                    stringLength: {
                        max: 16,
                        message: 'The input string must be less than 16 characters long'
                    },
                    ip: {
                        message: '<?php echo $this->lang->line('validform_ip_address')?>'
                    }
                }
            },
            port: {
                message: 'The port1 is not valid',
                validators: {
                    notEmpty: {
                        message: '<?php echo $this->lang->line('validform_null_port')?>'
                    },
                    stringLength: {
                        max: 16,
                        message: 'The input string must be less than 16 characters long'
                    },
                    regexp: {
                        regexp: /^(\d{1,4}|([1-5]\d{4})|([1-6][0-4]\d{3})|([1-6][0-5][0-4]\d{2})|([1-6][0-5][0-5][0-2]\d)|([1-6][0-5][0-5][0-3][0-5]))$/,
                        message: '<?php echo $this->lang->line('validform_port')?>'
                    }
                }
            }
        }
    });
});
</script>