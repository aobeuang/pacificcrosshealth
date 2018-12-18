<div class="navbar-mini">
    <div class="container">
        <div class="col-xs-6">
            <a href="http://www.focus-easy.com" class="site-link">www.focus-easy.com</a>
        </div>
        <?php if (false): ?>
        <div class="col-xs-6" style="text-align: right">
            <ul class="language-link">
                <li>
                    <a href="<?=$this->lang->switch_uri('en')?>" class="<?=($key == get_lang())?'active':''?>">
                        <img src="<?=base_url('themes/default/img/flag_english.jpg')?>" width="28px" />
                        <?php echo lang('core switch_lang english') ?>
                    </a>
                </li>
                <li>
                    <a href="<?=$this->lang->switch_uri('th')?>" class="<?=($key == get_lang())?'active':''?>">
                        <img src="<?=base_url('themes/default/img/flag_thai.jpg')?>" width="28px" />
                        <?php echo lang('core switch_lang thai') ?>
                    </a>
                </li>
            </ul>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php // Fixed navbar ?>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only"><?php echo lang('core button toggle_nav'); ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=site_url('/')?>">
                <img src="<?=base_url('themes/default/img/logo.png')?>" alt="<?php echo $this->settings->site_name; ?>" />
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            
            <?php // Nav bar left ?>
            <ul class="nav navbar-nav">
                <li class="<?php echo (uri_string() == '') ? 'active' : ''; ?>">
                    <?=anchor('/', lang('core menu home'))?>
                </li>
                <?php
                $company_menu = "";
                if (uri_string() == 'p/company-type' || uri_string() == 'p/company-service'
                    || uri_string() == 'p/company-location' || uri_string() == 'p/company-price') {
                    $company_menu = "active";
                }
                ?>
                <li class="<?=$company_menu?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php echo lang('core menu company'); ?>
                        <!-- <span class="caret"></span> -->
                    </a>
                    <ul class="dropdown-menu">
                        <li><?=anchor('search/company?sort=category&dir=asc', lang('core menu company type'))?></li>
                        <li><?=anchor('search/company?sort=place&dir=asc', lang('core menu company location'))?></li>
                        <li><?=anchor('search/company?sort=service&dir=asc', lang('core menu company service'))?></li>
                        <li><?=anchor('search/company?sort=price&dir=asc', lang('core menu company price'))?></li>
                    </ul>
                </li>
                <?php
                $promotion_menu = "";
                if (uri_string() == 'p/promotion-latest' || uri_string() == 'p/promotion-news') {
                    $promotion_menu = "active";
                }
                ?>
                <li class="<?=$promotion_menu?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php echo lang('core menu promotion'); ?>
                        <!-- <span class="caret"></span> -->
                    </a>
                    <ul class="dropdown-menu">
                        <li><?=anchor($this->lang->lang().'/p/promotion-latest', lang('core menu promotion latest'))?></li>
                        <li><?=anchor($this->lang->lang().'/p/promotion-news', lang('core menu promotion news'))?></li>
                    </ul>
                </li>
                <?php
                $opportunities_menu = "";
                if (uri_string() == 'p/bussiness-opportunities' || uri_string() == 'p/opportunities-plan' || uri_string() == 'p/opportunities-reward'
                || uri_string() == 'p/opportunities-level' || uri_string() == 'p/opportunities-start') {
                    $opportunities_menu = "active";
                }
                ?>
                <li class="dropdown <?=$opportunities_menu?>">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo lang('core menu opportunities'); ?>
                  <!-- <span class="caret"></span> -->
                  </a>
                  <ul class="dropdown-menu">
                    <li><?=anchor('p/opportunities-plan', lang('core menu opportunities plan'))?></li>
                    <li><?=anchor('p/opportunities-reward', lang('core menu opportunities reward'))?></li>
                    <li><?=anchor('p/opportunities-level', lang('core menu opportunities level'))?></li>
                    <li><?=anchor('p/opportunities-start', lang('core menu opportunities start'))?></li>
                  </ul>
                </li>
                <?php
                $about_menu = "";
                if (uri_string() == 'p/about-why' || uri_string() == 'p/about-vision'
                    || uri_string() == 'p/about-team' || uri_string() == 'p/about-business') {
                    $about_menu = "active";
                }
                ?>
                <li class="<?=$about_menu?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo lang('core menu about'); ?>
                        <!-- <span class="caret"></span> -->
                    </a>
                    <ul class="dropdown-menu">
                        <li><?=anchor($this->lang->lang().'/p/about-why', lang('core menu about why'))?></li>
                        <li><?=anchor($this->lang->lang().'/p/about-vision', lang('core menu about vision'))?></li>
                        <li><?=anchor($this->lang->lang().'/p/about-team', lang('core menu about team'))?></li>
                        <li><?=anchor($this->lang->lang().'/p/about-business', lang('core menu about business'))?></li>
                    </ul>
                </li>
                <?php
                $contact_menu = "";
                if (uri_string() == 'contact' || uri_string() == 'p/contact-location') {
                    $contact_menu = "active";
                }
                ?>
                <li class="<?=$contact_menu?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo lang('core menu contact'); ?>
                        <!-- <span class="caret"></span> -->
                    </a>
                    <ul class="dropdown-menu">
                        <li><?=anchor($this->lang->lang().'/contact', lang('core menu contact contact'))?></li>
                        <li><?=anchor($this->lang->lang().'/p/contact-location', lang('core menu contact location'))?></li>
                    </ul>
                </li>
            </ul>

            <?php // Nav bar right ?>
        </div>
    </div>
</nav>
<div class="navbar-sub-mini">
    <div class="container">
        <div class="member-box pull-right">
            <span><?=lang('core menu member system')?></span>
            <ul class="member-link">
                <?php if ($this->session->userdata('logged_in')) : ?>
                    <li class="<?php echo (uri_string() == 'profile') ? 'active' : ''; ?>">
                        <?=anchor('profile', lang('core button profile'))?>
                    </li>
                <?php endif; ?>
                <?php if ($this->session->userdata('logged_in')) : ?>
                    <?php if ($this->user['is_admin']) : ?>
                        <li>
                            <?=anchor('admin', lang('core button admin'))?>
                        </li>
                    <?php endif; ?>
                    <li>
                        <?=anchor('logout', lang('core button logout'))?>
                    </li>
                <?php else : ?>
                    <li class="<?php echo (uri_string() == 'user/register') ? 'active' : ''; ?>">
                        <?=anchor('user/register', lang('core button register'))?>
                    </li>
                    <li class="<?php echo (uri_string() == 'login') ? 'active' : ''; ?>">
                        <?=anchor('login', lang('core button login'))?>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <img src="<?=base_url('themes/default/img/icon_register.jpg')?>" alt="member section" width="45px" class="member-box-icon pull-right" />
    </div>
</div>