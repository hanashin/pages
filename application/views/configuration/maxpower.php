<!-- 设置结果显示框 -->
<div class="alert alert-success alert-dismissible" id="result">
    <button class="close" type="button" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <strong></strong><small></small>
</div>

<!-- 最大功率设置表格 -->
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
        echo "<tr>";
        echo "<td>".$value['id']."</td>";
        echo "<td class=\"col-sm-4\"><div class=\"input-group input-group-sm col-sm-8\">
          <input class=\"form-control\" type=\"text\" name=\"{$value['id']}\" value=\"\" placeholder=\"{$value['limitedpower']}\">
            <span class=\"input-group-addon\">W</span>
            </div></td>";
        echo "<td>".$value['limitedresult']."</td>";
        echo "<td><button class=\"btn btn-default btn-sm\" id=\"{$value['id']}\" type=\"submit\">".$this->lang->line('button_save')."</button></td>";
        echo "</tr>";
      }
    ?>
  </tbody>
</table>

<script>
$(document).ready(function() {

	//隐藏设置结果栏
	$("#result").hide();

    //设置最大功率处理	
	$(".btn").click(function(){        
	    $.ajax({
    		url : "<?php echo base_url('index.php/configuration/set_maxpower');?>",
    		type : "post",
            dataType : "json",
    		data: "id=" + $(this).attr("id")
			  + "&maxpower=" + $("input[name='"+$(this).attr("id")+"']").val(),
  	    	success : function(Results){
                if(Results.value == 0){
  	                $("#result").removeClass().addClass("alert alert-success alert-dismissible");
  	                $("#result strong").text("<?php echo $this->lang->line('message_success')?>" + "：");  
  	            }
                else{
                    $("#result").removeClass().addClass("alert alert-warning alert-dismissible");
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