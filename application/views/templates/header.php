<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <!-- 兼容IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 支持国产浏览器高速模式 -->
    <meta name="renderer" content="webkit">
    <!-- 响应式布局 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">    

    <title><?php echo $this->lang->line('title')?></title>

    <link type="image/x-icon" href="<?php echo base_url('images/logo-icon.png');?>" rel="shortcut icon">    
    <link href="<?php echo base_url('css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('css/ecu-style.css');?>" rel="stylesheet">  
    <link href="<?php echo base_url('css/bootstrapValidator.css');?>" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn"t work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->    
    <script src="<?php echo base_url('js/jquery-1.8.2.min.js');?>"></script>
    <script src="<?php echo base_url('js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('js/bootstrapValidator.min.js');?>"></script>
  </head>

  <body>
    <!-- 顶部导航栏 -->
    <header>
      <div class="navbar navbar-default navbar-top">
        <div class="container">
          <div class="navbar-header">
            <button class="navbar-toggle" data-target="#navbar-header" data-toggle="collapse" type="button">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://www.altenergy-power.com">
              <img src="<?php echo base_url('images/logo.png');?>">
            </a>
          </div>

          <div class="navbar-collapse collapse" id="navbar-header">
            <ul class="nav navbar-nav navbar-title">
              <li><a>ENERGY CONTROL UNIT</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-left">
              <li><a href="<?php echo base_url('index.php/home');?>" class="active"><span class="glyphicon glyphicon-home"></span><?php echo $this->lang->line('item_1')?></a></li>
              <li><a href="<?php echo base_url('index.php/realtimedata');?>"><span class="glyphicon glyphicon-cog"></span>SETTINGS</a></li>
              <li><a href="<?php echo base_url('index.php/configuration');?>"<?php if(!strncmp($page, "1111", 4)){echo " class=\"active\"";}?>><span class="glyphicon glyphicon-user"></span>FAQ</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo base_url('index.php/management/language');?>">English/Chinese</a></li>
            </ul>
          </div>
        </div>
      </div>     
    </header>

    <!-- 橙色导航栏 -->
    <nav>
      <div class="navbar navbar-default navbar-orange">
        <div class="container">
          <p>用户管理</p>          
          <div class="navbar-header">            
            <button class="navbar-toggle" data-target="#navbar-middle" data-toggle="collapse" type="button">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
          </div>

          <div class="navbar-collapse collapse" id="navbar-middle">
            <ul class="nav navbar-nav ">
              <li><a href="<?php echo base_url('index.php/home');?>"<?php if(!strncmp($page, "home", 4)){echo " class=\"active\"";}?>><?php echo $this->lang->line('item_1')?></a></li>
              <li><a href="<?php echo base_url('index.php/realtimedata');?>"<?php if(!strncmp($page, "realtimedata", 12)){echo " class=\"active\"";}?>><?php echo $this->lang->line('item_2')?></a><span> </span></li>
              <li><a href="<?php echo base_url('index.php/configuration');?>"<?php if(!strncmp($page, "configuration", 13)){echo " class=\"active\"";}?>><?php echo $this->lang->line('item_3')?></a><span> </span></li>
              <li><a href="<?php echo base_url('index.php/management');?>"<?php if(!strncmp($page, "management", 10)){echo " class=\"active\"";}?>><?php echo $this->lang->line('item_4')?></a><span> </span></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <section>
      <div class="container container-main">
        <aside class="col-md-3 col-md-push-9">
          <div class="list-group">
          <?php
            //主页 
            if(!strncmp($page, "home", 4))
            {

            }
            //实时数据 
            if(!strncmp($page, "realtimedata", 12))
            {
              echo "<a href=\"".base_url('index.php/realtimedata')."\" class=\"list-group-item";
              if(!strncmp($func, "data", 4))echo " active";
              echo "\">".$this->lang->line('item_2_1')."</a>"."\n";

              echo "<a href=\"".base_url('index.php/realtimedata/power_graph')."\" class=\"list-group-item";
              if(!strncmp($func, "power", 5))echo " active";
              echo "\">".$this->lang->line('item_2_2')."</a>"."\n";

              echo "<a href=\"".base_url('index.php/realtimedata/energy_graph')."\" class=\"list-group-item";
              if(!strncmp($func, "energy", 6))echo " active";
              echo "\">".$this->lang->line('item_2_3')."</a>"."\n";
            }
            //参数配置 
            if(!strncmp($page, "configuration", 13))
            {
              echo "<a href=\"".base_url('index.php/configuration')."\" class=\"list-group-item";
              if(!strncmp($func, "protection", 10))echo " active";
              echo "\">".$this->lang->line('item_3_1')."</a>"."\n";

              echo "<a href=\"".base_url('index.php/configuration/gfdi_state')."\" class=\"list-group-item";
              if(!strncmp($func, "gfdi", 4))echo " active";
              echo "\">".$this->lang->line('item_3_2')."</a>"."\n";

              echo "<a href=\"".base_url('index.php/configuration/switch_state')."\" class=\"list-group-item";
              if(!strncmp($func, "switch", 6))echo " active";
              echo "\">".$this->lang->line('item_3_3')."</a>"."\n";

              echo "<a href=\"".base_url('index.php/configuration/maxpower')."\" class=\"list-group-item";
              if(!strncmp($func, "maxpower", 8))echo " active";
              echo "\">".$this->lang->line('item_3_4')."</a>"."\n";
            }
            //系统管理 
            if(!strncmp($page, "management", 10))
            {
              echo "<a href=\"".base_url('index.php/management')."\" class=\"list-group-item";
              if(!strncmp($func, "id", 2))echo " active";
              echo "\">".$this->lang->line('item_4_1')."</a>"."\n";

              echo "<a href=\"".base_url('index.php/management/datetime')."\" class=\"list-group-item";
              if(!strncmp($func, "time", 4))echo " active";
              echo "\">".$this->lang->line('item_4_2')."</a>"."\n";

              echo "<a href=\"".base_url('index.php/management/language')."\" class=\"list-group-item";
              if(!strncmp($func, "language", 8))echo " active";
              echo "\">".$this->lang->line('item_4_3')."</a>"."\n";

              echo "<a href=\"".base_url('index.php/management/network')."\" class=\"list-group-item";
              if(!strncmp($func, "network", 7))echo " active";
              echo "\">".$this->lang->line('item_4_4')."</a>"."\n";

              // echo "<a href=\"".base_url('index.php/management/user_info')."\" class=\"list-group-item";
              // if(!strncmp($func, "user_info", 9))echo " active";
              // echo "\">".$this->lang->line('item_4_5')."</a>"."\n";

              echo "<a href=\"".base_url('index.php/management/wlan')."\" class=\"list-group-item";
              if(!strncmp($func, "wlan", 4))echo " active";
              echo "\">".$this->lang->line('item_4_6')."</a>"."\n";
            }
          ?>
          </div>
        </aside>

        <article class="col-md-9 col-md-pull-3">
          <div class="panel panel-default">
            <div class="panel-heading">
              <?php echo $this->lang->line("function_$func")?>
              <!-- <ol class="breadcrumb">
                <li><a href="<?php echo base_url('index.php');?>">Home</a></li>
                <li><a href="<?php echo base_url("index.php/$page");?>"><?php echo $page?></a></li>
                <li class="active"><?php echo $this->lang->line("function_$func")?></li>
              </ol> -->
            </div>
            <div class="panel-body">

<!-- <div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Warning!</strong> Better check yourself, you're not looking too good.
</div> -->
