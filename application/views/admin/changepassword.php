<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Change password</h2>
        <ul class="nav navbar-right panel_toolbox">

        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />

        <?php echo form_open('', array('role'=>'form', 'class' => 'form-horizontal form-label-left')); ?>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="npassword">New Password <span class="text-danger">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
					<?php echo form_error('npassword', '<p class="text-danger">', '</p>'); ?>
                     <?php echo form_password(array('name'=>'npassword', 'class'=>'form-control col-md-7 col-xs-12')); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12" for="cpassword">New Password (Again) <span class="text-danger">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            		<?php echo form_error('cpassword', '<p class="text-danger">', '</p>'); ?>
                     <?php echo form_password(array('name'=>'cpassword', 'class'=>'form-control col-md-7 col-xs-12')); ?>
            </div>
          </div>


          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" class="btn btn-primary">Cancel</button>
              <button type="submit" name="submit" class="btn btn-success">Submit</button>
            </div>
          </div>

		<?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>