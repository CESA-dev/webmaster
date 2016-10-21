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
        # class for grid size, change if needed
        $gridClass = "md";

        # start of tag for alternating color department block
        echo '<div class="row member'.$grey.'">';
        echo '<h3 class="departmentname">'.$departmentName.'</h3>';

        $len = count($csvArray);
        $index = 0;
        while($len >= 3){
            echo '<div class="row">';
                doMember($gridClass, 4, $csvArray[$index], $num);
                doMember($gridClass, 4, $csvArray[$index+1], $num);
                doMember($gridClass, 4, $csvArray[$index+2], $num);
            echo '</div>';
            $index += 3;
            $len -= 3;
        }
        if($len > 0){
            echo '<div class="row">';
            for ($i=0; $i < $len; $i++) {
                doMember($gridClass, 12/$len, $csvArray[$index + $i], $num);
            }
            echo '</div>';
        }

        # end of tag for department block
        echo "</div>";

    }

    function doMember($gridClass, $span, $csvArray, $num){
        $name = $csvArray[0];
        echo<<<EOD
            <div class="col-$gridClass-$span">
                <a href="#">
                    <img class="img-circle center-align img-responsive" src="./img/board_thumbnail/$name.jpg.thumbnail.cropped" alt="">
                </a>
                <h4 class="membername center-align">$csvArray[0] $csvArray[1]</h3>
                <h5 class="memberattribute center-align">$csvArray[2] $csvArray[3]</h4>
                <p class="memberintro center-align">$csvArray[4]</p>
            </div>
EOD;
    }



 ?>
 <div id="Member Title" class="main-title">

        <h1 class="display-3">Executive Board</h1>

    </div>
 <?php doMembers("members.csv"); ?>

 <?php require($_SERVER["DOCUMENT_ROOT"] . "/template/cesa-footer.php"); ?>
