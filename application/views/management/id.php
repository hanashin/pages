<!-- 设置结果显示框 -->
<div class="alert alert-success" id="result">
    <button class="close" type="button"><span aria-hidden="true">&times;</span></button>
    <strong></strong><small></small>
</div>

<!-- 设置逆变器列表 -->
<form class="form-horizontal" method="ajax">
  <div class="form-group">    
    <div class="col-sm-offset-4 col-sm-4">
       <textarea class="form-control" name="ids" id="inverter_list" rows="10" autofocus><?php foreach ($ids as $value) {
          echo $value."\n";
        }?></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-4">
      <div class="btn-group btn-group-justified">
        <div class="btn-group">
          <button class="btn btn-primary btn-sm" id="update_id" type="button"><?php echo $this->lang->line('button_update')?></button>
        </div>
        <div class="btn-group">
          <a href="<?php echo base_url('index.php/management/set_id_clear');?>" class="btn btn-primary btn-sm"><?php echo $this->lang->line('id_clear_id')?></a>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
$(document).ready(function() {

	// 网上找到的 http://web.archive.org/web/20080214051356/http://www.csie.ntu.edu.tw/~b88039/html/jslib/caret.html
	// 获取光标位置
	function caret(node) {
	 //node.focus(); 
	 /* without node.focus() IE will returns -1 when focus is not on node */
	 if(node.selectionStart) return node.selectionStart;
	 else if(!document.selection) return 0;
	 var c		= "\001";
	 var sel	= document.selection.createRange();
	 var dul	= sel.duplicate();
	 var len	= 0;
	 dul.moveToElementText(node);
	 sel.text	= c;
	 len		= (dul.text.indexOf(c));
	 sel.moveStart('character',-1);
	 sel.text	= "";
	 return len;
	}

	// 网上找到的 http://stackoverflow.com/questions/512528/set-cursor-position-in-html-textbox
	// 设置光标位置
	function setCaretPosition(elem, caretPos) {
	    if(elem != null) {
	        if(elem.createTextRange) {
	            var range = elem.createTextRange();
	            range.move('character', caretPos);
	            range.select();
	        }
	        else {
	            if(elem.selectionStart) {
	                elem.focus();
	                elem.setSelectionRange(caretPos, caretPos);
	            }
	            else
	                elem.focus();
	        }
	    }
	}

	function onlyNumbers(e) {
	    var keynum
	    var keychar
	    var numcheck

	    if(window.event) // IE
	    {
	        keynum = e.keyCode
	    }
	    else if(e.which) // Netscape/Firefox/Opera
	    {
	        keynum = e.which
	    }
	    keychar = String.fromCharCode(keynum)
	    numcheck = /\d/
	    return numcheck.test(keychar)
	}

	var textarea = document.getElementsByTagName('textarea')[0],
	    timer,
	    fn = function () {
	        var cp = caret(textarea),
	            v = textarea.value,
	            beforeValue = v.substr(0, cp).replace(/[^\d\n]/g, ''),
	            value = v.replace(/[^\d]/g, ''),
	            newValue = [];

	        while (value) {
	            newValue.push(value.substr(0, 12));
	            value = value.substr(12);
	        }

	      newValue = newValue.join('\n');
	      if (v != newValue) {
	        textarea.value = newValue;
	        if (cp < v.length) {
	            setCaretPosition(textarea, beforeValue.length);
	        }
	      }
	    };
	    
	// 获得焦点时每隔100ms调用一次fn函数
    textarea.onfocus = function () {
        timer = setInterval(fn, 100);
    };

    // 失去焦点时清除timer，取消对fn的调用
    textarea.onblur = function () {
        clearInterval(timer);
        fn();
    };

    // 按键被按下是检测是否为纯数字，否则无法输入
    textarea.onkeypress = function () {
        return onlyNumbers(event);
    };

	//隐藏设置结果栏
	$("#result").hide();
	$(".close").click(function(){
		$("#result").hide();
    }); 
    
    //设置逆变器列表
    $("#update_id").click(function(){
        $.ajax({
    		url : "<?php echo base_url('index.php/management/set_id');?>",
    		type : "post",
            dataType : "json",
    		data: "ids=" + $("#inverter_list").val(),
    	    success : function(Results){
    	    	
                if(Results.value == 0){
    	                $("#result").removeClass().addClass("alert alert-success");
    	                $("#result strong").text("<?php echo $this->lang->line('message_success')?>" + "：");  
    	        }
                else{
                    $("#result").removeClass().addClass("alert alert-warning");
                    $("#result strong").text("<?php echo $this->lang->line('message_warning')?>" + "：");
                    $("#result small").text(Results.message +"<p>"+ Results.error_ids + "</p>");//显示错误的逆变器号
                }		 
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

<center>
  <?php
    echo $this->lang->line("id_result_$result");
    if(!strncmp($result, "update_id_success", 17))
    {
        echo $this->lang->line('id_total')." : ".count($ids)."<br><br>";               
        if(!empty($error_ids))
        {
          echo $this->lang->line('id_error')." : "."<br>";
          foreach ($error_ids as $value) {
            echo $value."<br>";
          }
        }
        if(count($ids))
        {
          echo $this->lang->line('id_correct')." : "."<br>";
          foreach ($ids as $value) {
            echo $value."<br>";
          }
        }
    } 
  ?>
</center>