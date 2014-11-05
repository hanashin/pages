<?php
  if(!empty($result)){
    if(!strncmp($result, "success", 7)){
      echo "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">"."\n";
      echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>"."\n";
      echo "<strong>".$this->lang->line("message_success")."&nbsp;!&nbsp;&nbsp;</strong>".$this->lang->line("switch_result_$result")."\n";
      echo "</div>"."\n";
    }
    else{
      echo "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\">"."\n";
      echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>"."\n";
      echo "<strong>".$this->lang->line("message_warning")."&nbsp;!&nbsp;&nbsp;</strong>".$this->lang->line("switch_result_$result")."\n";
      echo "</div>"."\n";
    }
  }
?>

<!-- 载入表单辅助函数创建一个开始form标签 -->
<?php echo form_open('configuration/set_switch_state');?>
  <table class="table table-condensed table-striped table-hover">
    <thead>
      <tr>
        <th><?php echo $this->lang->line('switch_inverter_id')?></th>
        <th><?php echo $this->lang->line('switch_state')?></th>
        <th><?php echo $this->lang->line('switch_turn_on')?></th>
        <th><?php echo $this->lang->line('switch_turn_off')?></th>
      </tr>
    </thead>
    <tbody>
      <?php 
        foreach ($ids as $key => $value) 
        {
            echo "<tr>";
            echo "<td>".$value."</td>";
            echo "<td>".$switch_state[$key]."</td>";
            echo "<td><input type=\"radio\" name=\"ids[".$key."]\" value=\"".$value."1"."\" onclick='check(this)'></td>";
            echo "<td><input type=\"radio\" name=\"ids[".$key."]\" value=\"".$value."2"."\" onclick='check(this)'></td>";
            echo "</tr>";
        }
      ?>
    </tbody>
  </table>
  <div class="col-sm-offset-5 col-sm-4">
    <div class="btn-group">
      <button type="submit" class="btn btn-primary btn-sm"><?php echo $this->lang->line('switch_turn_on_off')?></button>
      <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <ul class="dropdown-menu" role="menu">
        <li><a href="<?php echo base_url('index.php/configuration/set_switch_all_on');?>"><?php echo $this->lang->line('switch_turn_on_all')?></a></li>
        <li><a href="<?php echo base_url('index.php/configuration/set_switch_all_off');?>"><?php echo $this->lang->line('switch_turn_off_all')?></a></li>
      </ul>
    </div>
  </div>
</form>

<script language="javascript">  
    var tempradio = null;    
    function check(checkedRadio)    
    {    
        if(tempradio == checkedRadio)
        {  
            tempradio.checked = false;  
            tempradio = null;  
        }   
        else
        {  
            tempradio= checkedRadio;    
        }  
    }    
</script>