<div class="navbar-default sidebar" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url('/'); ?>">Admin</a>
<!--        <ul id="session-language-dropdown" class="language-link pull-right">-->
<!--            --><?php //foreach ($this->languages as $key=>$name) : ?>
<!--                <li>-->
<!--                    <a href="#" rel="--><?php //echo $key; ?><!--">-->
<!--                        --><?php //if ($key == $this->session->language) : ?>
<!--                            <i class="fa fa-check selected-session-language"></i>-->
<!--                        --><?php //endif; ?>
<!--                        --><?php //echo $key=='thai'?'th':'en'; ?>
<!--                    </a>-->
<!--                </li>-->
<!--            --><?php //endforeach; ?>
<!--        </ul>-->
    </div>

    <div class="sidebar-nav navbar-collapse" style="clear:both">
        <?php // Nav bar left ?>
        <ul class="nav" id="side-menu">
            <li><a href="<?php echo site_url('/'); ?>"><i class="fa fa-home fa-fw"></i> Site</a></li>
            <li class="<?php echo (uri_string() == 'admin' OR uri_string() == 'admin/dashboard') ? 'active' : ''; ?>">
                <a href="<?php echo site_url('/admin'); ?>">
                <i class="fa fa-dashboard fa-fw"></i>  <?php echo lang('admin button dashboard'); ?></a></li>
            <?php if (ENVIRONMENT == 'development') :?>
            <li class="<?php echo (uri_string() == 'admin' OR uri_string() == 'admin/developer') ? 'active' : ''; ?>">
                <a href="<?php echo site_url('/admin/developer'); ?>">
                <i class="fa fa-codepen fa-fw"></i>  <?php echo lang('admin button developer'); ?></a></li>
            <?php endif; ?>
            <li class="dropdown<?php echo (strstr(uri_string(), 'admin/content')) ? ' active' : ''; ?>">
                <a href="#"><i class="fa fa-file fa-fw"></i> <?php echo lang('admin button content'); ?> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="<?php echo (uri_string() == 'admin/content/page') ? 'active' : ''; ?>">
                        <a href="<?php echo site_url('/admin/content/page'); ?>"><?=lang('admin button content_page_list')?></a></li>
                    <li class="<?php echo (uri_string() == 'admin/content/news') ? 'active' : ''; ?>">
                        <a href="<?php echo site_url('/admin/content/news'); ?>"><?=lang('admin button content_news_list')?></a></li>
                    <li class="<?php echo (uri_string() == 'admin/content/add') ? 'active' : ''; ?>">
                        <a href="<?php echo site_url('/admin/content/add'); ?>"><?php echo lang('admin button content_add'); ?></a></li>
                </ul>
            </li>
            <li class="dropdown<?php echo (strstr(uri_string(), 'admin/company')) ? ' active' : ''; ?>">
                <a href="#"><i class="fa fa-building fa-fw"></i> <?php echo lang('admin button company'); ?> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="<?php echo (uri_string() == 'admin/company') ? 'active' : ''; ?>">
                        <a href="<?php echo site_url('/admin/company'); ?>"><?=lang('admin button company_list')?></a></li>
                    <li class="<?php echo (uri_string() == 'admin/company/add') ? 'active' : ''; ?>">
                        <a href="<?php echo site_url('/admin/company/add'); ?>"><?php echo lang('admin button company_add'); ?></a></li>
                </ul>
            </li>
            <li class="dropdown<?php echo (strstr(uri_string(), 'admin/users')) ? ' active' : ''; ?>">
                <a href="#"><i class="fa fa-child fa-fw"></i> <?php echo lang('admin button users'); ?> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="<?php echo (uri_string() == 'admin/users') ? 'active' : ''; ?>">
                        <a href="<?php echo site_url('/admin/users'); ?>"><?php echo lang('admin button users_list'); ?></a></li>
                    <li class="<?php echo (uri_string() == 'admin/users/add') ? 'active' : ''; ?>">
                        <a href="<?php echo site_url('/admin/users/add'); ?>"><?php echo lang('admin button users_add'); ?></a></li>
                </ul>
            </li>
            <li class="<?php echo (uri_string() == 'admin/contact') ? 'active' : ''; ?>">
                <a href="<?php echo site_url('/admin/contact'); ?>"><i class="fa fa-envelope-o fa-fw"></i> <?php echo lang('admin button messages'); ?></a></li>
        
            
            <li class="dropdown<?php echo (strstr(uri_string(), 'admin/report')) ? ' active' : ''; ?>">
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> <?php echo lang('admin button report'); ?> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="<?php echo (uri_string() == 'admin/report/dividend') ? 'active' : ''; ?>">
                        <a href="<?php echo site_url('/admin/report/dividend'); ?>"><?php echo lang('admin button report_dividend'); ?></a></li>
                    <li class="<?php echo (uri_string() == 'admin/report/register') ? 'active' : ''; ?>">
                        <a href="<?php echo site_url('/admin/report/register'); ?>"><?php echo lang('admin button report_register'); ?></a></li>
                    <li class="<?php echo (uri_string() == 'admin/report/register') ? 'active' : ''; ?>">
                        <a href="<?php echo site_url('/admin/report/transaction'); ?>"><?php echo lang('admin button report_transaction'); ?></a></li>
                    <li class="<?php echo (uri_string() == 'admin/report/inform_transfer') ? 'active' : ''; ?>">
                        <a href="<?php echo site_url('/admin/report/inform_transfer'); ?>"><?php echo lang('admin button report_inform_transfer'); ?></a></li>
                </ul>
            </li>



            <li class="<?php echo (uri_string() == 'admin/settings') ? 'active' : ''; ?>">
                <a href="<?php echo site_url('/admin/settings'); ?>"><i class="fa fa-gear fa-fw"></i> <?php echo lang('admin button settings'); ?></a></li>
            <li>
            <a href="<?php echo site_url('logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> <?php echo lang('core button logout'); ?></a></li>
            <li>
            <div class="col-lg-12" style="margin-top: 50px">
<!--                    <p class="text-muted">-->
<!--                        --><?php //echo lang('core text page_rendered'); ?><!--<br/>-->
<!--                        CodeIgniter v--><?php //echo CI_VERSION; ?><!--<br/>-->
<!--                        <b>--><?php //echo $this->settings->site_name; ?><!--</b> v--><?php //echo $this->settings->site_version; ?><!--<br/>-->
<!--                        <a href="https://bitbucket.org/soilfish_devs/focuseasy" target="_blank">Bitbucket.com</a>-->
<!--                    </p>-->
                    <?php // language switcher ?>
                   <!--  <span class="dropdown">
                        <button id="session-language" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default">
                            <i class="fa fa-language"></i>
                            <span class="caret"></span>
                        </button>
                        <ul id="session-language-dropdown" class="dropdown-menu" role="menu" aria-labelledby="session-language">
                            <?php foreach ($this->languages as $key=>$name) : ?>
                                <li>
                                    <a href="#" rel="<?php echo $key; ?>">
                                        <?php if ($key == $this->session->language) : ?>
                                            <i class="fa fa-check selected-session-language"></i>
                                        <?php endif; ?>
                                        <?php echo $name; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </span> -->
                </div>
            </li>
        </ul>
        <?php // Nav bar right ?>
    </div>
    <!-- /.sidebar-collapse -->
</div>