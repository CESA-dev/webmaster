<?php
$title = "Executive Board";
$cssArray = array("./css/members_style.css");
 ?>
 <?php require($_SERVER["DOCUMENT_ROOT"] . "/template/cesa-header.php"); ?>
 <?php 
    function doMembers($fileName){
        echo '<div class="container">';
        if(($handle = fopen($fileName, 'r')) !== FALSE){
            $num = 0;
            while(($csvArray = fgetcsv($handle)) !== FALSE){
                doSingleMember($csvArray, $num);
                $num++;
            }
        }
        
        echo '</div>';

    }

    function doSingleMember($csvArray, $num){
        $grey = $num % 2;
        echo <<<EOD

    <div class="row member$grey">
            <div class="col-md-4">
                <a href="#">
                    <img class="img-circle" src="./img/board_thumbnail/$num.jpg.thumbnail.cropped" alt="">
                </a>
            </div>
            <div class="col-md-8">
                <h3 class="membername">$csvArray[0] $csvArray[1]</h3>
                <h4 class="memberattribute">$csvArray[2] $csvArray[3]</h4>
                <p class="memberintro">$csvArray[4]</p>
            </div>
    </div>



EOD;

    }



 ?>
 <div id="Member Title" class="main-title">

        <h1 class="display-3">Executive Board</h1>

    </div>
 <?php doMembers("members.csv"); ?>

 <?php require($_SERVER["DOCUMENT_ROOT"] . "/template/cesa-footer.php"); ?>