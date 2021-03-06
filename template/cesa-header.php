<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/template/functions/cesa-functions.php");

/*
$title                  can be pre defined in php
                        title of the webpage

***********************************************************


$cssArray               Array of CSS hrefs to add. Optionally defined before including this file

***********************************************************


$scriptSourceArray      Array of couples with keys [src, integrity, crossorigin]
                        src must be defined, other fields are optional
                        template for scriptSourceArray input:

$scriptSourceArray = array(
    array('src' => 'xxx', 'integrity' => 'xxx', 'crossorigin' => 'xxx'),
    array('src' => 'xxx', 'integrity' => 'xxx', 'crossorigin' => 'xxx'),
    array('src' => 'xxx', 'integrity' => 'xxx', 'crossorigin' => 'xxx')
);
*/
?>

 <!DOCTYPE html>

 <html>
 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1"><!-- test compiled and minified CSS -->
     <link rel="stylesheet" href="/css/bootstrap.min.css"><!-- Optional theme -->
     <link rel="stylesheet" href="/css/bootstrap-theme.min.css"><!-- Latest compiled and minified JavaScript -->
     <link rel="stylesheet" href="/css/custom_class.css"><!-- CSS for custom classes -->
     <link rel="icon" href="/img/cesa_logo.gif">
    <?php if(isset($cssArray))addCSS($cssArray); ?>

     <!--<script   src="http://code.jquery.com/jquery-1.12.4.min.js"   integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="   crossorigin="anonymous"></script>-->
     <script type="text/javascript" src="/js/jquery.js"></script>
     <script src="/js/bootstrap.min.js"></script>
     <?php if(isset($scriptSourceArray))addScriptSource($scriptSourceArray); ?>
     <?php addGoogleAnalyticsScript("UA-82745997-1") ?>
     <title>
        <?php if (isset($title)){echo($title." | CESA");}else{echo 'CESA';}?>
     </title>
     <script src="/js/typed.js"></script>
     <script>
     $(function(){
         $(".typed_element").typed({
             strings: ["build.", "share.", "PARTY!"],
             typeSpeed: 0,
             loop: true,
             backDelay: 500
         });
     });

     $(".page_nav").click(function(){
         $(".collapse").collapse("hide");
     });

     </script>
 </head>

 <body>
     <nav class="navbar navbar-dark bg-primary navbar-fixed-top">
         <div id="main-nav" class="container-fluid">
             <!-- Brand and toggle get grouped for better mobile display -->


             <div class="navbar-header">
                 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">☰<span class="sr-only">Toggle navigation</span></button> <a class="navbar-brand" href="/">CESA</a>
             </div>
             <!-- Collect the nav links, forms, and other content for toggling -->


             <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php echo(doNavbarItem()); ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="main-header container-fluid">
        <h1>Chinese Engineering Student Association</h1>

        <h3 class="wrap_typed">
        We <span class="typed_element"></span>
        </h3>
        <h2><?php echo($title) ?></h2>
    </div>
