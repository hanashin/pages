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
    <legend><?php echo $this->lang->line('wlan_mode_sta')?>
      <div class="btn-group">
        <input name="mode" type="hidden" value=1>
        <button type="submit" class="btn btn-default btn-xs"><?php echo $this->lang->line('wlan_change_mode')?></button>
      </div>
    </legend>
</form>

<form method="post" action="<?php echo base_url('index.php/management/set_wlan_sta');?>" class="form-horizontal" role="form">
    <div class="form-group">
      <label class="col-sm-4 control-label"><?php echo $this->lang->line('wlan_state')?></label>
      <div class="col-sm-4">
        <p class="form-control-static"><?php echo $this->lang->line("wlan_ifconnect_$ifconnect")?></p>
      </div>
    </div>
    <?php
    //当前连接状态
      if ($ifconnect) {
      echo "<input name=\"ifconnect\" type=\"hidden\" value=\"1\">";
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
            </div>
            <div class=\"form-group\">
              <div class=\"col-sm-offset-4 col-sm-2\">
                <button type=\"submit\" class=\"btn btn-primary btn-sm\">".$this->lang->line('wlan_sta_disconnect')."</button>
              </div>
            </div>";
      } 
    ?>
  </fieldset>
</form>

<form method="post" action="<?php echo base_url('index.php/management/set_wlan_sta');?>" class="form-horizontal" role="form">

  <fieldset class="table_wlan">
    <legend><?php echo $this->lang->line('wlan_sta_signals')?></legend>

    <table class="table table-condensed table-striped table-hover">
        <tbody>
        <?php          
            if($num > 0)
            {
                foreach ($wifi_signals as $key => $value) 
                {
                    echo "<tr>";                     
                    //显示SSID
                    echo "<td><input type=\"radio\" name=\"ssid_id\" value=\"$key\" onclick=\"show_key(this)\">&nbsp;&nbsp;{$value['ssid']}</td>\n";

                    //显示信号强度
                    echo "<td>";
                    for($i=0; $i<($value['quality']+5)/10+1; $i++)
                    {
                      if($i>9)break;
                      echo "|";
                    }
                    echo "</td>\n";  
                     //隐藏项
                    echo "<td>\n";
                    echo "<input name=\"ssid$key\" type=\"hidden\" value=\"".$value['ssid']."\">\n";
                    echo "<input name=\"ifkey$key\" type=\"hidden\" value=\"".$value['ifkey']."\">\n";
                    echo "<input name=\"group$key\" type=\"hidden\" value=\"".$value['group']."\">\n";
                    echo "</td>\n";
                    echo "</tr>\n";
                   
                    //显示密码框                 
                    echo "<tr name=\"show_key\" style=\"display:none;\">";
                    echo "<td colspan=\"3\">";
                    echo "<div class=\"col-sm-6\">\n";
                    echo "<div class=\"input-group\">\n";
                    if($value['ifkey'])
                    {
                      if($value['ssid'] == $ssid){
                        echo "<input name=\"ifconnect$key\" type=\"hidden\" value=\"1\">";
                        echo "<button type=\"submit\" class=\"btn btn-default btn-sm\">".$this->lang->line('wlan_sta_disconnect')."</button>\n";
                      }
                      else{
                        echo "<input name=\"ifconnect$key\" type=\"hidden\" value=\"0\">";
                        echo "<input type=\"password\" name=\"psk$key\" class=\"form-control input-sm\">\n";
                        echo "<span class=\"input-group-btn\">\n";
                        echo "<button type=\"submit\" class=\"btn btn-default btn-sm\">".$this->lang->line('wlan_sta_connect')."</button>\n";
                      }
                      echo "</span>\n";
                    }
                    else
                    {
                      echo "<input name=\"ifconnect$key\" type=\"hidden\" value=\"0\">";                
                      echo "<button type=\"submit\" class=\"btn btn-default btn-sm\">".$this->lang->line('wlan_sta_connect')."</button>\n";                         
                    }
                    echo "</div>\n";
                    echo "</div>\n";
                    echo "</td>";                         
                    echo "</tr>\n";
                }
            }
        ?>
        </tbody>        
    </table>
  </fieldset>
</form>

<script>
     var tempradio = null;   
    function show_key(checkedRadio) {
        var key = document.getElementsByName("show_key"); 
        for(i=0;i<key.length;i++){
            key[i].style.display= 'none'; 
        }
        if(tempradio == checkedRadio)
        {  
            tempradio.checked = false;  
            tempradio = null;  
        }   
        else
        {  
            tempradio= checkedRadio;
            key[checkedRadio.value].style.display= '';
        }        
    }
</script>