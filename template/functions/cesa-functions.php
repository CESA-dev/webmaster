<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/template/functions/methods/cesa-theme-methods.php");

function doNavbarItem(){
    global $ctm;
    $class = 'page_nav';
    $itemArray = array(
        array('text' => 'Introduction', 'href' => '/#introduction'),
        array('text' => 'Activities', 'href' => '/#activities'),
        array('text' => 'Resources', 'href' => '/#resources')
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

 ?>
