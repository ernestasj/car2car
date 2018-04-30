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

        function AsArray(){
            $data = ["text" => $this->text, "time" => $this->time];
            return $data;
        }

    }
?>