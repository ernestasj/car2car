<?php

    class User {
        var $desc = [];
        var $email = "";
        var $password = "";
        var $first_name = "";
        var $last_name = "";
        var $licence = "";
        //var $cardtype = "";
        //var $ccnumber = "";
        //var $expiry = "";
        //var $cvc = "";
        //var $cardname = "";
        var $photo = "";
        var $messages = [];
        var $tasks = [];
        var $alerts = [];

        function __construct() {
            $argv = func_get_args();
            switch( func_num_args() ) {
                case 0:self::__construct0();
                    break;
                case 1:self::__construct1($argv[0]);
                    break;
                case 11:
                    self::__construct11( $argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6], $argv[7], $argv[8], $argv[9], $argv[10] );
                    break;
                case 2:
                    self::__construct2( $argv[0], $argv[1] );
                    break;
                case 6:
                    self::__construct6( $argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5]);
                    break;
            }
        }
         
        function WriteDB($db) {
            $stmt = $db->prepare("call CreateAccount(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssssssssssss", $this->desc['email'], $this->desc['password'], $this->desc['firstname'], $this->desc['lastname'], $this->desc['licence'], $this->desc['dob'], $this->desc['number'], $this->desc['street'], $this->desc['suburb'], $this->desc['state'], $this->desc['postcode'], $this->desc['mobnumber'], $this->desc['landline'], $this->desc['ccnumber'], $this->desc['cvc'], $this->desc['cardtype'], $this->desc['expiry']);
            $stmt->execute();
            $stmt->close(); 
            
            
            //$this->desc['email'], $this->desc['password'], $this->desc['firstname'], $this->desc['lastname'], $this->desc['licence'], $this->desc['dob'], $this->desc['number'], $this->desc['street'], $this->desc['suburb'], $this->desc['state'], $this->desc['postcode'], $this->desc['mobnumber'], $this->desc['landline'], $this->desc['ccnumber'], $this->desc['cvc'], $this->desc['cardtype'], $this->desc['expiry']

            //email, password, firstname, lastname, licence, dob, number, street, suburb, state, postcode, mobnumber, landline, ccnumber, cvc, cardtype, expiry
            //email VARCHAR(45), password VARCHAR(45), firstname VARCHAR(45), lastname VARCHAR(45), licence VARCHAR(45), dob VARCHAR(45), number VARCHAR(45), street VARCHAR(45), suburb VARCHAR(45), state VARCHAR(45), postcode VARCHAR(45), mobnumber VARCHAR(45), landline VARCHAR(45), ccnumber VARCHAR(45), cvc VARCHAR(45), cardtype VARCHAR(45), expiry  VARCHAR(45)
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

        function __construct1($post)
        {
            
            $this->desc['email'] = $post['email'];
            $this->desc['password'] = $post['password'];
            $this->desc['firstname'] = $post['firstname'];
            $this->desc['lastname'] = $post['lastname'];
            $this->desc['licence'] = $post['licence'];
            $this->desc['dob'] = $post['dob'];
            $this->desc['number'] = $post['number'];
            $this->desc['street'] = $post['street'];
            $this->desc['suburb'] = $post['suburb'];
            $this->desc['state'] = $post['state'];
            $this->desc['postcode'] = $post['postcode'];
            $this->desc['mobnumber'] = $post['mobnumber'];
            $this->desc['landline'] = $post['landline'];
            $this->desc['ccnumber'] = $post['ccnumber'];
            $this->desc['cvc'] = $post['cvc'];
            $this->desc['cardtype'] = $post['cardtype'];
            $this->desc['expiry'] = $post['expiry'];
        }

        function __construct6($email, $password, $first_name, $last_name, $licence, $photo)
        {
            
            $this->email = $email;
            $this->password = $password;
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->licence = $licence;
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
            if($result != false)
            {
                $row = mysqli_fetch_assoc($result);
                $this->UpdateFromRow($row);
            }
        }

        function UpdateFromRow($row) {
            //$this->email = $row["email"];
            //$this->password = $row["password"];
            //$this->first_name = $row["first_name"];
            //$this->last_name = $row["last_name"];
            //$this->licence = $row["licence"];
            //$this->cardtype = $row["cardtype"];
            //$this->ccnumber = $row["ccnumber"];
            //$this->expiry = $row["expiry"];
            //$this->cvc = $row["cvc"];
            //$this->cardname = $row["cardname"];
            //$this->photo = $row["photo"];
            $this->desc = $row;
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

        function ToJSON()
        {
            
            //$obj_ref = $this->desc;
            $object = $this->desc;
            if(isset($object['password']))
                unset($object['password']);
            if(isset($object['ccnumber']))
                unset($object['ccnumber']);
            if(isset($object['expiry']))
                unset($object['expiry']);
            if(isset($object['cvc']))
                unset($object['cvc']);
            if(isset($object['cardtype']))
                unset($object['cardtype']);
            return json_encode($object);
        }

        function InsertAsJSObject($name)
        {
            echo $this->JSObject($name);
        }

        function CheckPassword($password) 
        {
            if($this->desc["email"] == "")
            {
                return false;
            }
            else
            {
                return $password == $this->desc["password"];
            }   
            
        }
        function GetEmail()
        {
            return $this->desc["email"];
        }

        function UpdateUser($post)
        {
            foreach ($post as $key => $value)
            {
                if(isset($value) && $value != "")
                {
                    $desc[$key] = $value;
                }
            }
        }

        function WriteUpdateDB($db)
        {
            $stmt = $db->prepare("call UpdateAccount(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssssssssssss", $this->desc['email'], $this->desc['password'], $this->desc['firstname'], $this->desc['lastname'], $this->desc['licence'], $this->desc['dob'], $this->desc['number'], $this->desc['street'], $this->desc['suburb'], $this->desc['state'], $this->desc['postcode'], $this->desc['mobnumber'], $this->desc['landline'], $this->desc['ccnumber'], $this->desc['cvc'], $this->desc['cardtype'], $this->desc['expiry']);
            $stmt->execute();
            $stmt->close(); 
        }

    }
?>