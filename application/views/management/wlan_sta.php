<form method="post" action="<?php echo base_url('index.php/management/set_wlan_mode');?>" class="form-horizontal" role="form">
  <fieldset>
    <legend><?php echo $this->lang->line('wlan_mode')?></legend>

    <div class="form-group">    
      <div class="col-xs-6">
         <p class="form-control-static"><?php echo $this->lang->line('wlan_mode_sta')?></p>
      </div>
      <div class="col-xs-4">
         <p class="form-control-static"><?php echo $this->lang->line("wlan_ifconnect_$ifconnect")?></p>
      </div>
      <div class="col-sm-2">
        <input name="mode" type="hidden" value=1>
        <button type="submit" class="btn btn-default btn-sm"><?php echo $this->lang->line('wlan_change_mode')?></button>
      </div>
    </div>
  </fieldset>
</form>

<form method="post" action="<?php echo base_url('index.php/management/set_wlan_sta');?>" class="form-horizontal" role="form">  
  <?php    
    //当前连接状态
    if ($ifconnect) {
      echo "<input name=\"ifconnect\" type=\"hidden\" value=\"1\">";
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

<form method="post" action="<?php echo base_url('index.php/management/set_wlan_sta');?>" class="form-horizontal" role="form">  
  <fieldset>
    <legend>SSID AROUND</legend>

    <table class="table table-condensed">
        <thead>
                <tr>
                    <th><?php echo $this->lang->line('wlan_sta_ssid')?></th>
                    <th><?php echo $this->lang->line('wlan_sta_quality')?></th>

                </tr>
        </thead>
        <tbody>
        <?php
            echo "<input name=\"ifconnect\" type=\"hidden\" value=\"0\">";
            if($num > 0)
            {
                foreach ($wifi_signals as $key => $value) 
                {
                    if($value['ssid'] == $ssid){
                      echo "<tr name=\"show_key\" style=\"display:none;\"><td colspan=\"2\"></td></tr>\n";
                    }
                    else
                    {
                        echo "<tr>";                     
                        //隐藏项
                        echo "<input name=\"ssid$key\" type=\"hidden\" value=".$value['ssid'].">\n";
                        echo "<input name=\"ifkey$key\" type=\"hidden\" value=".$value['ifkey'].">\n";
                        echo "<input name=\"group$key\" type=\"hidden\" value=".$value['group'].">\n";

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
                        echo "</tr>\n";

                        //显示密码框                 
                        echo "<tr name=\"show_key\" style=\"display:none;\">";
                        echo "<td colspan=\"2\">";
                        echo "<div class=\"col-sm-6\">\n";
                        echo "<div class=\"input-group\">\n";
                        if($value['ifkey'])
                        {
                           echo "<input type=\"password\" name=\"psk$key\" class=\"form-control input-sm\">\n";
                           echo "<span class=\"input-group-btn\">\n";
                           echo "<button type=\"submit\" class=\"btn btn-default btn-sm\">".$this->lang->line('wlan_sta_connect')."</button>\n";
                           echo "</span>\n";
                        }
                        else
                        {                
                          echo "<button type=\"submit\" class=\"btn btn-default btn-sm\">".$this->lang->line('wlan_sta_connect')."</button>\n";                         
                        }
                        echo "</div>\n";
                        echo "</div>\n";
                        echo "</td>";                         
                        echo "</tr>\n";
                    }
                }
            }
        ?>
        </tbody>        
    </table>
  </fieldset>
</form>
    <br>
    <center>
      <?php echo $this->lang->line("wlan_result_$result");?>
    </center>

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