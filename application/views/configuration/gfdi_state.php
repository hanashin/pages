<!-- 载入表单辅助函数创建一个开始form标签 -->
<?php echo form_open('configuration/set_gfdi_state');?>
  <table class="table table-condensed table-striped table-hover">
    <thead>
      <tr>
        <th><?php echo $this->lang->line('gfdi_inverter_id')?></th>
        <th><?php echo $this->lang->line('gfdi_state')?></th>
        <th><?php echo $this->lang->line('gfdi_clear')?></th>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach ($ids as $key => $value) 
      {
        echo "<tr>";
        echo "<td>".$value."</td>";
        echo "<td>".$gfdi_state[$key]."</td>";
        echo "<td><input type=\"checkbox\" name=\"ids[]\" value=\"".$value."\"></td>";
        echo "</tr>";
      }
    ?>
    </tbody>
  </table>
    <div class="form-group">
      <div class="col-sm-offset-5 col-sm-2">
        <button type="submit" class="btn btn-default"><?php echo $this->lang->line('gfdi_clear')?></button>
      </div>
    </div>
</form>
<div class="col-sm-12">
  <br>
</div>
<div class="col-sm-12">
  <center>
    <?php echo $this->lang->line("gfdi_result_$result")?>
  </center>
</div>


