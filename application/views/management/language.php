<form class="form-horizontal" role="form" action="<?php echo base_url('index.php/management/set_language');?>" method="post">
  <div class="form-group">    
    <label class="col-sm-5 control-label"><?php echo $this->lang->line('language_current_language')?></label>
    <div class="col-sm-4">
      <select name='language' class="form-control">";
        <option value="english" <?php if(!strncmp($language, "chinese", 7))
                                    echo "selected=\"selected\"";
                                ?>><?php echo $this->lang->line('language_english');?></option>
        <option value="chinese" <?php if(!strncmp($language, "chinese", 7))
                                    echo "selected=\"selected\"";
                                ?>><?php echo $this->lang->line('language_chinese');?></option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-5 col-sm-2">
      <button type="submit" class="btn btn-default"><?php echo $this->lang->line('language_update_language')?></button>
    </div>
  </div>
</form>

<script type="text/javascript">
function jumpurl(){  
    location="<?php echo base_url('index.php/management/language');?>";  
}
<?php
  if($result == "1")
  {
      echo "setTimeout('jumpurl()',0);";  
  }
?>    
</script>
