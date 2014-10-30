<!-- 载入表单辅助函数创建一个开始form标签 -->
<?php echo form_open('management/set_id'); ?>
  <div class="form-group">    
    <div class="col-sm-offset-4 col-sm-4">
       <textarea class="form-control" name="ids" rows="10"><?php foreach ($ids as $value) {
          echo $value."\n";
        }?></textarea>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-2">
      <button type="submit" class="btn btn-default btn-sm"><?php echo $this->lang->line('button_update')?></button>
    </div>
          
</form>
<?php echo form_open('management/set_id_clear'); ?>
    <div class="col-sm-2">
      <button type="submit" class="btn btn-default btn-sm"><?php echo $this->lang->line('id_clear_id')?></button>
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