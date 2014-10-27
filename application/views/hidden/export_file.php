<?php echo form_open('hidden/exec_export_file');?>
    <table class="table">
        <thead>
          <tr>
            <th><?php echo $this->lang->line('export_file_input')?></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
                <input type="text" size=25 name="start_time" value="<?php echo $start_time;?>"> ~ 
                <input type="text" size=25 name="end_time" value="<?php echo $end_time;?>">
            </td>
          </tr>
        </tbody>
    </table>
    <center>
        <input name="submit" type="submit" value='<?php echo $this->lang->line('export_file_export')?>'>
    <center>
</from>