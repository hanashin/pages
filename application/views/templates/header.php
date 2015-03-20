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
    <link href="<?php echo base_url('css/jquery.onoff.css');?>" rel="stylesheet">
    
    <!--[if lt IE 8]>
      <link href="<?php echo base_url('css/bootstrap-ie7.css');?>" rel="stylesheet">
    <![endif]-->
    <script src="<?php echo base_url('js/jquery-1.8.2.min.js');?>"></script>
    <script src="<?php echo base_url('js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('js/bootstrapValidator.min.js');?>"></script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn"t work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->    
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
              <li><a id="ecu_title"><?php echo $this->lang->line('title_ecu');?></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <a class="btn chlang" id="english" ><?php echo $this->lang->line('language_english');?></a>|
              <a class="btn chlang" id="chinese" ><?php echo $this->lang->line('language_chinese');?></a>
            </ul>
<!--        <ul class="nav navbar-nav navbar-left">
              <li><a href="<?php echo base_url('index.php/home');?>" class="active"><span class="glyphicon energy-control"><img src="<?php echo base_url('images/icon1.png');?>"></span><?php echo $this->lang->line('energy_control')?></a></li>
              <li><a href="<?php echo base_url('index.php/home/faq');?>"><span class="glyphicon"><img src="<?php echo base_url('images/icon2.png');?>"></span><?php echo $this->lang->line('test')?></a></li>
              <li><a href="#"><span class="glyphicon"><img src="<?php echo base_url('images/icon3.png');?>"></span><?php echo $this->lang->line('faq')?></a></li>
            </ul>  -->
          </div>
        </div>
      </div>     
    </header>