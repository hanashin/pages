<table class="table table-condensed table-striped">
  <tr>
    <th scope="row"><?php echo $this->lang->line('home_ecuid')?></th>
    <td><?php echo "$ecuid";?></td>
  </tr>
  <tr>
    <th scope="row"><?php echo $this->lang->line('home_lifetimepower')?></th>
    <td><?php echo "$lifetimepower kWh";?></td>
  </tr>
  <tr>
    <th scope="row"><?php echo $this->lang->line('home_systemp')?></th>
    <td><?php echo "$systemp W";?></td>
  </tr>
  <tr>
    <th scope="row"><?php echo $this->lang->line('home_todaypower')?></th>
    <td><?php echo "$todaypower kWh";?></td>
  </tr>
  <tr>
    <th scope="row"><?php echo $this->lang->line('home_datetime')?></th>
    <td><?php echo "$datetime";?></td>
  </tr>
  <tr>
    <th scope="row"><?php echo $this->lang->line('home_maxnum')?></th>
    <td><?php echo "$maxnum";?></td>
  </tr>
  <tr>
    <th scope="row"><?php echo $this->lang->line('home_curnum')?></th>
    <td><?php echo "$curnum";?></td>
  </tr>
  <tr>
    <th scope="row"><?php echo $this->lang->line('home_version')?></th>
    <td><?php echo "$version"; ?></td>
  </tr>
  <tr>
    <th scope="row"><?php echo $this->lang->line('home_file_size')?></th>
    <td><?php echo "$file_size kB";?></td>
  </tr>
  <tr>
    <th scope="row"><?php echo $this->lang->line('home_timezone')?></th>
    <td><?php echo "$timezone"; ?></td>
  </tr>
  <tr>
    <th scope="row"><?php echo $this->lang->line('home_mac')?></th>
    <td><?php echo "$mac";?></td>
  </tr>
  <tr>
    <th scope="row"><?php echo $this->lang->line('home_grid_quality')?></th>
    <td><?php echo "$grid_quality";?></td>
  </tr>
</table>

<script>
function myrefresh(){
   window.location.reload();
}
setTimeout('myrefresh()',300000); //指定5分钟刷新一次
</script>