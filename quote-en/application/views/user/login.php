<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
  <div class="container">    
      <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
          <div class="panel panel-info" >
          <div class="panel-heading">
              <div class="panel-title">Sign In</div>
          </div>     

          <div style="padding-top:30px" class="panel-body" >

              <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                  
                <?php echo form_open('', array('class'=>'form-horizontal','role'=>'form')); ?>

                    <?php echo form_error('username', '<p class="text-danger">', '</p>'); ?>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <?php echo form_input(array('name'=>'username', 'id'=>'username', 'class'=>'form-control', 'placeholder'=>'username or email', 'maxlength'=>256)); ?>                                        
                    </div>
                      
                    <?php echo form_error('password', '<p class="text-danger">', '</p>'); ?>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <?php echo form_password(array('name'=>'password', 'id'=>'password', 'class'=>'form-control', 'placeholder'=>'Password', 'maxlength'=>72, 'autocomplete'=>'off')); ?>
                    </div>
                          

                      
                      <div class="input-group">
                          <div class="checkbox">
                            <label>
                              <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                            </label>
                          </div>
                        </div>


                      <div style="margin-top:10px" class="form-group">
                          <!-- Button -->

                          <div class="col-sm-12 controls">
                            <!-- <a id="btn-login" href="#" class="btn btn-success">Login  </a> -->
                            <?php echo form_submit(array('name'=>'submit', 'class'=>'btn btn-success'), 'Login' );?>
                          </div>
                      </div>


                      <div class="form-group">
                          <div class="col-md-12 control">
                              <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                  Don't have an account! 
                              <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                  Sign Up Here
                              </a>
                              </div>
                          </div>
                      </div>    
                  <?php echo form_close(); ?>
              </div>                     
          </div>  
      </div>
  </div>
