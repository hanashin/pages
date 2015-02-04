<!-- 设置结果显示框 -->
<div class="alert alert-success" id="result">
    <button class="close" type="button"><span aria-hidden="true">&times;</span></button>
    <strong></strong><small></small>
</div>

<!-- 设置GPRS -->
<form class="form-horizontal">
<fieldset>
    <legend><?php echo $this->lang->line('network_set_gprs')?></legend>   

    <div class="form-group">    
      <div class="col-sm-4 col-sm-offset-4">
        <input id="gprs_status" type="checkbox" name="gprs" 
        <?php 
            if ($gprs==1){
                echo "checked='checked'";
            }
        ?>>
        <?php echo $this->lang->line('network_use_gprs')?>
      </div>
    </div>
  </fieldset>

  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-2">
      <button class="btn btn-primary btn-sm" id="button_update_gprs" type="button"><?php echo $this->lang->line('button_update')?></button>
    </div>
  </div>
</form>

<!-- 设置IP地址 -->
<form id="defaultForm" method="post" action="<?php echo base_url('index.php/management/set_ip');?>" class="form-horizontal" role="form">
  <fieldset>
    <legend><?php echo $this->lang->line('network_set_ip')?></legend>

    <div class="form-group">    
      <div class="col-sm-8 col-sm-offset-4">
        <input type='radio' name="dhcp" value="1" onclick="setip(this.value)"<?php
                        if ($dhcp==1){
                            echo "checked='checked'";
                        }
                    ?>> <?php echo $this->lang->line('network_use_dhcp')?>
      </div>
    </div>

    <div class="form-group">    
      <div class="col-sm-8 col-sm-offset-4">
        <input type='radio' name="dhcp" value="0" onclick="setip(this.value)"<?php
                        if ($dhcp==0){
                            echo "checked='checked'";
                        }
                    ?>> <?php echo $this->lang->line('network_use_static_ip')?>
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
    <div class="col-sm-offset-4 col-sm-2">
      <button type="button" name="dhcp_submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#change_ip"><?php echo $this->lang->line('button_update')?></button>
    </div>
  </div>
  
    <!-- Modal 修改IP -->
    <div class="modal fade" id="change_ip" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('network_set_ip')?></h4>
          </div>
          <div class="modal-body"><?php echo $this->lang->line('wlan_reboot')?></div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><?php echo $this->lang->line('button_cancel')?></button>
              <button type="submit" class="btn btn-primary btn-sm"><?php echo $this->lang->line('button_ok')?></button>
          </div>
        </div>
      </div>
    </div>
    
</form>

<script>
    function setip(value) { 
        if (value == 1){
            document.getElementById('network_ip').style.display= 'none'; 
        }
        if (value == 0) 
            document.getElementById('network_ip').style.display= ''; 
    }

$(document).ready(function() {	

	//隐藏设置结果栏
	$("#result").hide();
	$(".close").click(function(){
		$("#result").hide();
    }); 
	
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

    //设置GPRS
    $("#button_update_gprs").click(function(){
    	$("#result").hide();
    	
	    $.ajax({
    		url : "<?php echo base_url('index.php/management/set_gprs');?>",
    		type : "post",
            dataType : "json",
    		data: "gprs=" + $('#gprs_status').is(':checked'),
  	    	success : function(Results){
                if(Results.value == 0){
  	                $("#result").removeClass().addClass("alert alert-success");
  	                $("#result strong").text("<?php echo $this->lang->line('message_success')?>" + "：");  
  	            }
                else{
                    $("#result").removeClass().addClass("alert alert-warning");
                    $("#result strong").text("<?php echo $this->lang->line('message_warning')?>" + "：");  
                }
                $("#result small").text(Results.message);        		 
            	$("#result").show();
    		},
  	    	error : function(){
  	    		alert("Error");
  	    	}
        })
        window.scrollTo(0,0);//页面置顶
    });
    
    //设置IP
    $("#button_update_gprs").click(function(){
    	$("#result").hide();
    	
	    $.ajax({
    		url : "<?php echo base_url('index.php/management/set_gprs');?>",
    		type : "post",
            dataType : "json",
    		data: "gprs=" + $('#gprs_status').is(':checked'),
  	    	success : function(Results){
                if(Results.value == 0){
  	                $("#result").removeClass().addClass("alert alert-success");
  	                $("#result strong").text("<?php echo $this->lang->line('message_success')?>" + "：");  
  	            }
                else{
                    $("#result").removeClass().addClass("alert alert-warning");
                    $("#result strong").text("<?php echo $this->lang->line('message_warning')?>" + "：");  
                }
                $("#result small").text(Results.message);        		 
            	$("#result").show();
    		},
  	    	error : function(){
  	    		alert("Error");
  	    	}
        })
        window.scrollTo(0,0);//页面置顶
    }); 
});
</script>