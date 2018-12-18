    <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

	<style>
		.picker__select--month, .picker__select--year {
			height: auto;
		}
	</style>

    <div class="container">
        <div class="row census-intro">
	        <div class="row contentRow">
	        	<div class="col-md-12">
	        		<h3>Find the right plan</h3>
	        	</div>
	        </div>
        </div>
    </div>

    <div class="container census-section">
    	<div class="row quoteContentBackground census-container">
        	<div class="container">
            	<div class="row margin0">
                	<div class="col-md-8 col-8-white census-left">
                		<?php if(!isset($plans)): ?>
	                	    <?php echo form_open('/step2', array('id'=>'frmQuoteCensus','class'=>'form-horizontal','role'=>'form')); ?>

								<div class="rowFluid"> 
								    <div class="col-xs-12 col-sm-6">
										<h3>Applicant's Details</h3>
									</div>
								</div>
								<div class="rowFluid"> 
								    <div class="col-xs-12 col-sm-6">
									    <label>Date of Birth</label>
								    	<?php echo form_error('txt-date', '<p class="text-danger">', '</p>'); ?>
								        <?php echo form_input(array('name'=>'txt-date', 'id'=>'txt-date', 'class'=>'form-control hasDatepicker', 'placeholder'=>'', 'value' => set_value('txt-date') )); ?>           
								    </div>
								</div>

								<div class="rowFluid"> 
								    <div class="col-xs-12 col-sm-6">
										<?php echo form_label('Application\'s Name', 'txt-appName'); ?>
								    	<?php echo form_error('txt-appName', '<p class="text-danger">', '</p>'); ?>
								        <?php echo form_input(array('name'=>'txt-appName', 'id'=>'txt-appName', 'class'=>'form-control text-input', 'placeholder'=>'', 'value' => set_value('txt-appName') )); ?>           
								    </div>
								</div>

								<div class="rowFluid"> 
								    <div class="col-xs-12 col-sm-6">
										<h3>Contact Details</h3>
									</div>
								</div>
								<div class="rowFluid"> 
								    <div class="col-xs-12 col-sm-6">
										<?php echo form_label('Name', 'txt-name'); ?>
								    	<?php echo form_error('txt-name', '<p class="text-danger">', '</p>'); ?>
								        <?php echo form_input(array('name'=>'txt-name', 'id'=>'txt-name', 'class'=>'form-control text-input', 'placeholder'=>'', 'value' => set_value('txt-name') )); ?>           
								    </div>
								</div>
								<div class="rowFluid"> 
								    <div class="col-xs-12 col-sm-6">
										<?php echo form_label('Telephone', 'txt-phone'); ?>
								    	<?php echo form_error('txt-phone', '<p class="text-danger">', '</p>'); ?>
								        <?php echo form_input(array('name'=>'txt-phone', 'id'=>'txt-phone', 'class'=>'form-control text-input', 'placeholder'=>'', 'value' => set_value('txt-phone') )); ?>           
								    </div>
								</div>

								<div class="rowFluid"> 
								    <div class="col-xs-12 col-sm-6">
								    	<?php echo form_label('Email', 'txt-email'); ?>
								    	<?php echo form_error('txt-email', '<p class="text-danger">', '</p>'); ?>
								        <?php echo form_input(array('name'=>'txt-email', 'id'=>'txt-email', 'class'=>'form-control text-input', 'placeholder'=>'', 'value' => set_value('txt-email') )); ?>           
								    </div>
								</div>
	                        
	                             <div class="rowFluid">
		                             <div class="col-xs-12 col-sm-6">
		                                <?php echo form_submit(array('name'=>'submit', 'class'=>'btn btn-success btn-block mb-10 text-input'), 'Click to Get a Quote' );?>
	                            	</div>
								</div>
	                  		<?php echo form_close(); ?>
                  		<?php endif; ?>	


					</div>
		            <div class="col-md-4 col-4-blue census-right">
		                <div class="notifications-content" style="display: block;">
		                	<div>
		                		<img class="img-responsive" src="<?php echo base_url(); ?>htdocs/themes/default/images/quote-stet1-right-en.png" alt="">
		                	</div>
		                </div>
		            </div>
            	</div>
        	</div>
    	</div>
	</div>


	<!-- Contact op -->
	<div id="modal-op" class="modal modal-pchi fade" role="dialog">
	  <div class="modal-dialog modal-md">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Customer Service</h4>
	      </div>
	      <div class="modal-body">
	        <p>กรุณาติดต่อเจ้าหน้าที่ลูกค้าสัมพันธ์</p>
	      </div>
	    </div>

	  </div>
	</div>
