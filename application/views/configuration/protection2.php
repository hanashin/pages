<form id="defaultForm" method="post" action="<?php echo base_url('index.php/configuration/set_protection2');?>" class="form-horizontal" role="form">
  <fieldset>
    <legend><?php echo $this->lang->line('protection_select')?></legend>

    <div class="form-group">    
      <label class="col-sm-5 control-label"><?php echo $this->lang->line('protection_select_inverter')?></label>
      <div class="col-sm-4">
        <select name='inverter' class="form-control">";
          <option value="all"><?php echo $this->lang->line('protection_select_inverter_all')?></option>
          <?php
            foreach ($ids as $key => $value) {
                echo "<option value=\"$value\">".$value."</option>";
            }
          ?>
        </select>
      </div>
    </div>
  </fieldset>

  <fieldset>
    <legend><?php echo $this->lang->line('protection_set')?></legend>

    <div class="form-group">
      <label for="inputdata1" class="col-sm-5 control-label"><?php echo $this->lang->line('protection_under_voltage_fast')?></label>
      <div class="col-sm-4">
        <input type="text" name="under_voltage_fast" class="form-control" id="inputdata1" placeholder="<?php echo $under_voltage_fast;?>">
      </div>
    </div>

    <div class="form-group">
      <label for="inputdata2" class="col-sm-5 control-label"><?php echo $this->lang->line('protection_over_voltage_fast')?></label>
      <div class="col-sm-4">
        <input type="text" name="over_voltage_fast" class="form-control" id="inputdata2" placeholder="<?php echo $over_voltage_fast;?>">
      </div>
    </div>

    <div class="form-group">
      <label for="inputdata3" class="col-sm-5 control-label"><?php echo $this->lang->line('protection_under_voltage_slow')?></label>
      <div class="col-sm-4">
        <input type="text" name="under_voltage_slow" class="form-control" id="inputdata3" placeholder="<?php echo $under_voltage_slow;?>">
      </div>
    </div>

    <div class="form-group">
      <label for="inputdata4" class="col-sm-5 control-label"><?php echo $this->lang->line('protection_over_voltage_slow')?></label>
      <div class="col-sm-4">
        <input type="text" name="over_voltage_slow" class="form-control" id="inputdata4" placeholder="<?php echo $over_voltage_slow;?>">
      </div>
    </div>

    <div class="form-group">
      <label for="inputdata5" class="col-sm-5 control-label"><?php echo $this->lang->line('protection_under_frequency_fast')?></label>
      <div class="col-sm-4">
        <input type="text" name="under_frequency_fast" class="form-control" id="inputdata5" placeholder="<?php echo $under_frequency_fast;?>">
      </div>
    </div>

    <div class="form-group">
      <label for="inputdata6" class="col-sm-5 control-label"><?php echo $this->lang->line('protection_over_frequency_fast')?></label>
      <div class="col-sm-4">
        <input type="text" name="over_frequency_fast" class="form-control" id="inputdata6" placeholder="<?php echo $over_frequency_fast;?>">
      </div>
    </div>

    <div class="form-group">
      <label for="inputdata7" class="col-sm-5 control-label"><?php echo $this->lang->line('protection_under_frequency_slow')?></label>
      <div class="col-sm-4">
        <input type="text" name="under_frequency_slow" class="form-control" id="inputdata7" placeholder="<?php echo $under_frequency_slow;?>">
      </div>
    </div>

    <div class="form-group">
      <label for="inputdata8" class="col-sm-5 control-label"><?php echo $this->lang->line('protection_over_frequency_slow')?></label>
      <div class="col-sm-4">
        <input type="text" name="over_frequency_slow" class="form-control" id="inputdata8" placeholder="<?php echo $over_frequency_slow;?>">
      </div>
    </div>

    <div class="form-group">
      <label for="inputdata9" class="col-sm-5 control-label"><?php echo $this->lang->line('protection_voltage_triptime_fast')?></label>
      <div class="col-sm-4">
        <input type="text" name="voltage_triptime_fast" class="form-control" id="inputdata9" placeholder="<?php echo $voltage_triptime_fast;?>">
      </div>
    </div>

    <div class="form-group">
      <label for="inputdata10" class="col-sm-5 control-label"><?php echo $this->lang->line('protection_voltage_triptime_slow')?></label>
      <div class="col-sm-4">
        <input type="text" name="voltage_triptime_slow" class="form-control" id="inputdata10" placeholder="<?php echo $voltage_triptime_slow;?>">
      </div>
    </div>

    <div class="form-group">
      <label for="inputdata11" class="col-sm-5 control-label"><?php echo $this->lang->line('protection_frequency_triptime_fast')?></label>
      <div class="col-sm-4">
        <input type="text" name="frequency_triptime_fast" class="form-control" id="inputdata11" placeholder="<?php echo $frequency_triptime_fast;?>">
      </div>
    </div>

    <div class="form-group">
      <label for="inputdata12" class="col-sm-5 control-label"><?php echo $this->lang->line('protection_frequency_triptime_slow')?></label>
      <div class="col-sm-4">
        <input type="text" name="frequency_triptime_slow" class="form-control" id="inputdata12" placeholder="<?php echo $frequency_triptime_slow;?>">
      </div>
    </div>

    <div class="form-group">
      <label for="inputdata13" class="col-sm-5 control-label"><?php echo $this->lang->line('protection_grid_recovery_time')?></label>
      <div class="col-sm-4">
        <input type="text" name="grid_recovery_time" class="form-control" id="inputdata13" placeholder="<?php echo $grid_recovery_time;?>">
      </div>
    </div>
  </fieldset>

  <div class="form-group">
    <div class="col-sm-offset-5 col-sm-2">
      <button type="submit" class="btn btn-default"><?php echo $this->lang->line('protection_setting')?></button>
    </div>
  </div>
