<!-- Modal 切换路由模式 -->
<div class="modal fade" id="change_mode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('wlan_change_to_sta_mode')?></h4>
      </div>
      <div class="modal-body"><?php echo $this->lang->line('wlan_reboot')?>
      </div>
      <div class="modal-footer">
        <form method="post" action="<?php echo base_url('index.php/management/set_wlan_mode');?>" class="form-horizontal" role="form">
          <input name="mode" type="hidden" value=2>
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><?php echo $this->lang->line('button_cancel')?></button>
          <button type="submit" class="btn btn-primary btn-sm"><?php echo $this->lang->line('button_ok')?></button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
  if(!empty($result)){
    if(!strncmp($result, "success", 7)){
      echo "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">"."\n";
      echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>"."\n";
      echo "<strong>".$this->lang->line("message_success")."&nbsp;!&nbsp;&nbsp;</strong>".$this->lang->line("wlan_result_$result")."\n";
      echo "</div>"."\n";
    }
    else{
      echo "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\">"."\n";
      echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>"."\n";
      echo "<strong>".$this->lang->line("message_warning")."&nbsp;!&nbsp;&nbsp;</strong>".$this->lang->line("wlan_result_$result")."\n";
      echo "</div>"."\n";
    }
  }
?>
<form method="post" action="<?php echo base_url('index.php/management/set_wlan_mode');?>" class="form-horizontal" role="form">
  <fieldset>
    <legend><?php echo $this->lang->line('wlan_mode_ap')?>
      <div class="btn-group">
        <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#change_mode"  data-backdrop="static"><?php echo $this->lang->line('wlan_change_to_sta_mode')?></button>
      </div>
    </legend>

    <div class="form-group">
      <label class="col-sm-4 control-label"><?php echo $this->lang->line('wlan_state')?></label>
      <div class="col-sm-4">
        <p class="form-control-static"><?php echo $this->lang->line("wlan_ifopen_$ifopen")?></p>
      </div>
    </div>
    <?php
    //当前连接状态
      if ($ifopen) {
      echo "<div class=\"form-group\">
              <label class=\"col-sm-4 control-label\">".$this->lang->line('wlan_ssid')."</label>
              <div class=\"col-sm-4\">
                <p class=\"form-control-static\">".$ssid."</p>
              </div>
            </div>
            <div class=\"form-group\">
              <label class=\"col-sm-4 control-label\">".$this->lang->line('wlan_ip_address')."</label>
              <div class=\"col-sm-4\">
                <p class=\"form-control-static\">".$ip."</p>
              </div>
            </div>";
      } 
    ?>
<!--             <div class=\"form-group\">
              <div class=\"col-sm-offset-4 col-sm-2\">
                <button type=\"submit\" class=\"btn btn-default\">".$this->lang->line('wlan_sta_disconnect')."</button>
              </div>
            </div> -->
  </fieldset>
</form>

