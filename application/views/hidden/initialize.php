<?php echo form_open('hidden/exec_initialize');?>
<center>
    <input name="submit" type="submit" value='<?php echo $this->lang->line('initialize_clear_energy')?>'>
<center>
</from>
<br>
<center>
<?php
if(strlen($result))
{
    if($result == 0)
        echo $this->lang->line('initialize_success');
    else
        echo $this->lang->line('initialize_failed');
}
?>
<center>
