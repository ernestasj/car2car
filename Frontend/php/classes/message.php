<?php

    class Message{
        var $from = "";
        var $text = "";
        var $time = "";

        function AsJSDict(){
            $object = "{";
            $object .= "name: '". $this->from . "',";
            $object .= "message: '". $this->text . "',";
            $object .= "time: '". $this->time . "'";
            $object .= "}";
            return $object;    
        }

        function AsArray(){
            $data = ["name" => $this->from, "message" => $this->text, "time" => $this->time];
            return $data;
        }
    }


?>