<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pacific Cross Health</title>


    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>bower_components/gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- pickadate -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/pickadate/lib/compressed/themes/default.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/pickadate/lib/compressed/themes/default.date.css">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>htdocs/themes/default/css/uhone.min.css?ver=<?php echo time(); ?>" rel="stylesheet">
    <link href="<?php echo base_url(); ?>htdocs/themes/default/css/main.css" rel="stylesheet">
    <!-- <link href="<?php echo base_url(); ?>bower_components/gentelella/build/css/custom.min.css" rel="stylesheet"> -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-49773335-13', 'auto');
      ga('send', 'pageview');

    </script>


  </head>

  <body class="<?php echo $this->router->fetch_method(); ?>">
    
    <?php 
        if($this->router->fetch_class() === 'quote'){
            include('nav-quote.php');        
        }
 
    ?>
    
    <!-- page content -->
    <div id="QuoteCensusMainBody" role="main">
        
        <?php // System messages ?>
        <?php include('notice.php')?>
        <?php // main content ?>    
        <?php echo $content; ?>

    </div>
    <!-- /page content -->

    <?php include('footer.php'); ?>

    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- pickadate -->
    <script src="<?php echo base_url(); ?>bower_components/pickadate/lib/compressed/picker.js"></script>
    <script src="<?php echo base_url(); ?>bower_components/pickadate/lib/compressed/picker.date.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>htdocs/themes/default/js/quote.js?ver=<?php echo time(); ?>"></script>
    <script src="<?php echo base_url(); ?>htdocs/themes/default/js/main.js"></script>
    <!-- <script src="<?php echo base_url(); ?>bower_components/gentelella/build/js/custom.min.js"></script> -->

  </body>
</html>