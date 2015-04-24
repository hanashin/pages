<form class="form-horizontal" >
    <div class="col-sm-6 col-sm-offset-3">
        <div class="input-group">
            <div class="input-group-btn">
                <button id="select_id" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false" >optimizer system <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="javascript:select_id('optimizer system')">optimizer system</a></li>
                    <?php foreach ($ids as $key => $value): ?>
                    <li><a href="javascript:select_id('<?php echo $value; ?>')"><?php echo $value; ?></a></li>
                    <?php endforeach; ?>          
                </ul>
            </div>
            <input class="form-control datepicker" type="text" name="date" value="<?php echo date("Y-m-d",time());?>" onClick="WdatePicker({maxDate:'%y-%M-%d', <?php echo $this->lang->line('graph_language')?>, onpicked:select_date})" readonly>
            <span class="input-group-btn">
                <button class="btn btn-default" id="query" type="button"><?php echo $this->lang->line('button_query')?></button>
            </span>
        </div>
    </div>
</form>

<!-- 显示图表 -->
<div class="col-sm-12 mychart">
    <div id="myChart"></div>
</div>

<?php
    $power_data = "";
    foreach ($system_power as $key => $value) {
        $power_data = $power_data."[".$value['time'].",".$value['power']."],";
    }
?>
<script src="<?php echo base_url('js/datepicker/WdatePicker.js');?>"></script>
<script src="<?php echo base_url('js/highcharts.js');?>"></script>
<script src="<?php echo base_url('js/modules/exporting.js');?>"></script>
<script>
function select_id(id)
{
    $("#select_id").html(id + " <span class=\"caret\"></span>");
    show_graph();
}
function select_date()
{
	show_graph();
}
function show_graph()
{
	$.ajax({
		url : "<?php echo base_url('index.php/realtimedata/get_old_graph');?>",
		type : "post",
        dataType : "json",
        data: "date=" + $(".datepicker").val()
		  + "&optimizer_id=" + $("#select_id").text()
		  + "&data_type=" + $("#inputdata1").val(),
        success : function(Results){
            //alert(Results);
        	var data_output = new Array();
        	var data_input_pv1 = new Array();
        	var data_input_pv2 = new Array();
        	$.each(Results.value,function(key,value){   
        		data_output.push([value.time,value.output]);
        		data_input_pv1.push([value.time,value.input_pv1]);
        		data_input_pv2.push([value.time,value.input_pv2]);
     		});
        	$('#myChart').highcharts().series[0].setData(data_output);
        	$('#myChart').highcharts().series[1].setData(data_input_pv1);
        	$('#myChart').highcharts().series[2].setData(data_input_pv2);
        	$('#myChart').highcharts().setTitle(
                { text: Results.title },
                { text: Results.subtitle }
            );          
        },
        error : function() { alert("Error"); }
    })
}
$(document).ready(function() {
	/* 全局配置 */
    Highcharts.setOptions({
        global: {
            useUTC: false 
        },
        lang: {
        }
    });
    
    /* 创建表单配置 */
    $('#myChart').highcharts({
        chart: {
         zoomType: 'x',
         //margin:[10, 10, 25, 70],//上右下左 
         height:400, 
         backgroundColor: 'rgba(0,0,0,0)',
        },
        title: {
         text: '<?php echo $title; ?>',
        },
        subtitle: {
         text: '<?php echo $subtitle; ?>',
         y: 160,
         style: {
             fontSize: "20px",
         }
        },
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
             },
             credits: {
                 enabled: false
             },
             plotOptions: {
        //          line: {
        //              fillColor: {
        //                  linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1},
        //                  stops: [
        //                      [0, Highcharts.getOptions().colors[0]],
        //                      [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
        //                  ]
        //              },
        //              marker: {
        //                  radius: 1
        //              },
        //              lineWidth: 2.5,
        //              states: {
        //                  hover: {
        //                      lineWidth: 3.5
        //                  }
        //              },
        //              threshold: null
        //          }
             },
        series:[{
            name: 'output',    
            data: [<?php echo $power_data; ?>]
        },{
            name: 'input_pv1',    
            data: []
        },{
            name: 'input_pv2',    
            data: []
        }]
    });
    $("#query").click(function(){
    	show_graph();
    });
});
</script>