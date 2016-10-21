<?php
$title = "Executive Board";
$cssArray = array("./css/members_style.css");
 ?>
 <?php require($_SERVER["DOCUMENT_ROOT"] . "/template/cesa-header.php"); ?>
 <?php
    function doMembers($fileName){
        # Department type is index 5 #

        echo '<div class="container">';
        $mydict = [];
        if(($handle = fopen($fileName, 'r')) !== FALSE){
            $num = 0;
            while(($csvArray = fgetcsv($handle)) !== FALSE){
                $departmentKey = $csvArray[5];
                if(!array_key_exists($departmentKey, $mydict)){
                    $mydict[$departmentKey] = array();
                }
                $mydict[$departmentKey][] = $csvArray;
            }
            foreach ($mydict as $key => $array) {
                doDepartment($array, $num, $key);
                $num++;
            }
        }

        echo '</div>';

    }

    function doDepartment($csvArray, $num, $departmentName){
        $grey = $num % 2;
        # start of tag for alternating color department block
        echo '<div class="row member$grey">';

        # do stuff for each leader
        echo <<<EOD
            <div class="col-md-4">
                <a href="#">
                    <img class="img-circle" src="./img/board_thumbnail/$num.jpg.thumbnail.cropped" alt="">
                </a>
            </div>
            <div class="col-md-8">
                <h4 class="membername">$csvArray[0] $csvArray[1]</h3>
                <h5 class="memberattribute">$csvArray[2] $csvArray[3]</h4>
                <p class="memberintro">$csvArray[4]</p>
            </div>
EOD;


        # end of tag for department block
        echo "</div>";

    }



 ?>
 <div id="Member Title" class="main-title">

        <h1 class="display-3">Executive Board</h1>

    </div>
 <?php doMembers("members.csv"); ?>

 <?php require($_SERVER["DOCUMENT_ROOT"] . "/template/cesa-footer.php"); ?>
