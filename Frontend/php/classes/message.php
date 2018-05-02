<?php

    class Message{
        var $from = "";
        var $text = "";
        var $bookingid = -1;
        var $time = "";

        function AsJSDict(){
            $object = "{";
            $object .= "sender: '". $this->from . "',";
            $object .= "message: '". $this->text . "',";
            $object .= "time: '". $this->time . "'";
            $object .= "}";
            return $object;    
        }

        function AsArray(){
            $data = ["sender" => $this->from, "message" => $this->text, "bookingid" => $this->bookingid];
            return $data;
        }

        function __construct($from, $text, $bookingid)
        {
            $this->from = $from;
            $this->bookingid = (int)$bookingid;
            $this->text = $text;
        }

        function WriteDB($db)
        {
            $stmt = $db->prepare("call AddMessage(?, ?, ?)");
            $stmt->bind_param("ssi", $this->from, $this->text, $this->bookingid);
            //$text = "Hello there!";
            //$name = "bob";
            //$id = 2;
            //$stmt->bind_param("ssi", $name, $text, $id);
            $stmt->execute();
            $stmt->close();

            echo $this->from . $this->text . $this->bookingid;
        }
    }


?>