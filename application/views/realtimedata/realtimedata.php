<style>
.data_detail {
	display: none;
}
.caret:hover {
	cursor: pointer;
}
</style>
<div class="table-responsive">
  <table class="table table-condensed table-striped table-hover table-bordered">
    <thead>
      <tr>
        <th class="col-xs-2"><?php echo $this->lang->line('data_optimizer_id'); ?></th>
        <th class="col-xs-2"><?php echo "电压"; ?></th>
        <th class="col-xs-2"><?php echo "电流"; ?></th>
        <th class="col-xs-2"><?php echo "功率"; ?></th>
        <th class="col-xs-2"><?php echo $this->lang->line('data_temperature'); ?></th>
        <th class="col-xs-2"><?php echo $this->lang->line('data_date'); ?></th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($curdata as $key => $value): ?>
    <tr id="<?php echo $key; ?>">
        <td><?php echo $value['id']; ?> <span class="caret" onclick="show_detail(<?php echo $key; ?>)"> </span></td>
        <td><?php echo $value['output_voltage']/1000; ?> V</td>
        <td><?php echo $value['output_current']/1000; ?> A</td>
        <td><?php echo $value['output_power']/1000000; ?> W</td>
        <td><?php echo $value['temperature']; ?> <sup>o</sup>C</td>
        <td><?php echo $value['date_time'];; ?></td>
    </tr>
    <tr class="data_detail">
        <td class="align-center">PV1</td>
        <td><?php echo $value['input_voltage_pv1']/1000; ?> V</td>
        <td><?php echo $value['input_current_pv1']/1000; ?> A</td>
        <td><?php echo $value['input_power_pv1']/1000000; ?> W</td>
        <td></td>
        <td></td>
    </tr>
    <tr class="data_detail">
        <td class="align-center">PV2</td>
        <td><?php echo $value['input_voltage_pv2']/1000; ?> V</td>
        <td><?php echo $value['input_current_pv2']/1000; ?> A</td>
        <td><?php echo $value['input_power_pv2']/1000000; ?> W</td>
        <td></td>
        <td></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>

<script>
function show_detail(key)    
{
	if($("#"+key).is('.dropup'))
		$("#"+key).removeClass();		
	else
		$("#"+key).addClass("dropup");
		
	$("#"+key).next("tr").fadeToggle("fast");
	$("#"+key).next("tr").next("tr").fadeToggle("fast");
} 
</script>