<!-- 登录结果显示框 -->
<div class="alert alert-success" id="result">
    <button class="close" type="button"><span aria-hidden="true">&times;</span></button>
    <strong></strong><small></small>
</div>

<!-- 登录表单 -->
<form class="form-signin" id="defaultForm" method="ajax">
  <div class="col-sm-offset-4 col-sm-5">
    <h2 class="form-signin-heading"><?php echo $this->lang->line('login_title')?></h2>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-4">
      <input class="form-control" id="inputdata1" type="text" name="username"  placeholder="<?php echo $this->lang->line('login_username')?>" required oninvalid="setCustomValidity('please input username');" oninput="setCustomValidity('');" autofocus>
      <input class="form-control" id="inputdata2" type="password" name="password"  placeholder="<?php echo $this->lang->line('login_password')?>" required oninvalid="setCustomValidity('please input password');" oninput="setCustomValidity('');">      
    </div>
    <div class="col-sm-12">
     <br>
    </div>
    <div class="col-sm-offset-4 col-sm-4">
      <button class="btn btn-primary" id="button_login" type="submit"><?php echo $this->lang->line('login_login')?></button>
    </div>
  </div>
</form>

<script>
$(document).ready(function() {
	//隐藏设置结果栏
	$("#result").hide();
	$(".close").click(function(){
		$("#result").hide();
    }); 
    
	//表单验证
    $('#defaultForm').bootstrapValidator({
    })
    .on('success.form.bv', function(e) {
        //防止默认表单提交，采用ajax提交
        e.preventDefault();
    });
    
    //登录表单处理
    $("#button_login").click(function(){
	    $.ajax({
    		url : "<?php echo base_url('index.php/configuration/check_login');?>",
    		type : "post",
            dataType : "json",
    		data: "username=" + $("#inputdata1").val()
    			  + "&password=" + $("#inputdata2").val(),
  	    	success : function(Results){
                if(Results.value == 0){
  	                $("#result").removeClass().addClass("alert alert-success");
  	                $("#result strong").text("<?php echo $this->lang->line('message_success')?>" + "：");
    	            setTimeout("location.reload();",500);
  	            }
                else{
                    $("#result").removeClass().addClass("alert alert-danger");
                    $("#result strong").text("<?php echo $this->lang->line('message_warning')?>" + "：");  
                }
                $("#result small").text(Results.message);        		 
            	$("#result").show();
    		},
  	    	error : function(){
  	    		alert("Error");
  	    	}
        })
    });
});
</script>