<?php
    /**
     *
     */
    class CesaThemeMethods
    {

        /**
         * [navbarItem description]
         * @param  array    $itemArray  itemArray is an array of coulples in form of [href,text]
         * @param  string   $class      class for list items
         * @return string               html formated string for list items
         */
        function navbarItem($itemArray, $class){
            $nav = "";
            foreach ($itemArray as $item) {
                # code...
                $nav .= '<li><a class="'.$class.'" href="'.$item["href"].'">'.$item["text"].'</a></li>';
            }
            return $nav;
        }

    }

    $ctm = new CesaThemeMethods;

?>
