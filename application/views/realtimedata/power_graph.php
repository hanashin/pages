<form class="form-horizontal" role="form" action="<?php echo base_url('index.php/realtimedata/power_graph');?>" method="post">
    <div class="col-sm-offset-3 col-sm-3 has-feedback">
        <input class="Wdate form-control input-sm" type="text" name="date" value="<?php echo $date;?>" onClick="WdatePicker({maxDate:'%y-%M-%d', <?php echo $this->lang->line('graph_language')?>})">
        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
    </div>
    <div class="col-sm-5">
      <div>
        <button type="submit" class="btn btn-default btn-sm"><?php echo $this->lang->line('button_query')?></button>
        <span class="btn-warning btn-sm"><?php echo $this->lang->line('graph_value_energy').": ".$today_energy." kWh";?></span>
      </div>
    </div>        
</from>
<div class="col-sm-12 mychart">
    <div id="myChart" width="800" height="400"></div>
</div>

    <script src="<?php echo base_url('js/datepicker/WdatePicker.js');?>"></script>
    <script src="<?php echo base_url('js/jquery/jquery-1.8.2.min.js');?>"></script>
    <script src="<?php echo base_url('js/highcharts.js');?>"></script>
    <script src="<?php echo base_url('js/modules/exporting.js');?>"></script>
    <script>
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
                zoomType: 'x'
            },
            title: {
                text: '<?php echo $this->lang->line('graph_title')?>'
            },
            // subtitle: {
            //     text: document.ontouchstart === undefined ?
            //         'Click and drag in the plot area to zoom in' :
            //         'Pinch the chart to zoom in'
            // },
            xAxis: {
                type: 'datetime',
                //minRange: 5 * 60 * 1000 // five minites
            },
            yAxis: {
                title: {
                    text: '<?php echo $this->lang->line('graph_y_label_power')?>'
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
            series:[{
                type: 'line',
                name: '<?php echo $this->lang->line('graph_value_power')?>',    
                data: [<?php echo $power_data;?>]
            }]
        });
    });
    </script>
<script>
function myrefresh(){
   window.location.reload();
}
setTimeout('myrefresh()',300000); //指定5分钟刷新一次
</script>