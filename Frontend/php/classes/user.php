<?php

    class User {

        var $email = "";
        var $password = "";
        var $first_name = "";
        var $last_name = "";
        var $licence = "";
        var $cardtype = "";
        var $ccnumber = "";
        var $expiry = "";
        var $cvc = "";
        var $cardname = "";
        var $photo = "";
        var $messages = [];
        var $tasks = [];
        var $alerts = [];

        function __construct() {
            $argv = func_get_args();
            switch( func_num_args() ) {
                case 0:self::__construct0();
                    break;
                case 11:
                    self::__construct11( $argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6], $argv[7], $argv[8], $argv[9], $argv[10] );
                    break;
                case 2:
                    self::__construct2( $argv[0], $argv[1] );
                    break;
            }
        }
         
        function WriteDB($db) {
            $stmt = $db->prepare("call CreateAccount(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssssss", $this->email, $this->password, $this->first_name, $this->last_name, $this->licence, $this->cardtype, $this->ccnumber, $this->expiry, $this->cvc, $this->cardname, $this->photo);
            $stmt->execute();
            $stmt->close();    
        }

        function __construct11($email, $password, $first_name, $last_name, $licence, $cardtype, $ccnumber, $expiry, $cvc, $cardname, $photo)
        {
            
            $this->email = $email;
            $this->password = $password;
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->licence = $licence;
            $this->cardtype = $cardtype;
            $this->ccnumber = $ccnumber;
            $this->expiry = $expiry;
            $this->cvc = $cvc;
            $this->cardname = $cardname;
            $this->photo = $photo;

        }

        function __construct0()
        {
        }

        function ReadDB($db, $email) {
            $stmt = $db->stmt_init();
            $stmt = $db->prepare("call GetUser(?)");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = mysqli_fetch_assoc($result);
            $this->UpdateFromRow($row);
        }

        function UpdateFromRow($row) {
            $this->email = $row["email"];
            $this->password = $row["password"];
            $this->first_name = $row["first_name"];
            $this->last_name = $row["last_name"];
            $this->licence = $row["licence"];
            $this->cardtype = $row["cardtype"];
            $this->ccnumber = $row["ccnumber"];
            $this->expiry = $row["expiry"];
            $this->cvc = $row["cvc"];
            $this->cardname = $row["cardname"];
            $this->photo = $row["photo"];
        }

        function __construct2($db, $email) {
            $this->ReadDB($db, $email);
        }

        function JSObject($name){
            $object = "var ". $name ."= {";
            $object .= "email: '". $this->email . "',";
            $object .= "first_name: '". $this->first_name . "',";
            $object .= "last_name: '". $this->last_name . "',";
            $object .= "licence: '". $this->licence . "',";
/*            $object .= "cardtype: '". $this->cardtype . "',";
            $object .= "ccnumber: '". $this->ccnumber . "',";
            $object .= "expiry: '". $this->expiry . "',";
            $object .= "cvc: '". $this->cvc . "',";
            $object .= "cardname: '". $this->cardname . "',";
*/
            $object .= "photo: '". $this->photo . "'";
            $object .= "};";
            return $object;    
        }

        function InsertAsJSObject($name)
        {
            echo $this->JSObject($name);
        }

    }
?>