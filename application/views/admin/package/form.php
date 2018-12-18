<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php echo form_open('', array('role'=>'form')); ?>

    <?php // hidden id ?>
    <?php if (isset($plan_id)) : ?>
        <?php echo form_hidden('id', $plan_id); ?>
    <?php endif; ?>

    <button type="submit" name="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Submit</button>
    <div class="clearfix"></div>

    <div class="row">
        <!-- Plan info -->
        <div class="col-md-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Plan Info</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="form-group">
                       <label for="plan_name">Plan Name <span class="text-danger">*</span> :</label>
                       <?php echo form_error('plan[name]', '<p class="text-danger">', '</p>'); ?>
                        <?php echo form_input(array('name'=>'plan[name]', 'value'=>set_value('name', (isset($plan['name']) ? $plan['name'] : '')), 'class'=>'form-control')); ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="plan_desc">Plan Description <span class="text-danger">*</span> :</label>
                        <?php echo form_error('plan[desc]', '<p class="text-danger">', '</p>'); ?>
                        <?php echo form_textarea(array('name'=>'plan[desc]', 'value'=>set_value('description', (isset($plan['description']) ? $plan['description'] : '')), 'class'=>'form-control')); ?>
                    </div>

                    <div class="form-group">
                        <label for="plan_rates">Plan Rates :</label>
                        <?php echo form_input(array('name'=>'plan[rates]', 'value'=>set_value('rates', (isset($plan['rates']) ? $plan['rates'] : '')), 'class'=>'form-control')); ?>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label for="plan_opd">OPD :</label>
                        <?php echo form_input(array('name'=>'plan[opd]', 'value'=>set_value('opd', (isset($plan['opd']) ? $plan['opd'] : '')), 'class'=>'form-control')); ?>
                        <span class="fa fa-user-md form-control-feedback right"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label for="plan_no_opd">No OPD :</label>
                        <?php echo form_input(array('name'=>'plan[no_opd]', 'value'=>set_value('no_opd', (isset($plan['no_opd']) ? $plan['no_opd'] : '')), 'class'=>'form-control')); ?>
                        <span class="fa fa-user-md form-control-feedback right"></span>
                    </div>

                    <div class="clearfix"></div>
                    <hr>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label for="deduct_40">deduct 40k :</label>
                        <?php echo form_input(array('name'=>'plan[deduct_40]', 'value'=>set_value('deduct_40', (isset($plan['deduct_40k']) ? $plan['deduct_40k'] : '')), 'class'=>'form-control')); ?>
                        <span class="fa fa-minus form-control-feedback right"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label for="deduct_100">deduct 100k :</label>
                        <?php echo form_input(array('name'=>'plan[deduct_100]', 'value'=>set_value('deduct_100', (isset($plan['deduct_100k']) ? $plan['deduct_100k'] : '')), 'class'=>'form-control')); ?>
                        <span class="fa fa-minus form-control-feedback right"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label for="deduct_200">deduct 200k :</label>
                        <?php echo form_input(array('name'=>'plan[deduct_200]', 'value'=>set_value('deduct_200', (isset($plan['deduct_200k']) ? $plan['deduct_200k'] : '')), 'class'=>'form-control')); ?>
                        <span class="fa fa-minus form-control-feedback right"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label for="deduct_300">deduct 300k :</label>
                        <?php echo form_input(array('name'=>'plan[deduct_300]', 'value'=>set_value('deduct_300', (isset($plan['deduct_300k']) ? $plan['deduct_300k'] : '')), 'class'=>'form-control')); ?>
                        <span class="fa fa-minus form-control-feedback right"></span>
                    </div>
                    
                </div>
            </div> <!-- x_panel -->  
        </div> <!-- col -->

        <!-- Age range -->
        <div class="col-md-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Age Range</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <?php 
                        $plan['age_ranges'] = unserialize( $plan['age_ranges'] );
                        $i = 0;
                     ?>

                    <?php foreach($plan['age_ranges'] as $key => $val): ?>

                        <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                            <label for="plan_age_ranges_<?=$key;?>_from">From :</label>
                            <input type="text" class="form-control" name="plan[ar][<?=$key;?>][from]" id="plan_age_ranges_<?=$key;?>_from" value="<?=$val['from']; ?>">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                            <label for="plan_age_ranges_<?=$key;?>_to">To :</label>
                            <input type="text" class="form-control" name="plan[ar][<?=$key;?>][to]" id="plan_age_ranges_<?=$key;?>_to" value="<?=$val['to']; ?>">
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                            <label for="plan_age_ranges_<?=$key;?>_price">Price :</label>
                            <input type="text" class="form-control" name="plan[ar][<?=$key;?>][price]" id="plan_age_ranges_<?=$key;?>_price" value="<?=$val['price']; ?>">
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group has-feedback">
                            <label for="plan_age_ranges_<?=$key;?>_dental">Dental <span class="text-danger">(Numeric Only)</span>:</label>
                            <input type="text" class="form-control numericOnly" name="plan[ar][<?=$key;?>][dental]" id="plan_age_ranges_<?=$key;?>_dental" value="<?php echo ( isset($val['dental']) ) ? $val['dental'] : 0 ?>">
                            <span class="fa fa-smile-o form-control-feedback right"></span>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group has-feedback">
                            <label for="plan_age_ranges_<?=$key;?>_vision">Vision <span class="text-danger">(Numeric Only)</span>:</label>
                            <input type="text" class="form-control numericOnly" name="plan[ar][<?=$key;?>][vision]" id="plan_age_ranges_<?=$key;?>_vision" value="<?php echo ( isset($val['vision']) ) ? $val['vision'] : 0 ?>">
                            <span class="fa fa-eye form-control-feedback right"></span>
                        </div>

                        <div class="clearfix"></div>
                        <hr>

                    <?php $i++; endforeach; ?>

                </div>
            </div> <!-- x_panel -->
        </div> <!-- col -->
    </div>

<?php echo form_close(); ?>
