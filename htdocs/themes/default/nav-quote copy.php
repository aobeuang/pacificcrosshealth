<div class="navbar navbar-inverse navbar-fixed-top navbar-quoteHeader" role="navigation">
        <div class="container navbarContainer pad0">

            <div id="consumerSubMenuMini" class="navbar navbar-uhoneBroker">
                <div class="container uhoneBrokerCon">
                    
                </div>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav"></ul>
            </div>
            <div class="subheaderImgBig floatLeft" id="Main.CompanyLogo"><a href="http://www.thaivisaprotect.com"><img src="<?php echo base_url() ?>/assets/images/thaivisaprotect_logo.jpg" alt="" width="130"></div></a>
            <div class="navbar-container">
                <div class="subheader" role="navigation">
                    <div id="stepTabs" class="navbar-collapse">
                        <div class="tabTopStep2 <?php echo ( empty($this->uri->uri_string()) ) ? 'tabTopStep-SelectedStep' : '' ?>">      
                            <div class="<?php echo ( empty($this->uri->uri_string()) ) ? 'tabTopStepSelected' : 'tabTopStep' ?> ">1</div>
                            <div class="<?php echo ( empty($this->uri->uri_string()) ) ? 'tabTopStepTextSelected' : 'tabTopStepText' ?>">Your Details</div>
                        </div>
                        <div class="tabTopStep1 <?php echo ($this->uri->uri_string() === 'step2') ? 'tabTopStep-SelectedStep' : '' ?>">
                             <div class="<?php echo ($this->uri->uri_string() === 'step2') ? 'tabTopStepSelected' : 'tabTopStep' ?>">2</div>
                            <div class="<?php echo ($this->uri->uri_string() === 'step2') ? 'tabTopStepTextSelected' : 'tabTopStepText' ?>">Your Details</div>
                        </div>
                        <div class="tabTopStep1 <?php echo ($this->uri->uri_string() === 'step3') ? 'tabTopStep-SelectedStep' : '' ?>">
                            <div class="<?php echo ($this->uri->uri_string() === 'step3') ? 'tabTopStepSelected' : 'tabTopStep' ?>">3</div>
                            <div class="<?php echo ($this->uri->uri_string() === 'step3') ? 'tabTopStepTextSelected' : 'tabTopStepText' ?>">Your Details</div>
                        </div>
                    </div>
                </div>
                <div class="navbar-header" style="">
                    <a class="navbar-brand" href="tel:02-401-9189">
                        <!--span class="glyphicon glyphicon-phone glyphiconNav"></span-->
                        <span class="navbar-content"><span class="navbar-talk hidden-xs">Contact Us:</span>
                        <span class="navbar-tap visible-xs-inline-block"><i class="fa fa-phone"></i> Click Here</span><br><span class="navbar-number hidden-xs">02-401-9171</span></span>
                    </a>
                </div>
            </div>
        </div>
    </div>