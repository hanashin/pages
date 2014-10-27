<!--   <form class="registerform" action="<?php echo base_url('index.php/configuration/check_login');?>" method="post" accept-charset="utf-8">
      <table id="home">
        <tr>
          <th scope="row"><?php echo $this->lang->line('login_username')?></th>
          <td>
            <input class="inputxt" type="text" name="username" value=""
                        datatype="*4-18"
                        errormsg=""
                        sucmsg=" ">
            <div>
                <div class="info"><span class="Validform_checktip"></span><span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
            </div>
        </tr>
        <tr>
          <th scope="row"><?php echo $this->lang->line('login_password')?></th>
          <td>
            <input class="inputxt" type="password" name="password" value=""
                        datatype="*4-18"
                        errormsg=""
                        sucmsg=" ">
            <div>
                <div class="info"><span class="Validform_checktip"></span><span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
            </div>
        </tr>
      </table>
      <center><input name="submit" type="submit" value='<?php echo $this->lang->line('login_login')?>'></center>
  </form> -->
    
 
    <form class="form-signin" role="form" action="<?php echo base_url('index.php/configuration/check_login');?>" method="post">
      <div class="col-sm-offset-4 col-sm-5">
        <h2 class="form-signin-heading"><?php echo $this->lang->line('login_title')?></h2>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-4 col-sm-4">
          <input type="text" name="username" class="form-control" placeholder="<?php echo $this->lang->line('login_username')?>" required oninvalid="setCustomValidity('please input username');" oninput="setCustomValidity('');" autofocus>
          <input type="password" name="password" class="form-control" placeholder="<?php echo $this->lang->line('login_password')?>" required oninvalid="setCustomValidity('please input password');" oninput="setCustomValidity('');">      
        </div>
        <div class="col-sm-12">
         <br>
        </div>
        <div class="col-sm-offset-4 col-sm-4">
          <button class="btn btn-primary" type="submit"><?php echo $this->lang->line('login_login')?></button>
        </div>
      </div>
    </form>
    <div class="col-sm-offset-4 col-sm-4">
      <?php echo $this->lang->line("login_result_$result")?>
    </div>
      

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
                              left:left+130,
                              top:top-1
                          }).show().animate({
                              left:left+110, 
                          },200);
                      }
                  }
              },
          });
      })
  </script>