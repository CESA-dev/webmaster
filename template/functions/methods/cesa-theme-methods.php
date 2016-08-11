<?php
    /**
     *
     */
    class CesaThemeMethods
    {
        public $nonClosingTag = array('link', 'area', 'base', 'br', 'col', 'command', 'embed', 'hr', 'img', 'input', 'meta', 'param', 'source');

        /**
         * [basicTag description]
         * @param  string   $tagName            name of the tagName
         * @param  array    $attributeArray     attributes in array of couples with keys [name, value]
         * @param  string   $value              string of the value for the tag
         * @return string                       the resulting html for the tag
         */
        function basicTag($tagName, $attributeArray=null, $value=null){
            $tag = '<'.$tagName;
            if (isset($attributeArray)) {
                foreach ($attributeArray as $item) {
                    $tag .= ' '.$item['name'].'="'.$item['value'].'"';
                }
            }
            $tag .= '>';
            if (isset($value)) {
                $tag .= $value;
            }
            if(isset($this->nonClosingTag[$tagName]))
                return $tag;
            $tag .= '</'.$tagName.'>';
            return $tag;
        }


        /**
         * [navbarItem description]
         * @param  array    $itemArray  itemArray is an array of coulples with keys [href,text]
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

        /**
         * [css description]
         * @param  string array     $itemArray      an Array of hrefs of the css code to include
         * @return string                           html for the link tags
         */
        function css($itemArray){
            $tag = '';
            foreach ($itemArray as $item) {
                $tag .= $this->basicTag('link', array(array('name' => 'rel', 'value' => 'stylesheet'), array('name' => 'href', 'value' => $item)));
            }
            return $tag;
        }

        /**
         * [scriptSource description]
         * @param  array        $itemArray      array of couples of attribute values
         *                                      with keys [src, integrity, crossorigin].
         *                                      of which 'src' must be defined
         *
         * @return string                       html tag for script source
         */
        function scriptSource($itemArray){
            $tag = '';
            $tagName = 'script';
            foreach ($itemArray as $item) {
                $attributeArray = array();
                array_push($attributeArray, array('name' => 'src', 'value' => $item['src']));
                if (isset($item['integrity'])) {
                    array_push($attributeArray, array('name' => 'integrity', 'value' => $item['integrity']));
                }
                if (isset($item['crossorigin'])) {
                    array_push($attributeArray, array('name' => 'crossorigin', 'value' => $item['crossorigin']));
                }
                $tag .= $this->basicTag($tagName, $attributeArray);
            }
            return $tag;
        }



    }

    $ctm = new CesaThemeMethods;

?>
