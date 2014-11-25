<form class="form-horizontal" role="form" action="<?php echo base_url('index.php/management/set_id');?>" method="post">
  <div class="form-group">    
    <div class="col-sm-offset-4 col-sm-4">
       <textarea class="form-control" name="ids" rows="10" autofocus><?php foreach ($ids as $value) {
          echo $value."\n";
        }?></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-4"> 
      <div class="btn-group btn-group-justified">
        <div class="btn-group">
          <button type="submit" class="btn btn-primary btn-sm"><?php echo $this->lang->line('button_update')?></button>
        </div>
        <div class="btn-group">
          <a href="<?php echo base_url('index.php/management/set_id_clear');?>" class="btn btn-primary btn-sm"><?php echo $this->lang->line('id_clear_id')?></a>
        </div>
      </div>
    </div>
  </div>
</form>

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