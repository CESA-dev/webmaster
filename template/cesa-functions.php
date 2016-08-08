<?php
require_once("cesa-theme-methods.php");

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


 ?>
