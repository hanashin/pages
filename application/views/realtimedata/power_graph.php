<form class="form-horizontal" role="form" action="<?php echo base_url('index.php/realtimedata/power_graph');?>" method="post">
  <div class="col-sm-4 col-sm-offset-4">
    <div class="input-group input-group-sm">
      <input class="form-control datepicker" type="text" name="date" value="<?php echo $date;?>" onClick="WdatePicker({maxDate:'%y-%M-%d', <?php echo $this->lang->line('graph_language')?>})" readonly>
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><?php echo $this->lang->line('button_query')?></button>
      </span>
    </div>
  </div>
</form>

<!-- 显示图表 -->
<div class="col-sm-12 mychart">
    <div id="myChart"></div>
</div>

<!-- 总能量 -->
<h4><span class="label label-warning pull-right"><?php echo $this->lang->line('graph_daily_energy').": ".$today_energy;?> kWh</span></h4>

<script src="<?php echo base_url('js/datepicker/WdatePicker.js');?>"></script>
<script src="<?php echo base_url('js/highcharts.js');?>"></script>
<script src="<?php echo base_url('js/modules/exporting.js');?>"></script>
<script>
window.scrollTo(0,110);//页面位置调整（显示完整图表）
//准备数据
<?php
    $power_data = "";
    foreach ($power as $key => $value) {
        $power_data = $power_data."[".$value['time'].",".$value['each_system_power']."],";
    }
?>
    $(function () {
        Highcharts.setOptions({
            global: {
                useUTC: false 
            }
        });
    $('#myChart').highcharts({
        chart: {
            zoomType: 'x',
            margin:[10, 10, 25, 70],//上右下左 
            height:400, 
            backgroundColor: 'rgba(0,0,0,0)',
        },
        title: {
        	<?php 
        	if($today_energy == 0)
        	    echo "text: 'No Data',";
            else
                echo "text: '',";
        	?>
                y: 160,
                style: {
                    fontSize: "25px",
                }
            },
//             subtitle: {
//                 text: document.ontouchstart === undefined ?
//                     'Click and drag in the plot area to zoom in' :
//                     'Pinch the chart to zoom in'
//             },
            xAxis: {
                type: 'datetime',
            },
            yAxis: {
                title: {
                	text: '<?php echo $this->lang->line('graph_y_label_power'); ?>',
                style: {
                    fontSize: "16px",
                }
            },
            min:0
        },
        legend: {
            enabled: false
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            line: {
                fillColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1},
                    stops: [
                        [0, Highcharts.getOptions().colors[0]],
                        [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                    ]
                },
                marker: {
                    radius: 1
                },
                lineWidth: 2.5,
                states: {
                    hover: {
                        lineWidth: 3.5
                    }
                },
                threshold: null
            }
        },
        <?php 
        if($today_energy != 0){
            echo "series:[{
            type: 'line',
            name: '".$this->lang->line('graph_value_power')."',    
            data: [".$power_data."]}]";
        }
        ?>
    });
});
</script>
<script>
function myrefresh(){
   window.location.reload();
}
setTimeout('myrefresh()',300000); //指定5分钟刷新一次
</script>