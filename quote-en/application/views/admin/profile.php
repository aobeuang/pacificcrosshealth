<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>User Profile <small>Activity report</small></h2>
            <ul class="nav navbar-right panel_toolbox">

            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

              <div class="profile_img">

                <!-- end of image cropping -->
                <div id="crop-avatar">
                  <!-- Current avatar -->
                   <?php echo img( array(
                                  'src' => 'htdocs/uploaded/profile_admin.png',
                                  'alt' => 'Avatar',
                                  'class' => 'img-responsive avatar-view',
                                  'title' => 'Change the avatar'
                              ) ); 
                   ?>
<!--                   <img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar">
 -->
                  <!-- Cropping modal -->
                  <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <form class="avatar-form" action="crop.php" enctype="multipart/form-data" method="post">
                          <div class="modal-header">
                            <button class="close" data-dismiss="modal" type="button">&times;</button>
                            <h4 class="modal-title" id="avatar-modal-label">Change Avatar</h4>
                          </div>
                          <div class="modal-body">
                            <div class="avatar-body">

                              <!-- Upload image and data -->
                              <div class="avatar-upload">
                                <input class="avatar-src" name="avatar_src" type="hidden">
                                <input class="avatar-data" name="avatar_data" type="hidden">
                                <label for="avatarInput">Local upload</label>
                                <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
                              </div>

                              <!-- Crop and preview -->
                              <div class="row">
                                <div class="col-md-9">
                                  <div class="avatar-wrapper"></div>
                                </div>
                                <div class="col-md-3">
                                  <div class="avatar-preview preview-lg"></div>
                                  <div class="avatar-preview preview-md"></div>
                                  <div class="avatar-preview preview-sm"></div>
                                </div>
                              </div>

                              <div class="row avatar-btns">
                                <div class="col-md-9">
                                  <div class="btn-group">
                                    <button class="btn btn-primary" data-method="rotate" data-option="-90" type="button" title="Rotate -90 degrees">Rotate Left</button>
                                    <button class="btn btn-primary" data-method="rotate" data-option="-15" type="button">-15deg</button>
                                    <button class="btn btn-primary" data-method="rotate" data-option="-30" type="button">-30deg</button>
                                    <button class="btn btn-primary" data-method="rotate" data-option="-45" type="button">-45deg</button>
                                  </div>
                                  <div class="btn-group">
                                    <button class="btn btn-primary" data-method="rotate" data-option="90" type="button" title="Rotate 90 degrees">Rotate Right</button>
                                    <button class="btn btn-primary" data-method="rotate" data-option="15" type="button">15deg</button>
                                    <button class="btn btn-primary" data-method="rotate" data-option="30" type="button">30deg</button>
                                    <button class="btn btn-primary" data-method="rotate" data-option="45" type="button">45deg</button>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <button class="btn btn-primary btn-block avatar-save" type="submit">Done</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- <div class="modal-footer">
                                            <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
                                          </div> -->
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- /.modal -->

                  <!-- Loading state -->
                  <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                </div>
                <!-- end of image cropping -->

              </div>
              <h3><?php echo $user['first_name']." ".$user['last_name'] ?></h3>

              <ul class="list-unstyled user_data">
                <li><i class="fa fa-map-marker user-profile-icon"></i> San Francisco, California, USA
                </li>

                <li>
                  <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
                </li>

                <li class="m-top-xs">
                  <i class="fa fa-external-link user-profile-icon"></i>
                  <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                </li>
              </ul>

              <a href="<?php echo base_url('admin/profile/changepassword'); ?>" class="btn btn-success"><i class="fa fa-lock m-right-xs"></i> Change Password</a>


            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                  </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                        
                  <div role="tabpanel" class="tab-pane fade active in" id="tab_content3" aria-labelledby="profile-tab">
                    <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                      photo booth letterpress, commodo enim craft beer mlkshk </p>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>