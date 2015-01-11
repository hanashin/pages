<form class="form-horizontal" id="defaultForm" action="<?php echo base_url('index.php/hidden/exec_export_file');?>" method="post">
  <div class="form-group">    
    <label for="start_time" class="col-sm-5 control-label"><?php echo $this->lang->line('export_file_start_time')?></label>
    <div class="col-sm-4">
      <input type="text" name="start_time" class="form-control" id="start_time" value="<?php echo $start_time;?>">
    </div>
  </div>
  <div class="form-group">    
    <label for="end_time" class="col-sm-5 control-label"><?php echo $this->lang->line('export_file_end_time')?></label>
    <div class="col-sm-4">
      <input type="text" name="end_time" class="form-control" id="end_time" value="<?php echo $end_time;?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-5 col-sm-2">
      <button class="btn btn-primary btn-sm" type="submit"><?php echo $this->lang->line('export_file_export')?></button>
    </div>
  </div>
</form>

<script>
$(document).ready(function() {
	//表单验证
    $('#defaultForm').bootstrapValidator({
        fields: {
        	start_time: {
                validators: {
                    notEmpty: {
                        message: '<?php echo $this->lang->line('validform_null_datetime')?>'
                    },
                    date: {
                        format: 'YYYY/MM/DD h:m:s',
                        message: '<?php echo $this->lang->line('validform_datetime')?>'
                    }
                }
            },
            end_time: {
                validators: {
                    notEmpty: {
                        message: '<?php echo $this->lang->line('validform_null_datetime')?>'
                    },
                    date: {
                        format: 'YYYY/MM/DD h:m:s',
                        message: '<?php echo $this->lang->line('validform_datetime')?>'
                    },
                }
            },
        }
    });
});
</script>