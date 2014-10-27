<form class="registerform" action="<?php echo base_url('index.php/hidden/set_serial');?>" method="post" accept-charset="utf-8">
    <table class="table">
      <tr>
        <th scope="row"><?php echo $this->lang->line('serial_switch')?></th>
        <td>
          <select name='serial_switch'>
            <option value="on" <?php if(!strncmp($serial_switch, "on", 2))
                                        echo "selected=\"selected\"";
                                    ?>><?php echo $this->lang->line('serial_switch_on')?></option>
            <option value="off" <?php if(!strncmp($serial_switch, "off", 3))
                                        echo "selected=\"selected\"";
                                    ?>><?php echo $this->lang->line('serial_switch_off')?></option>
          </select>
        </td>
      </tr>
      <tr>
        <th scope="row"><?php echo $this->lang->line('serial_baud_rate')?></th>
        <td>
          <select name='baud_rate'>
            <option value="2400" <?php if(!strncmp($baud_rate, "2400", 4))
                                        echo "selected=\"selected\"";?>>2400</option>
            <option value="4800" <?php if(!strncmp($baud_rate, "4800", 4))
                                        echo "selected=\"selected\"";?>>4800</option>
            <option value="9600" <?php if(!strncmp($baud_rate, "9600", 4))
                                        echo "selected=\"selected\"";?>>9600</option>
            <option value="19200" <?php if(!strncmp($baud_rate, "19200", 5))
                                        echo "selected=\"selected\"";?>>19200</option>
            <option value="38400" <?php if(!strncmp($baud_rate, "38400", 5))
                                        echo "selected=\"selected\"";?>>38400</option>
            <option value="57600" <?php if(!strncmp($baud_rate, "57600", 5))
                                        echo "selected=\"selected\"";?>>57600</option>
            <option value="115200" <?php if(!strncmp($baud_rate, "115200", 6))
                                        echo "selected=\"selected\"";?>>115200</option>
          </select>
        </td>
      </tr>
      <tr>
        <th scope="row"><?php echo $this->lang->line('serial_ecu_address')?></th>
        <td>
            <input type="text" name="ecu_address" value="<?php echo $ecu_address;?>"
                    datatype="/^0*(\d{1,2}|([1][0-1]\d)|([1][2][0-8]))$/"
                    nullmsg="<?php echo $this->lang->line('validform_null_ecu_address')?>"
                    errormsg="<?php echo $this->lang->line('validform_ecu_address')?>"
                    sucmsg=" ">
            <div>
                <div class="info"><span class="Validform_checktip"></span><span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
            </div>
        </td>
      </tr>
    </table>
    <center><input name="submit" type="submit" value='<?php echo $this->lang->line('serial_update')?>'><center>
</form>
 <br>
<center>
  <?php echo $this->lang->line("serial_result_$result")?>
</center>

<script src="<?php echo base_url('js/jquery/jquery-1.8.2.min.js');?>"></script>
<script src="<?php echo base_url('js/Validform_v5.3.2_min.js');?>"></script> 
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