</form>
<center>
  <?php echo $this->lang->line("protection_result_$result")?>
</center>

<?php echo form_open('configuration/read_inverter_parameters');?>
  <center>
    <input name="flag" type="hidden" value="2">
    <button type="submit" class="btn btn-default"><?php echo $this->lang->line('protection_read_inverter_parameters')?></button>
  </center>
</from>

<fieldset>
  <legend><?php echo $this->lang->line('protection_actual_value')?></legend>

  <div class="table-responsive-mystyle">
    <table class="table table-condensed table-striped table-hover-mystyle">
      <thead>
        <tr>
          <?php
            if(!empty($parameters))
            {
              echo "<th>".$this->lang->line('protection_inverter_id')."</th>";
              echo "<th>".$this->lang->line('protection_under_voltage_fast')."</th>";
              echo "<th>".$this->lang->line('protection_over_voltage_fast')."</th>";
              echo "<th>".$this->lang->line('protection_under_voltage_slow')."</th>";
              echo "<th>".$this->lang->line('protection_over_voltage_slow')."</th>";
              echo "<th>".$this->lang->line('protection_under_frequency_fast')."</th>";
              echo "<th>".$this->lang->line('protection_over_frequency_fast')."</th>";
              echo "<th>".$this->lang->line('protection_under_frequency_slow')."</th>";
              echo "<th>".$this->lang->line('protection_over_frequency_slow')."</th>";
              echo "<th>".$this->lang->line('protection_voltage_triptime_fast')."</th>";
              echo "<th>".$this->lang->line('protection_voltage_triptime_slow')."</th>";
              echo "<th>".$this->lang->line('protection_frequency_triptime_fast')."</th>";
              echo "<th>".$this->lang->line('protection_frequency_triptime_slow')."</th>";
              echo "<th>".$this->lang->line('protection_grid_recovery_time')."</th>";
            }
          ?>         
        </tr>
      </thead>
      <tbody>
      <?php
          foreach ($parameters as $value) 
          {
              echo "<tr>";
              echo "<td>".$value['inverter_id']."</td>";
              echo "<td>".$value['under_voltage_fast']."</td>";
              echo "<td>".$value['over_voltage_fast']."</td>";
              echo "<td>".$value['under_voltage_slow']."</td>";
              echo "<td>".$value['over_voltage_slow']."</td>";
              echo "<td>".$value['under_frequency_fast']."</td>";
              echo "<td>".$value['over_frequency_fast']."</td>";
              echo "<td>".$value['under_frequency_slow']."</td>";
              echo "<td>".$value['over_frequency_slow']."</td>";
              echo "<td>".$value['voltage_triptime_fast']."</td>";
              echo "<td>".$value['voltage_triptime_slow']."</td>";
              echo "<td>".$value['frequency_triptime_fast']."</td>";
              echo "<td>".$value['frequency_triptime_slow']."</td>";
              echo "<td>".$value['grid_recovery_time']."</td>";       
              echo "</tr>";
          }
      ?>
      </tbody>
    </table>
  </div>
</fieldset>

