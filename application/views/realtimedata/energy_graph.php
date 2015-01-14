<form class="form-horizontal" role="form" action="<?php echo base_url('index.php/realtimedata/energy_graph');?>" method="post">
    <center>
        <select name="period">
              <option value="weekly" <?php if(!strncmp($period, "weekly", 6))echo "selected=\"selected\"";?>><?php echo $this->lang->line('energy_the_recent_week')?></option>
              <option value="monthly" <?php if(!strncmp($period, "monthly", 7))echo "selected=\"selected\"";?>><?php echo $this->lang->line('energy_the_recent_month')?></option>
              <option value="yearly" <?php if(!strncmp($period, "yearly", 6))echo "selected=\"selected\"";?>><?php echo $this->lang->line('energy_the_recent_year')?></option>
        </select>
        <input class="Wdate" type="text" name="date" value="<?php echo $date;?>" onClick="WdatePicker({maxDate:'%y-%M-%d', <?php echo $this->lang->line('graph_language')?>})">
        <button type="submit" class="btn btn-default btn-xs"><?php echo $this->lang->line('button_query')?></button>
    </center>
    <center>
        <span class="btn-warning btn-xs"><?php echo $this->lang->line('graph_value_energy').": ".$total." kWh";?></span>
    </center>        
</from>
<div class="mychart">
    <div id="myChart" width="800" height="400"></div>
</div>

    <script src="<?php echo base_url('js/datepicker/WdatePicker.js');?>"></script>
    <script src="<?php echo base_url('js/jquery/jquery-1.8.2.min.js');?>"></script>
    <script src="<?php echo base_url('js/highcharts.js');?>"></script>
    <script src="<?php echo base_url('js/modules/exporting.js');?>"></script>
    <script>
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
                margin:[45, 10,50,65],//上右下左                  
            },
            title: {
                text: '<?php echo $this->lang->line('graph_title')?>',
                style: {
                    fontSize: "22px",
                }
            },
            xAxis: {
            	<?php if(count($energy) > 12) {echo 	"tickInterval: 2, tickPixelInterval: 10,";}?>
                categories: [<?php echo $x_label;?>],
                labels: {
                    rotation: -30,
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: '<?php echo $this->lang->line('graph_y_label_energy')?>',
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
                }
            },
            series: [{
                name: '<?php echo $this->lang->line('graph_value_energy')?>',
                data: [<?php echo $y_value;?>]    
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