<form id="defaultForm" method="post" action="<?php echo base_url('index.php/management/set_wlan_ap');?>" class="form-horizontal" role="form">
  <fieldset>
    <legend><?php echo $this->lang->line('wlan_ap_setting')?></legend>

    <div class="form-group">
      <label for="inputdata1" class="col-sm-4 control-label"><?php echo $this->lang->line('wlan_ap_ssid')?></label>
      <div class="col-sm-4">
        <input type="text" name="SSID" class="form-control" id="inputdata1" value="<?php echo $ap_info['ssid'];?>">
      </div>
    </div>

    <div class="form-group">
      <label for="inputdata2" class="col-sm-4 control-label"><?php echo $this->lang->line('wlan_ap_channel')?></label>
      <div class="col-sm-4">
        <select name="channel" class="form-control" id="inputdata2">
			<?php
				if($ap_info['channel'] == 0)
					echo "<option value=0 selected=\"selected\">".$this->lang->line('wlan_ap_channel_auto')."</option>";
				else
					echo "<option value=0 >".$this->lang->line('wlan_ap_channel_auto')."</option>";
				for($i=1; $i<=13; $i++)
				{
					if($ap_info['channel'] == $i)
						echo "<option value=".$i." selected=\"selected\">".$i."</option>";
					else
						echo "<option value=".$i.">".$i."</option>";
				}
			?>						
	    </select>
      </div>
    </div>

    <div class="form-group">
      <label for="inputdata3" class="col-sm-4 control-label"><?php echo $this->lang->line('wlan_ap_method')?></label>
      <div class="col-sm-4">
		<select name="method" class="form-control" id="inputdata3" onchange="show_password(this.value)">
		  	<?php
		  		if($ap_info['method'] == 2)
		  			echo "<option value=0>NONE</option>
						  <option value=1>WEP</option>
						  <option value=2 selected=\"selected\">WPA2-PSK</option>";
				else if($ap_info['method'] == 1)
					echo "<option value=0>NONE</option>
						  <option value=1 selected=\"selected\">WEP</option>
						  <option value=2>WPA2-PSK</option>";
				else
					echo "<option value=0 selected=\"selected\">NONE</option>
						  <option value=1>WEP</option>
						  <option value=2>WPA2-PSK</option>";
		  	?>
	  </select>
      </div>
    </div>

    <div class="form-group" id="password_wep" <?php if($ap_info['method'] == 0 | $ap_info['method'] == 2){echo "style=\"display:none;\"";}?>>
      <label for="inputdata4" class="col-sm-4 control-label"><?php echo $this->lang->line('wlan_ap_password')?></label>
      <div class="col-sm-4">
        <input type="text" name="psk_wep" class="form-control" id="inputdata4" placeholder="<?php echo $ap_info['psk'];?>">
      </div>
    </div>

    <div class="form-group" id="password_wpa" <?php if($ap_info['method'] == 0 | $ap_info['method'] == 1){echo "style=\"display:none;\"";}?>>
      <label for="inputdata5" class="col-sm-4 control-label"><?php echo $this->lang->line('wlan_ap_password')?></label>
      <div class="col-sm-4">
        <input type="text" name="psk_wpa" class="form-control" id="inputdata5" placeholder="<?php echo $ap_info['psk'];?>">
      </div>
    </div>
  </fieldset>

  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-2">
      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#change_ap"><?php echo $this->lang->line('button_save')?></button>
    </div>
  </div>
    
    <!-- Modal 修改AP模式信息 -->
    <div class="modal fade" id="change_ap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('wlan_ap_setting')?></h4>
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
    function show_password(value) { 
        if (value == 0){
            document.getElementById('password_wep').style.display= 'none';
            document.getElementById('password_wpa').style.display= 'none';
        } 
        else if(value == 1){
        	document.getElementById('password_wep').style.display= ''; 
        	document.getElementById('password_wpa').style.display= 'none'; 
        }
        else if(value == 2){
        	document.getElementById('password_wep').style.display= 'none'; 
        	document.getElementById('password_wpa').style.display= ''; 
        }
    }
</script>
<script>
  $(document).ready(function() {
    $('#defaultForm').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
            SSID: {
                validators: {
                	notEmpty: {
                        message: '<?php echo $this->lang->line('validform_null_ap_ssid')?>'
                    },
                    stringLength: {
                    	  min: 4,
                        max: 18,
                        message: '<?php echo $this->lang->line('validform_ap_ssid')?>'
                    },
                    // regexp: {
                    //     regexp: /^[a-zA-Z0-9_\.]+$/,
                    //     message: 'The username can only consist of alphabetical, number, dot and underscore'
                    // }
                }
            },
            psk_wep: {
                validators: {
                	notEmpty: {
                        message: '<?php echo $this->lang->line('validform_null_ap_password')?>'
                    },
                    regexp: {
                        regexp: /^\d{5}$|^\d{13}$/,
                        message: '<?php echo $this->lang->line('validform_ap_password_wep')?>'
                    }
                }
            },
            psk_wpa: {
                validators: {
                  notEmpty: {
                        message: '<?php echo $this->lang->line('validform_null_ap_password')?>'
                    },
                    stringLength: {
                        min: 8,
                        max: 18,
                        message: '<?php echo $this->lang->line('validform_ap_password_wpa')?>'
                    },
                    // regexp: {
                    //     regexp: /^[a-zA-Z0-9_\.]+$/,
                    //     message: 'The username can only consist of alphabetical, number, dot and underscore'
                    // }
                }
            }
        }
    });
});
</script>