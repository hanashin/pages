<form class="form-horizontal" action="do_upload" method="post" enctype="multipart/form-data">
   <div class="form-group">    
        <label for="file" class="col-sm-5 control-label"><?php echo $this->lang->line('upload_filename');?></label>
        <div class="col-sm-4">
            <div class="input-group">
                <input type="file" name="file" id="file" style="display:none" onChange="document.getElementById('path').value=this.value"/>
                <div class="input-group">
                <input class="form-control" id="path" readonly>
                <span class="input-group-addon btn_upload" onclick="document.getElementById('file').click()"><?php echo $this->lang->line('upload_browse');?></span>
                </div>  
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-5 col-sm-5">
          <input class="btn btn-primary btn-sm" type="submit" name="submit" value="<?php echo $this->lang->line('button_ok');?>" />
        </div>
    </div>
</form>