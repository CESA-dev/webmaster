<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/template/functions/methods/cesa-theme-methods.php");

function doNavbarItem(){
    global $ctm;
    $class = 'page_nav';
    $itemArray = array(
        array('text' => 'Introduction', 'href' => '/introduction'),
        array('text' => 'Activities', 'href' => '/activities'),
        array('text' => 'Resources', 'href' => '/resources'),
        array('text' => 'Executive Board', 'href' => '/members')
    );
    return $ctm->navbarItem($itemArray, $class);
}

function addCSS($itemArray){
    global $ctm;
    if(isset($itemArray)){
        echo($ctm->css($itemArray));
    }
}

function addScriptSource($itemArray){
    global $ctm;
    if(isset($itemArray)){
        echo($ctm->scriptSource($itemArray));
    }
}

function addGoogleAnalyticsScript($trackingCode){

    echo <<<EOD

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', '$trackingCode', 'auto');
    ga('send', 'pageview');

var trackOutboundLink = function(url) {
   ga('send', 'event', 'outbound', 'click', url, {
     'transport': 'beacon',
     'hitCallback': function(){document.location = url;}
   });
}

  </script>

EOD;


}


 ?>
