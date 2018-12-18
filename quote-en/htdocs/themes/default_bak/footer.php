<div class="section">
    <div class="title"><?=lang('core title more_question')?></div>
    <div class="container clearfix">
        <div class="row">
            <div class="col-md-6 col-md-offset-1">
                <div class="info-box">
                    <p><?php echo $global['more_info_message']; ?></p>
                </div>    
            </div>
            <div class="col-md-4 info-box-right">
                <div class="hello-box">
                    <p><?=$this->settings->hello_message[get_lang()]?></p>
                </div>
                <div class="call-box">
                    <p><?=lang('core title call_us_today')?><br/>
                    <?=$this->settings->phone?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="all-link" class="section clearfix">
    <div class="container">
        <ol class="breadcrumb">
          <li><?=anchor('/', lang('core menu home'))?></li>
          <!-- <li><a href="#">Library</a></li> -->
          <!-- <li class="active">Data</li> -->
        </ol>

        <div class="row">
        <div class="container">
            <div class="col-lg-offset-1 col-lg-2 col-md-3 col-sm-4 col-xs-6">
                <h5><?=lang('core menu company')?></h5>
                <ul>
                    <li><?=anchor('search/company?sort=category&dir=asc', lang('core menu company type'))?></li>
                    <li><?=anchor('search/company?sort=place&dir=asc', lang('core menu company location'))?></li>
                    <li><?=anchor('search/company?sort=service&dir=asc', lang('core menu company service'))?></li>
                    <li><?=anchor('search/company?sort=price&dir=asc', lang('core menu company price'))?></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                <h5><?=lang('core menu promotion')?></h5>
                <ul>
                    <li><?=anchor($this->lang->lang().'/p/promotion-latest', lang('core menu promotion latest'))?></li>
                    <li><?=anchor($this->lang->lang().'/p/promotion-news', lang('core menu promotion news'))?></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                <h5><?=lang('core menu opportunities')?></h5>
                <ul>
                    <li><?=anchor($this->lang->lang().'/p/opportunities-plan', lang('core menu opportunities plan'))?></li>
                    <li><?=anchor($this->lang->lang().'/p/opportunities-reward', lang('core menu opportunities reward'))?></li>
                    <li><?=anchor($this->lang->lang().'/p/opportunities-level', lang('core menu opportunities level'))?></li>
                    <li><?=anchor($this->lang->lang().'/p/opportunities-start', lang('core menu opportunities start'))?></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                <h5><?=lang('core menu about')?></h5>
                <ul>
                    <li><?=anchor($this->lang->lang().'/p/about-why', lang('core menu about why'))?></li>
                    <li><?=anchor($this->lang->lang().'/p/about-vision', lang('core menu about vision'))?></li>
                    <li><?=anchor($this->lang->lang().'/p/about-team', lang('core menu about team'))?></li>
                    <li><?=anchor($this->lang->lang().'/p/about-business', lang('core menu about business'))?></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                <h5><?=lang('core menu contact')?></h5>
                <ul>
                    <li><?=anchor($this->lang->lang().'/contact', lang('core menu contact contact'))?></li>
                    <li><?=anchor($this->lang->lang().'/p/contact-location', lang('core menu contact location'))?></li>
                </ul>
            </div>
        </div>
        </div>
    </div>
</div>

<?php // Footer ?>
<footer>
    <div class="container clearfix">
        <p class="col-md-8 copyright"><?=lang('core text copy_right')?></p>
        <p class="col-md-4 text-right" style="padding-right: 90px;">
            <a class="btn btn-social" href="<?=$this->settings->facebook_link?>"><i class="icon-social icon-facebook" title="facebook"></i></a>
            <a class="btn btn-social" href="<?=$this->settings->twitter_link?>"><i class="icon-social icon-twitter" title="twitter"></i></a>
            <a class="btn btn-social" href="<?=$this->settings->youtube_link?>"><i class="icon-social icon-youtube" title="youtube"></i></a>
            <a class="btn btn-social" href="<?=$this->settings->gplus_link?>"><i class="icon-social icon-gplus" title="google plus"></i></a>
        </p>
        <?php if (ENVIRONMENT): ?>
<!--        <p class="text-muted">-->
<!--            --><?php //echo lang('core text page_rendered'); ?>
<!--            | CodeIgniter v--><?php //echo CI_VERSION; ?>
<!--            | --><?php //echo $this->settings->site_name; ?><!-- v--><?php //echo $this->settings->site_version; ?>
<!--            | <a href="https://bitbucket.org/soilfish_devs/focuseasy" target="_blank">Bitbucket.com</a>-->
<!--        </p>-->
        <?php endif; ?>
    </div>
</footer>