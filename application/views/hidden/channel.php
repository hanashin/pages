<!-- 设置结果显示框 -->
<div class="alert alert-success" id="result"></div>

<form class="form-horizontal" id="defaultForm">
    <div class="form-group">    
        <label for="inputdata" class="col-sm-5 control-label">Channel</label>
        <div class="col-sm-4">
            <input type="text" name="channel" class="form-control" id="inputdata" value="<?php echo $channel;?>">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-5 col-sm-2">
            <button type="submit" class="btn btn-primary btn-sm"><?php echo $this->lang->line('button_update')?></button>
        </div>
    </div>
</form>

<script>
$(document).ready(function() 
{
	//表单验证
    $('#defaultForm').bootstrapValidator({
        fields: {
        	channel: {
                validators: {
                    notEmpty: {
                        message: 'Please enter channel'
                    },
                    regexp: {
                        regexp: /^0[xX][0-9A-Fa-f]+$/,
                        message: 'Format error'
                    }
                }
            },
        }
    })
    //表单验证成功
    .on('success.form.bv', function(e) {    
        e.preventDefault();//防止默认表单提交，采用ajax提交
        $("#result").hide();    
	    $.ajax({
    		url : "<?php echo base_url('index.php/hidden/set_channel');?>",
    		type : "post",
            dataType : "json",
    		data: "channel=" + $("#inputdata").val(),
  	    	success : function(Results){
  	    		$("#result").text(Results.message);
                if(Results.value == 0){
  	                $("#result").removeClass().addClass("alert alert-success");
                    setTimeout('$("#result").fadeToggle("slow")', 3000);
                }
                else{
                    $("#result").removeClass().addClass("alert alert-warning");
                }
                $("#result").fadeToggle("slow");
                window.scrollTo(0,0);//页面置顶 
    		},
  	    	error : function() { alert("Error"); }
        })        
    });
});
</script>