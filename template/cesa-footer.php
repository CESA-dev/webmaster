<hr>
<h2 align="center" style="font-size: 44px;">Follow Us On Wechat</h2>
<img id="cesaqr" src="/img/qrcode_for_gh_f3a5ec0968b5_430.jpg">
<h2 align="center" style="font-size: 44px;">Special Thanks To Our Sponsors</h2>
<div class="container">

<?php 
$dir = new DirectoryIterator($_SERVER["DOCUMENT_ROOT"]."/img/sponsors/");
foreach ($dir as $fileinfo) {
    if (!$fileinfo->isDot()) {
        //var_dump($fileinfo->getFilename());
        echo '<div class="col-sm-3 col-xs-6 col-lg-2">';
        echo '<div class="image">';
     echo '<img src="/img/sponsors/'. $fileinfo->getFilename().'" 
         class="img img-responsive full-width">';
        echo '</div>';
    echo '</div>';
    }
}
?>
</div>
<style> #cesaqr {
                    display: block;
                    width : 40%;
                    margin-top: 0.5em;
                    margin-bottom: 0.5em;
                    margin-left: auto;
                    margin-right:auto;
                }
.image{
    position:relative;
    overflow:hidden;
    padding-bottom:100%;
}
.image img{
      position: absolute;
      max-width: 100%;
      max-height: 100%;
      top: 50%;
      left: 50%;
      transform: translateX(-50%) translateY(-50%);
}
</style>



</body>
</html>
