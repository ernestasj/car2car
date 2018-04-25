<?php
    class Alert {
        var $text = "";
        var $time = "";

        function AsJSDict(){
            $object = "{";
            $object .= "text: '". $this->text . "',";
            $object .= "time: '". $this->time . "'";
            $object .= "}";
            return $object;    
        }

    }
?>