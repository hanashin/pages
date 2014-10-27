<form method="post" action="<?php echo base_url('index.php/management/set_gprs');?>" class="form-horizontal" role="form">
  <fieldset>
    <legend><?php echo $this->lang->line('network_set_gprs')?></legend>

    <div class="form-group">    
      <div class="col-sm-4">
        <input type='checkbox' name="gprs" value="1"<?php 
                        if ($gprs==1){
                            echo "checked='checked'";
                    }?>><?php echo $this->lang->line('network_use_gprs')?>
      </div>
    </div>
  </fieldset>

  <div class="form-group">
    <div class="col-sm-offset-5 col-sm-2">
      <button type="submit" class="btn btn-default"><?php echo $this->lang->line('network_update_gprs')?></button>
    </div>
  </div>
</form>

<form id="defaultForm" method="post" action="<?php echo base_url('index.php/management/set_ip');?>" class="form-horizontal" role="form">
  <fieldset>
    <legend><?php echo $this->lang->line('network_set_ip')?></legend>

    <div class="form-group">    
      <div class="col-sm-4">
        <input type='radio' name="dhcp" value="1" onclick="setip(this.value)"<?php
                        if ($dhcp==1){
                            echo "checked='checked'";
                        }
                    ?>><?php echo $this->lang->line('network_use_dhcp')?>
      </div>
    </div>

    <div class="form-group">    
      <div class="col-sm-4">
        <input type='radio' name="dhcp" value="0" onclick="setip(this.value)"<?php
                        if ($dhcp==0){
                            echo "checked='checked'";
                        }
                    ?>><?php echo $this->lang->line('network_use_static_ip')?>
      </div>
    </div>
  </fieldset>

  <fieldset id="network_ip" <?php if($dhcp==1){echo "style=\"display:none;\"";}?>>
    <div class="form-group">
      <label for="inputdata1" class="col-sm-4 control-label"><?php echo $this->lang->line('network_ip_address')?></label>
      <div class="col-sm-4">
        <input type="text" name="ip" class="form-control" id="inputdata1" placeholder="<?php echo $ip;?>">
      </div>
    </div>

    <div class="form-group">
      <label for="inputdata2" class="col-sm-4 control-label"><?php echo $this->lang->line('network_subnet_mask')?></label>
      <div class="col-sm-4">
        <input type="text" name="mask" class="form-control" id="inputdata2" placeholder="<?php echo $mask;?>">
      </div>
    </div>

    <div class="form-group">
      <label for="inputdata3" class="col-sm-4 control-label"><?php echo $this->lang->line('network_default_gateway')?></label>
      <div class="col-sm-4">
        <input type="text" name="gate" class="form-control" id="inputdata3" placeholder="<?php echo $gate;?>">
      </div>
    </div>

    <div class="form-group">
      <label for="inputdata4" class="col-sm-4 control-label"><?php echo $this->lang->line('network_preferred_dns_server')?></label>
      <div class="col-sm-4">
        <input type="text" name="dns1" class="form-control" id="inputdata4" placeholder="<?php echo $dns1;?>">
      </div>
    </div>

    <div class="form-group">
      <label for="inputdata5" class="col-sm-4 control-label"><?php echo $this->lang->line('network_alternate_dns_server')?></label>
      <div class="col-sm-4">
        <input type="text" name="dns2" class="form-control" id="inputdata5" placeholder="<?php echo $dns2;?>">
      </div>
    </div>
  </fieldset>

  <div class="form-group">
    <div class="col-sm-offset-5 col-sm-2">
      <button type="submit" name="dhcp_submit" class="btn btn-default"><?php echo $this->lang->line('network_update_ip')?></button>
    </div>
  </div>
</form>
<br>
<center>
    <?php echo $this->lang->line("network_result_$result")?>
</center>

<script>
    function setip(value) { 
        if (value == 1){
            document.getElementById('network_ip').style.display= 'none'; 
        }
        if (value == 0) 
            document.getElementById('network_ip').style.display= ''; 
    }
</script>
<script>
$(document).ready(function() {
    $('#defaultForm').bootstrapValidator({
        fields: {
            ip: {
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
            mask: {
                validators: {
                    notEmpty: {
                        message: '<?php echo $this->lang->line('validform_null_subnet_mask')?>'
                    },
                    stringLength: {
                        max: 16,
                        message: 'The input string must be less than 16 characters long'
                    },
                    ip: {
                        message: '<?php echo $this->lang->line('validform_subnet_mask')?>'
                    }
                }
            },
            gate: {
                validators: {
                    notEmpty: {
                        message: '<?php echo $this->lang->line('validform_null_default_gateway')?>'
                    },
                    stringLength: {
                        max: 16,
                        message: 'The input string must be less than 16 characters long'
                    },
                    ip: {
                        message: '<?php echo $this->lang->line('validform_default_gateway')?>'
                    }
                }
            },
            dns1: {
                validators: {
                    notEmpty: {
                        message: '<?php echo $this->lang->line('validform_null_preferred_dns_server')?>'
                    },
                    stringLength: {
                        max: 16,
                        message: 'The input string must be less than 16 characters long'
                    },
                    ip: {
                        message: '<?php echo $this->lang->line('validform_preferred_dns_server')?>'
                    }
                }
            },
            dns2: {
                validators: {
                    stringLength: {
                        max: 16,
                        message: 'The input string must be less than 16 characters long'
                    },
                    ip: {
                        message: '<?php echo $this->lang->line('validform_alternate_dns_server')?>'
                    }
                }
            },
        }
    });
    // $('input[name="dhcp"]').on('change', function() {
    //     var bootstrapValidator = $('#defaultForm').data('bootstrapValidator'),
    //         shipNetwork_ip     = ($(this).val() == '1');

    //     shipNetwork_ip ? $('#network_ip').find('.btn-default').removeAttr('disabled')
    //                    : $('#network_ip').find('.btn-default').attr('disabled', 'disabled');

    //     bootstrapValidator.enableFieldValidators('dhcp_submit', shipNetwork_ip);
    //     alert(shipNetwork_ip);
    // });
});
</script>