<form id="subform" class="form-horizontal" role="form" action="<?php echo base_url('index.php/realtimedata/energy_graph');?>" method="post">
  <div class="col-sm-6 col-sm-offset-3">
    <div class="input-group input-group-sm">
      <div class="input-group-btn">
        <button id="show_period" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false" ><?php echo $this->lang->line("energy_$period")?> <span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu">
          <li><a href="javascript:void(0)" onclick="query_energy('weekly')"><?php echo $this->lang->line('energy_weekly')?></a></li>
          <li><a href="javascript:void(0)" onclick="query_energy('monthly')"><?php echo $this->lang->line('energy_monthly')?></a></li>
          <li><a href="javascript:void(0)" onclick="query_energy('yearly')"><?php echo $this->lang->line('energy_yearly')?></a></li>
        </ul>
      </div>
      <input class="form-control datepicker" type="text" name="date" value="<?php echo $date;?>" onClick="WdatePicker({maxDate:'%y-%M-%d', <?php echo $this->lang->line('graph_language')?>})" readonly>
      <input type="hidden" value="<?php echo $period;?>" name="period" id="period">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><?php echo $this->lang->line('button_query')?></button>
      </span>
    </div>
  </div>
</form>

<!-- 显示图表 -->
<div class="col-sm-12 mychart">
    <div id="myChart" width="800" height="400"></div>
</div>

<!-- 总能量 -->
<h4><span class="label label-warning pull-right"><?php echo $this->lang->line("graph_{$period}_energy").": ".$total;?> kWh</span></h4>

<script src="<?php echo base_url('js/datepicker/WdatePicker.js');?>"></script>
<script src="<?php echo base_url('js/highcharts.js');?>"></script>
<script src="<?php echo base_url('js/modules/exporting.js');?>"></script>
<script>
function query_energy(period)
{
	if(period == 'monthly') {
		$("#show_period").text("<?php echo $this->lang->line('energy_monthly')?>");
		$("#period").val("monthly");
	}
	else if(period == 'yearly') {
		$("#show_period").text("<?php echo $this->lang->line('energy_yearly')?>");
		$("#period").val("yearly");
	}
	else {
		$("#show_period").text("<?php echo $this->lang->line('energy_weekly')?>");
		$("#period").val("weekly");
	}
}

window.scrollTo(0,110);//页面位置调整（显示完整图表）
 //准备数据
<?php
    $x_label = "";
    $y_value = "";
    foreach ($energy as $key => $value) {
        $x_label = $x_label."\"".$value['date']."\",";
        $y_value = $y_value.$value['energy'].",";
    }
?>
    $(function () {
    $('#myChart').highcharts({
        chart: {
            type: 'column',
            margin:[10, 10, 45, 65],//上右下左 
            height:400,
            backgroundColor: 'rgba(0,0,0,0)',            
        },
        title: {
        	<?php 
        	if($total == 0)
        	    echo "text: 'No Data',";
            else
                echo "text: '',";
        	?>
            y: 160,
            style: {
                fontSize: "25px",
            }
        },
        xAxis: {
        	<?php if(count($energy) > 12) {echo 	"tickInterval: 2,";}?>
            categories: [<?php echo $x_label;?>],
            labels: {
                rotation: -30,
                x: 18,
            }            	
        },
        yAxis: {
            min: 0,
            title: {
                text: '<?php echo $this->lang->line('graph_y_label_energy'); ?>',
                style: {
                    fontSize: "16px",
                }
            },
        },
        legend: {
            enabled: false
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            },
        },
        <?php 
        if($total != 0){
            echo "series: [{
            name: '".$this->lang->line('graph_value_energy')."',
            data: [".$y_value."]}]";
        }
        ?>           
    });
});
</script>