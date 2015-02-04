<!-- 设置结果显示框 -->
<div class="alert alert-success" id="result">
    <button class="close" type="button"><span aria-hidden="true">&times;</span></button>
    <strong></strong><small></small>
</div>

<form class="form-horizontal" id="defaultForm" method="ajax">

  <div class="form-group">    
    <label for="inputdata1" class="col-sm-5 control-label"><?php echo $this->lang->line('user_info_username')?></label>
    <div class="col-sm-4">
      <input type="text" name="username" class="form-control" id="inputdata1" value="">
    </div>
  </div>

  <div class="form-group">    
    <label for="inputdata2" class="col-sm-5 control-label"><?php echo $this->lang->line('user_info_old_password')?></label>
    <div class="col-sm-4">
      <input type="password" name="old_password" class="form-control" id="inputdata2" value="">
    </div>
  </div>

  <div class="form-group">    
    <label for="inputdata3" class="col-sm-5 control-label"><?php echo $this->lang->line('user_info_new_password')?></label>
    <div class="col-sm-4">
      <input type="password" name="new_password" class="form-control" id="inputdata3" value="">
    </div>
  </div>

  <div class="form-group">    
    <label for="inputdata4" class="col-sm-5 control-label"><?php echo $this->lang->line('user_info_confirm_password')?></label>
    <div class="col-sm-4">
      <input type="password" name="confirm_password" class="form-control" id="inputdata4" value="">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-5 col-sm-2">
      <button class="btn btn-primary btn-sm" id="button_update" type="submit" ><?php echo $this->lang->line('button_update')?></button>
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
        message: 'This value is not valid',
        fields: {
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: '<?php echo $this->lang->line('validform_null_username')?>'
                    },
                    stringLength: {
                        min: 4,
                        max: 18,
                        message: '<?php echo $this->lang->line('validform_username')?>'
                    }
                }
            },
            old_password: {
                message: 'The old_password is not valid',
                validators: {
                    notEmpty: {
                        message: '<?php echo $this->lang->line('validform_null_old_password')?>'
                    },
                    stringLength: {
                        min: 5,
                        max: 18,
                        message: '<?php echo $this->lang->line('validform_old_password')?>'
                    }
                }
            },
            new_password: {
                message: 'The new_password is not valid',
                validators: {
                    notEmpty: {
                        message: '<?php echo $this->lang->line('validform_null_new_password')?>'
                    },
                    stringLength: {
                        min: 5,
                        max: 18,
                        message: '<?php echo $this->lang->line('validform_new_password')?>'
                    }
                }
            },
            confirm_password: {
                message: 'The confirm_password is not valid',
                validators: {
                    notEmpty: {
                        message: '<?php echo $this->lang->line('validform_null_confirm_password')?>'
                    },
                    stringLength: {
                        min: 5,
                        max: 18,
                        message: '<?php echo $this->lang->line('validform_new_password')?>'
                    },
                    identical: {
                        field: 'new_password',
                        message: '<?php echo $this->lang->line('validform_confirm_password')?>'
                    }
                }
            }
        }
    })
    .on('success.form.bv', function(e) {
        //防止默认表单提交，采用ajax提交
        e.preventDefault();
    });

    //设置表单处理
    $("#button_update").click(function(){
    	$("#result").hide();
    	
	    $.ajax({
    		url : "<?php echo base_url('index.php/management/set_user_info');?>",
    		type : "post",
            dataType : "json",
    		data: "username=" + $("#inputdata1").val()
    			  + "&old_password=" + $("#inputdata2").val() 
    		      + "&new_password=" + $("#inputdata3").val() 
    		      + "&confirm_password=" + $("#inputdata4").val(),
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