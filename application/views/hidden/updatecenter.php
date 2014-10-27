<form class="registerform" action="<?php echo base_url('index.php/hidden/set_updatecenter');?>" method="post" accept-charset="utf-8">
    <table class="table">
      <tr>
        <th scope="row"><?php echo $this->lang->line('updatecenter_domain')?></th>
        <td>
            <input type="text" name="domain" value="<?php echo $domain;?>"
                    datatype="/\w*\.\w+$/"
                    nullmsg="<?php echo $this->lang->line('validform_null_domain')?>"
                    errormsg="<?php echo $this->lang->line('validform_domain')?>"
                    sucmsg=" ">
            <div>
                <div class="info"><span class="Validform_checktip"></span><span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
            </div>
        </td>
      </tr>
      <tr>
        <th scope="row"><?php echo $this->lang->line('updatecenter_ip')?></th>
        <td>
            <input type="text" name="ip" value="<?php echo $ip;?>"
                    datatype="ipv4"
                    nullmsg="<?php echo $this->lang->line('validform_null_ip_address')?>"
                    errormsg="<?php echo $this->lang->line('validform_ip_address')?>"
                    sucmsg=" ">
            <div>
                <div class="info"><span class="Validform_checktip"></span><span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
            </div>
        </td>
      </tr>
      <tr>
        <th scope="row"><?php echo $this->lang->line('updatecenter_port')?></th>
        <td>
            <input type="text" name="port1" value="<?php echo $port;?>"
                    datatype="/^(\d{1,4}|([1-5]\d{4})|([1-6][0-4]\d{3})|([1-6][0-5][0-4]\d{2})|([1-6][0-5][0-5][0-2]\d)|([1-6][0-5][0-5][0-3][0-5]))$/"
                    nullmsg="<?php echo $this->lang->line('validform_null_port')?>"
                    errormsg="<?php echo $this->lang->line('validform_port')?>"
                    sucmsg=" ">
            <div>
                <div class="info"><span class="Validform_checktip"></span><span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
            </div>
        </td>
      </tr>
    </table>
    <center><input name="submit" type="submit" value='<?php echo $this->lang->line('updatecenter_update')?>'><center>
</form>
<br>
<center>
  <?php echo $this->lang->line("datacenter_result_$result")?>
</center>

<script src="<?php echo base_url('js/jquery/jquery-1.8.2.min.js');?>"></script>
<script src="<?php echo base_url('js/Validform_v5.3.2_min.js');?>"></script>
<script src="<?php echo base_url('js/Validform_Datatype.js');?>"></script>  
<script>
    $(function(){
        $(".registerform").Validform({
            tiptype:function(msg,o,cssctl){
            //msg：提示信息;
            //o:{obj:*,type:*,curform:*}, obj指向的是当前验证的表单元素（或表单对象），type指示提示的状态，值为1、2、3、4， 1：正在检测/提交数据，2：通过验证，3：验证失败，4：提示ignore状态, curform为当前form对象;
            //cssctl:内置的提示信息样式控制函数，该函数需传入两个参数：显示提示信息的对象 和 当前提示的状态（既形参o中的type）;
          
                if(!o.obj.is("form")){//验证表单元素时o.obj为该表单元素，全部验证通过提交表单时o.obj为该表单对象;
                    var objtip=o.obj.next("div").find(".Validform_checktip");
                    cssctl(objtip,o.type);
                    objtip.text(msg);

                    var infoObj=o.obj.next("div").find(".info");
                    if(o.type==2){
                        infoObj.fadeOut(2000);
                    }else{
                        if(infoObj.is(":visible")){return;}
                        var left=o.obj.offset().left,
                        top=o.obj.offset().top;

                        infoObj.css({
                            left:left+200,
                            top:top-1
                        }).show().animate({
                            left:left+180, 
                        },200);
                    }
                }
            },
            ignoreHidden:true
        });
    })
</script>