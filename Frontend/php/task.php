<?php
    class Task {
        var $name = "";
        var $rego = "";
        var $percentage = "0";

        function AsJSDict(){
            $object = "{";
            $object .= "name: '". $this->name . "',";
            $object .= "rego: '". $this->rego . "',";
            $object .= "percentage: '". $this->percentage . "'";
            $object .= "}";
            return $object;    
        }

    }
?>

