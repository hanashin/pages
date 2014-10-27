    <form class="registerform" action="<?php echo base_url('index.php/management/set_user_info');?>" method="post" accept-charset="utf-8">
      <table class="table">
        <tr>
          <th scope="row"><?php echo $this->lang->line('user_info_username')?></th>
          <td><input class="inputxt" type="text" name="username" value="" 
                      datatype="*4-18"
                      nullmsg="<?php echo $this->lang->line('validform_null_username')?>" 
                      errormsg="<?php echo $this->lang->line('validform_username')?>"
                      sucmsg=" ">
              <div>
                  <div class="info"><span class="Validform_checktip"></span><span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
              </div>
          </td>
        </tr>
        <tr>
          <th scope="row"><?php echo $this->lang->line('user_info_old_password')?></th>
          <td><input class="inputxt" type="password" name="old_password" value=""
                      datatype="*6-18"
                      nullmsg="<?php echo $this->lang->line('validform_null_old_password')?>" 
                      errormsg="<?php echo $this->lang->line('validform_old_password')?>"
                      sucmsg=" ">
              <div>
                  <div class="info"><span class="Validform_checktip"></span><span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
              </div>
          </td>
        </tr>
        <tr>
          <th scope="row"><?php echo $this->lang->line('user_info_new_password')?></th>
          <td><input class="inputxt" type="password" name="new_password" value=""
                      datatype="*6-18",
                      nullmsg="<?php echo $this->lang->line('validform_null_new_password')?>" 
                      errormsg="<?php echo $this->lang->line('validform_new_password')?>"
                      sucmsg=" ">
              <div>
                  <div class="info"><span class="Validform_checktip"></span><span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
              </div>
          </td>
        </tr>
        <tr>
          <th scope="row"><?php echo $this->lang->line('user_info_confirm_password')?></th>
          <td><input class="inputxt" type="password" name="confirm_password" value="" recheck="new_password" 
                      errormsg="<?php echo $this->lang->line('validform_confirm_password')?>"
                      datatype="*",
                      nullmsg="<?php echo $this->lang->line('validform_null_confirm_password')?>"
                      sucmsg=" ">
              <div>
                  <div class="info"><span class="Validform_checktip"></span><span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
              </div>
          </td>
        </tr>
      </table>
      <center><input class="inputxt" name="submit" type="submit" value='<?php echo $this->lang->line('user_info_change_password')?>'><center>
    </form>
    <br>
    <center>
        <?php echo $this->lang->line("user_info_result_$result")?>
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
              });
          })
    </script>