<script>
$(document).ready(function() {
    $('#defaultForm').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
            under_voltage_fast: {
                validators: {
                    stringLength: {
                        max: 16,
                        message: 'The input string must be less than 16 characters long'
                    },
                    regexp: {
                        regexp: /^\d{0,3}$/,
                        message: '<?php echo $this->lang->line('validform_under_voltage_fast')?>'
                    }
                }
            },
            over_voltage_fast: {
                validators: {
                    stringLength: {
                        max: 16,
                        message: 'The input string must be less than 16 characters long'
                    },
                    regexp: {
                        regexp: /^\d{0,3}$/,
                        message: '<?php echo $this->lang->line('validform_over_voltage_fast')?>'
                    }
                }
            },
            under_voltage_slow: {
                validators: {
                    stringLength: {
                        max: 16,
                        message: 'The input string must be less than 16 characters long'
                    },
                    regexp: {
                        regexp: /^\d{0,3}$/,
                        message: '<?php echo $this->lang->line('validform_under_voltage_slow')?>'
                    }
                }
            },
            over_voltage_slow: {
                validators: {
                    stringLength: {
                        max: 16,
                        message: 'The input string must be less than 16 characters long'
                    },
                    regexp: {
                        regexp: /^\d{0,3}$/,
                        message: '<?php echo $this->lang->line('validform_over_voltage_slow')?>'
                    }
                }
            },
            under_frequency_fast: {
                validators: {
                    stringLength: {
                        max: 16,
                        message: 'The input string must be less than 16 characters long'
                    },
                    regexp: {
                        regexp: /^0*\d{1,2}(\.\d)?$/,
                        message: '<?php echo $this->lang->line('validform_under_frequency_fast')?>'
                    }
                }
            },
            over_frequency_fast: {
                validators: {
                    stringLength: {
                        max: 16,
                        message: 'The input string must be less than 16 characters long'
                    },
                    regexp: {
                        regexp: /^0*\d{1,2}(\.\d)?$/,
                        message: '<?php echo $this->lang->line('validform_over_frequency_fast')?>'
                    }
                }
            },
            under_frequency_slow: {
                validators: {
                    stringLength: {
                        max: 16,
                        message: 'The input string must be less than 16 characters long'
                    },
                    regexp: {
                        regexp: /^0*\d{1,2}(\.\d)?$/,
                        message: '<?php echo $this->lang->line('validform_under_frequency_slow')?>'
                    }
                }
            },
            over_frequency_slow: {
                validators: {
                    stringLength: {
                        max: 16,
                        message: 'The input string must be less than 16 characters long'
                    },
                    regexp: {
                        regexp: /^0*\d{1,2}(\.\d)?$/,
                        message: '<?php echo $this->lang->line('validform_over_frequency_slow')?>'
                    }
                }
            },
            voltage_triptime_fast: {
                validators: {
                    stringLength: {
                        max: 16,
                        message: 'The input string must be less than 16 characters long'
                    },
                    regexp: {
                        regexp: /^0*(1|1(\.[0]{1,2})?|0(\.[\d]{1,2})?)$/,
                        message: '<?php echo $this->lang->line('validform_voltage_triptime_fast')?>'
                    }
                }
            },
            voltage_triptime_slow: {
                validators: {
                    stringLength: {
                        max: 16,
                        message: 'The input string must be less than 16 characters long'
                    },
                    regexp: {
                        regexp: /^0*\d{1,2}(\.\d{1,2})?$/,
                        message: '<?php echo $this->lang->line('validform_voltage_triptime_slow')?>'
                    }
                }
            },
            frequency_triptime_fast: {
                validators: {
                    stringLength: {
                        max: 16,
                        message: 'The input string must be less than 16 characters long'
                    },
                    regexp: {
                        regexp: /^0*(1|1(\.[0]{1,2})?|0(\.[\d]{1,2})?)$/,
                        message: '<?php echo $this->lang->line('validform_frequency_triptime_fast')?>'
                    }
                }
            },
            frequency_triptime_slow: {
                validators: {
                    stringLength: {
                        max: 16,
                        message: 'The input string must be less than 16 characters long'
                    },
                    regexp: {
                        regexp: /^0*\d{1,2}(\.\d{1,2})?$/,
                        message: '<?php echo $this->lang->line('validform_frequency_triptime_slow')?>'
                    }
                }
            },
            grid_recovery_time: {
                validators: {
                    stringLength: {
                        max: 16,
                        message: 'The input string must be less than 16 characters long'
                    },
                    regexp: {
                        regexp: /^\d{0,5}$/,
                        message: '<?php echo $this->lang->line('validform_grid_recovery_time')?>'
                    }
                }
            }
        }
    });
});
</script>