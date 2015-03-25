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
<!--      <ul class="nav navbar-nav navbar-right"><li><a></a></li></ul> -->
            <ul class="nav navbar-nav ">
              <li><a href="<?php echo base_url('index.php/home');?>"<?php if(!strncmp($page, "home", 4)){echo " class=\"active\"";}?>><?php echo $this->lang->line('item_1')?></a></li>
              <li><a href="<?php echo base_url('index.php/realtimedata');?>"<?php if(!strncmp($page, "realtimedata", 12)){echo " class=\"active\"";}?>><?php echo $this->lang->line('item_2')?></a><span> </span></li>
<!--        <li><a href="<?php echo base_url('index.php/configuration');?>"<?php if(!strncmp($page, "configuration", 13)){echo " class=\"active\"";}?>><?php echo $this->lang->line('item_3')?></a><span> </span></li> -->
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
          <?php
            //主页 
            if(!strncmp($page, "home", 4))
            {
              echo "<a id=\"ecu_time\" class=\"list-group-item align-center\"></a>";
              echo "<a class=\"list-group-item active align-center\">".$this->lang->line('home_environment_benefits')."</a>";
              echo "<a class=\"list-group-item benefit align-center\">".$this->lang->line('home_equivalent')."</a>";
              echo "<a class=\"list-group-item benefit\"><img src=\"".base_url('images/car.png')."\"><div class=\"pull-right\"><center>$gallon<br>".$this->lang->line('home_gallons')."</center></div></a>";
              echo "<a class=\"list-group-item benefit\"><img src=\"".base_url('images/tree.png')."\"><div class=\"pull-right\"><center>$tree<br>".$this->lang->line('home_trees')."</center></div></a>";
              echo "<a class=\"list-group-item benefit\"><img src=\"".base_url('images/carbon.png')."\"><div class=\"pull-right\"><center>$kg<br>".$this->lang->line('home_kg')."</center></div></a>";
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

//               echo "<a href=\"".base_url('index.php/realtimedata/inverter_status')."\" class=\"list-group-item";
//               if(!strncmp($func, "inverter_status", 15))echo " active";
//               echo "\">".$this->lang->line('item_2_4')."</a>"."\n";
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

//               echo "<a href=\"".base_url('index.php/configuration/maxpower')."\" class=\"list-group-item";
//               if(!strncmp($func, "maxpower", 8))echo " active";
//               echo "\">".$this->lang->line('item_3_4')."</a>"."\n";
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

              echo "<a href=\"".base_url('index.php/management/wlan')."\" class=\"list-group-item";
              if(!strncmp($func, "wlan", 4))echo " active";
              echo "\">".$this->lang->line('item_4_6')."</a>"."\n";
            }
          ?>
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
              <div class="btn-group pull-right visible-xs">
              <?php
                if(strncmp($page, "home", 4) && strncmp($page, "display", 7) && strncmp($page, "hidden", 6))
                  echo <<<EOF
  <button type="button" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown">
    More <span class="caret"></span>
  </button>         
EOF;
                echo "<ul class=\"dropdown-menu\" role=\"menu\">";
                //注：与侧边导航栏内容保持一致！
                  //主页 
                  if(!strncmp($page, "home", 4))
                  {
                    echo "<a id=\"ecu_time\" class=\"list-group-item active\"></a>";
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

//                     echo "<a href=\"".base_url('index.php/realtimedata/inverter_status')."\" class=\"list-group-item";
//                     if(!strncmp($func, "inverter_status", 15))echo " active";
//                     echo "\">".$this->lang->line('item_2_4')."</a>"."\n";
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

//                     echo "<a href=\"".base_url('index.php/configuration/maxpower')."\" class=\"list-group-item";
//                     if(!strncmp($func, "maxpower", 8))echo " active";
//                     echo "\">".$this->lang->line('item_3_4')."</a>"."\n";
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

                    echo "<a href=\"".base_url('index.php/management/wlan')."\" class=\"list-group-item";
                    if(!strncmp($func, "wlan", 4))echo " active";
                    echo "\">".$this->lang->line('item_4_6')."</a>"."\n";
                  }                              
              ?>
                </ul>
              </div>
            </div>

            <div class="panel-body">
            <!-- 设置结果显示框 -->