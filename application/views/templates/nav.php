<!-- 橙色导航栏 -->
<nav>
    <div class="navbar navbar-default navbar-orange">
        <div class="container">
            <p class="navbar-orange-title"><?php echo $this->lang->line('energy_control')?></p>     
            <div class="navbar-header">            
                <button class="navbar-toggle" data-target="#navbar-orange" data-toggle="collapse" type="button">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            
            <div class="navbar-collapse collapse" id="navbar-orange">
                <ul class="nav navbar-nav ">
                    <li><a href="<?php echo base_url('index.php/home');?>"<?php if(!strncmp($page, "home", 4)){echo " class=\"active\"";}?>><?php echo $this->lang->line('item_1')?></a></li>
                    <li><a href="<?php echo base_url('index.php/realtimedata');?>"<?php if(!strncmp($page, "realtimedata", 12)){echo " class=\"active\"";}?>><?php echo $this->lang->line('item_2')?></a><span> </span></li>
                    <li><a href="<?php echo base_url('index.php/management');?>"<?php if(!strncmp($page, "management", 10)){echo " class=\"active\"";}?>><?php echo $this->lang->line('item_4')?></a><span> </span></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
        
<section>
    <div class="container container-main">
        <!-- 侧边导航栏 -->
        <aside class="col-md-3 col-md-push-9">
            <div class="list-group">
                <?php if(!empty($nav))foreach($nav as $key => $value): ?>              
                    <a href="<?php echo base_url($value['url']); ?>" class="list-group-item <?php if($value['active'] == 1) echo 'active'; ?>"><?php echo $this->lang->line("function_{$value['name']}"); ?></a>
                <?php endforeach; ?>
                <?php if(!strncmp($page, "home", 4)): ?>
                    <a id="ecu_time" class="list-group-item align-center" ></a>
                    <a class="list-group-item active align-center"><?php echo $this->lang->line('home_environment_benefits');?></a>
                    <a class="list-group-item benefit align-center"><?php echo $this->lang->line('home_equivalent');?></a>
                    <a class="list-group-item benefit"><img src="<?php echo base_url('images/car.png'); ?>"><div class="pull-right"><center><?php echo $gallon; ?><br><?php echo $this->lang->line('home_gallons'); ?></center></div></a>
                    <a class="list-group-item benefit"><img src="<?php echo base_url('images/tree.png'); ?>"><div class="pull-right"><center><?php echo $tree; ?><br><?php echo $this->lang->line('home_trees'); ?></center></div></a>
                    <a class="list-group-item benefit"><img src="<?php echo base_url('images/carbon.png'); ?>"><div class="pull-right"><center><?php echo $kg; ?><br><?php echo $this->lang->line('home_kg'); ?></center></div></a>
                <?php endif; ?>
            </div>
        </aside>
        
        <!-- 正文 -->
        <article class="col-md-9 col-md-pull-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo $this->lang->line("function_$func");
                        if (!empty($table)){
                        echo " &#8680; ".$table;
                        }
                    ?>
                    <?php if (strncmp($page, "home", 4)): ?>
                    <div class="btn-group pull-right visible-xs">
                        <button type="button" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown">More <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu">
                            <?php foreach($nav as $key => $value): ?>              
                                <a href="<?php echo base_url($value['url']); ?>" class="list-group-item <?php if($value['active'] == 1) echo 'active'; ?>"><?php echo $this->lang->line("function_{$value['name']}"); ?></a>
                            <?php endforeach; ?>   
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
                                
                <div class="panel-body">