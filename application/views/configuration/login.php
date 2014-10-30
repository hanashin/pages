    <?php
      if(!empty($result)){
        if(!strncmp($result, "success", 7)){
          echo "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">"."\n";
          echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>"."\n";
          echo "<strong>".$this->lang->line("message_success")."&nbsp;!&nbsp;&nbsp;</strong>".$this->lang->line("login_result_$result")."\n";
          echo "</div>"."\n";
        }
        else{
          echo "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">"."\n";
          echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>"."\n";
          echo "<strong>".$this->lang->line("message_failed")."&nbsp;!&nbsp;&nbsp;</strong>".$this->lang->line("login_result_$result")."\n";
          echo "</div>"."\n";
        }        
      }
    ?><form class="form-signin" role="form" action="<?php echo base_url('index.php/configuration/check_login');?>" method="post">
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