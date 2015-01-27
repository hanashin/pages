<!-- 设置结果显示框 -->
<div class="alert alert-success" id="result">
    <button class="close" type="button"><span aria-hidden="true">&times;</span></button>
    <strong></strong><small></small>
</div>

<!-- 逆变器信号强度显示表格 -->
<table class="table table-condensed table-striped table-hover">
  <thead>
    <tr>
      <th><?php echo $this->lang->line('inverter_id')?></th>
      <th><?php echo $this->lang->line('signal_strength')?></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php 
      foreach ($ids as $key => $value) 
      {
        echo "<tr>";
        
        //逆变器ID
        echo "<td>".$value['ID']."</td>";

        //设置结果
        if($value["signal_strength"] != null){
            echo "<td>{$value["signal_strength"]}</td>";}
        else{ 
            echo "<td>-</td>";}    
        
        //设置按钮
        echo "<td><button class=\"btn btn-default btn-sm\" id=\"{$value['ID']}\" type=\"button\">".$this->lang->line('button_read')."</button></td>";
        echo "</tr>";
      }
    ?>
  </tbody>
</table>

<div class="col-sm-4 col-sm-offset-4">
<button class="btn btn-primary btn-sm" id="read_all" type="button"><?php echo $this->lang->line('button_read_all')?></button>
</div>

<script>
$(document).ready(function() {

	//隐藏设置结果栏
	$("#result").hide();
	$(".close").click(function(){
		$("#result").hide();
    }); 

    //读取单台逆变器的电网环境
	$(".btn-default").click(function(){
		//alert("id=" + $(this).attr("id") + "&grid_environment=" + $("select[name='"+$(this).attr("id")+"']").val());     
	    $.ajax({
    		url : "<?php echo base_url('index.php/hidden/read_signal_strength');?>",
    		type : "post",
            dataType : "json",
    		data: "id=" + $(this).attr("id"),
  	    	success : function(Results){
  	  	    	//alert(Results);
                if(Results.value == 0){
  	                $("#result").removeClass().addClass("alert alert-success");
  	                $("#result strong").text("<?php echo $this->lang->line('message_success')?>" + "：");  
  	            }
                else{
                    $("#result").removeClass().addClass("alert alert-warning");
                    $("#result strong").text("<?php echo $this->lang->line('message_warning')?>" + "：");
                }
                $("#result small").text(Results.message);        		 
            	$("#result").show();
    		},
  	    	error : function(){
  	    		alert("Error");
  	    	}
        })
        window.scrollTo(0,0);//页面置顶
    });

	//读取所有逆变器的电网环境
	$("#read_all").click(function(){
	    $.ajax({
    		url : "<?php echo base_url('index.php/hidden/read_signal_strength');?>",
    		type : "post",
            dataType : "json",
    		data: "id=ALL",
  	    	success : function(Results){
                if(Results.value == 0){
  	                $("#result").removeClass().addClass("alert alert-success");
  	                $("#result strong").text("<?php echo $this->lang->line('message_success')?>" + "：");  
  	            }
                else{
                    $("#result").removeClass().addClass("alert alert-warning");
                    $("#result strong").text("<?php echo $this->lang->line('message_warning')?>" + "：");
                }
                $("#result small").text(Results.message);
            	$("#result").show();
    		},
  	    	error : function(){
  	    		alert("Error");
  	    	}
        })
        window.scrollTo(0,0);//页面置顶
	});
	
});
</script>