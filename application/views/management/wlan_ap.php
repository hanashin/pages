
<form method="post" action="<?php echo base_url('index.php/management/set_wlan_mode');?>" class="form-horizontal" role="form">
  <fieldset>
    <legend><?php echo $this->lang->line('wlan_mode')?></legend>

    <div class="form-group">    
      <div class="col-xs-6">
         <p class="form-control-static"><?php echo $this->lang->line('wlan_mode_ap')?></p>
      </div>
      <div class="col-xs-4">
         <p class="form-control-static"><?php echo $this->lang->line("wlan_ifconnect_$ifopen")?></p>
      </div>
      <div class="col-sm-2">
        <input name="mode" type="hidden" value=2>
        <button type="submit" class="btn btn-default btn-sm"><?php echo $this->lang->line('wlan_change_mode')?></button>
      </div>
    </div>
  </fieldset>
</form>

<form method="post" action="<?php echo base_url('index.php/management/set_wlan_ap');?>" class="form-horizontal" role="form">
  <?php
    //当前连接状态
    if ($ifopen) {
      echo "<fieldset>
              <legend>".$this->lang->line('wlan_state')."</legend>

              <div class=\"form-group\">    
                <div class=\"col-xs-6\">
                   <p class=\"form-control-static\">".$ssid."</p>
                </div>
                <div class=\"col-xs-4\">
                   <p class=\"form-control-static\">".$ip."</p>
                </div>
                <div class=\"col-sm-2\">
                  <button type=\"submit\" class=\"btn btn-default btn-sm\">".$this->lang->line('wlan_sta_disconnect')."</button>
                </div>
              </div>
            </fieldset>";
     } 
  ?>
</form>

<form id="defaultForm" method="post" action="<?php echo base_url('index.php/management/set_wlan_ap');?>" class="form-horizontal" role="form">
  <fieldset>
    <legend>Setting AP</legend>

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
      <button type="submit" class="btn btn-default"><?php echo $this->lang->line('protection_setting')?></button>
    </div>
  </div>
</form>
<center>
  <?php echo $this->lang->line("wlan_result_$result");?>
</center>

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