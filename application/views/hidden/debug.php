
<?php echo form_open('hidden/exec_command');?>
    <table class="table">
        <thead>
          <tr>
            <th><?php echo $this->lang->line('debug_command_input')?></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
                <input type="text" size=100 name="command">
            </td>
          </tr>
        </tbody>
    </table>
    <center>
        <input name="submit" type="submit" value='<?php echo $this->lang->line('debug_command_execute')?>'>
    <center>
</from>
<br>
<center>
<?php
if(strlen($result))
{
    if(!strncmp($result, "empty", 5))
        echo $this->lang->line('debug_command_is_null');
    else if($result == 0)
        echo $this->lang->line('debug_command_success');
    else
        echo $this->lang->line('debug_command_failed')." : $result";
}
?>
<center>