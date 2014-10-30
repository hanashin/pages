<table class="table table-condensed table-striped table-hover">
  <thead>
    <tr>
      <th><?php echo $this->lang->line('maxpower_inverter_id')?></th>
      <th><?php echo $this->lang->line('maxpower_maxpower')?></th>
      <th><?php echo $this->lang->line('maxpower_actual_maxpower')?></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php 
      foreach ($ids as $key => $value) 
      {
        echo form_open('configuration/set_maxpower');
        echo "<tr>";
        echo "<td>".$value['id']."</td>";
        echo "<input type=\"hidden\" name=\"id\" value=\"".$value['id']."\" >";
        echo "<td><input type=\"text\" name=\"maxpower\" value=\"".$value['limitedpower']."\" >W</td>";
        echo "<td>".$value['limitedresult']."</td>";
        echo "<td><button type=\"submit\" class=\"btn btn-default btn-sm\">".$this->lang->line('button_save')."</button></td>";
        echo "</tr>";
        echo "</form>";
      }
    ?>
  </tbody>
</table>
<br>
<center>
  <?php echo $this->lang->line("maxpower_result_$result")?>
</center>