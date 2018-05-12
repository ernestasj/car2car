<?php
    class Car {
        var $desc = [];
        var $email = "";
        var $rego = "rego";
        var $make = "make";
        var $model = "model";
        var $year = "year";
        var $doors = "";
        var $petrol = "";
        var $transmission = "";
        var $enginecc = "enginecc";
        var $kms = "kms";
        var $body = "";
        var $photo = "";
        var $rating = 0;

        function __construct() {
            $argv = func_get_args();
            switch( func_num_args() ) {
                case 0:self::__construct0();
                    break;
                case 1:self::__construct1($argv[0]);
                    break;
                case 11:
                    self::__construct11( $argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6], $argv[7], $argv[8], $argv[9], $argv[10]);
                    break;
                case 3:
                    self::__construct3( $argv[0], $argv[1], $argv[2] );
                    break;
            }
        }
         
        function WriteDB($db, $email) {
            $stmt = $db->prepare("call ListCar(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )");
            $stmt->bind_param("sssssssssssssssssssssss", $email, $this->desc["rego"], $this->desc["make"], $this->desc["model"], $this->desc["year"], $this->desc["doors"], $this->desc["petrol"], $this->desc["transmission"], $this->desc["enginecc"], $this->desc["kms"], $this->desc["body"], $this->desc["monday"], $this->desc["tuesday"], $this->desc["wednesday"], $this->desc["thursday"], $this->desc["friday"], $this->desc["saturday"], $this->desc["sunday"], $this->desc["public_holidays"], $this->desc["postcode"], $this->desc["suburb"], $this->desc["state"], $this->desc["description"]);
            //$stmt->bind_param("ssssssssssss", $email, $this->rego, $this->make, $this->model, $this->year, $this->doors, $this->petrol, $this->transmission, $this->enginecc, $this->kms, $this->body, $this->photo);
            $stmt->execute();
            $stmt->close();
            //(rego, make, model, year, doors, petrol, transmission, enginecc, kms, body, monday, tuesday, wednesday, thursday, friday, saturday, sunday, public_holdays, postcode, suburb, state, description)
            
  
        }

        function __construct11($rego, $make, $model, $year, $doors, $petrol, $transmission, $enginecc, $kms, $body, $photo)
        {
            
            $this->rego = $rego;
            $this->make = $make;
            $this->model = $model;
            $this->year = $year;
            $this->doors = $doors;
            $this->petrol = $petrol;
            $this->transmission = $transmission;
            $this->enginecc = $enginecc;
            $this->kms = $kms;
            $this->body = $body;
            $this->photo = $photo;
        }

        function __construct1($post)
        {
            
            $this->desc["rego"] = $post["rego"];
            $this->desc["make"] = $post["make"];
            $this->desc["model"] = $post["model"];
            $this->desc["year"] = $post["year"];
            $this->desc["doors"] = $post["doors"];
            $this->desc["petrol"] = $post["petrol"];
            $this->desc["transmission"] = $post["transmission"];
            $this->desc["enginecc"] = $post["enginecc"];
            $this->desc["kms"] = $post["kms"];
            $this->desc["body"] = $post["body"];
            $this->desc["monday"] = $post["monday"] ?? "no";
            $this->desc["tuesday"] = $post["tuesday"] ?? "no";
            $this->desc["wednesday"] = $post["wednesday"] ?? "no";
            $this->desc["thursday"] = $post["thursday"] ?? "no";
            $this->desc["friday"] = $post["friday"] ?? "no";
            $this->desc["saturday"] = $post["saturday"] ?? "no";
            $this->desc["sunday"] = $post["sunday"] ?? "no";
            $this->desc["public_holidays"] = $post["public_holidays"] ?? "no";
            $this->desc["postcode"] = $post["postcode"];
            $this->desc["suburb"] = $post["suburb"];
            $this->desc["state"] = $post["state"];
            $this->desc["description"] = $post["description"];
            //$this->photo = "";
        }

        function __construct0()
        {
            $this->rego = "rego";
            $this->make = "make";
            $this->model = "model";
            $this->year = "year";
            $this->doors = "";
            $this->petrol = "";
            $this->transmission = "";
            $this->enginecc = "enginecc";
            $this->kms = "kms";
            $this->body = "";
            $this->photo = "";
        }

        function ReadDB($db, $email, $rego) {
            $stmt = $db->stmt_init();
            $stmt = $db->prepare("call GetCar(?, ?)");
            $stmt->bind_param("ss", $email, $rego);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = mysqli_fetch_assoc($result);
            $this->UpdateFromRow($row);
            $stmt->close();
        }

        function UpdateFromRow($row) {
            $this->email = $row["email"];
            $this->rego = $row["rego"];
            $this->make = $row["make"];
            $this->model = $row["model"];
            $this->year = $row["year"];
            $this->doors = $row["doors"];
            $this->petrol = $row["petrol"];
            $this->transmission = $row["transmission"];
            $this->enginecc = $row["enginecc"];
            $this->kms = $row["kms"];
            $this->body = $row["body"];
            $this->photo = $row["photo"];
        }

        function __construct3($db, $email, $rego) {
            $this->ReadDB($db, $email, $rego);
        }

        function JSObject($name){
            $object = "var ". $name ."= {";
            $object .= "rego: '". $this->rego . "',";
            $object .= "photo: '". $this->photo . "',";
            $object .= "email: '". $this->email . "'";
            $object .= "};";
            return $object;    
        }

        function InsertAsJSObject($name)
        {
            echo $this->JSObject($name);
        }

        function AsArray(){
            //$data = ["rego" => $this->rego, "make" => $this->make, "model" => $this->model, "rating" => $this->rating];
            return $this->desc;
        }

        function AddRating($db)
        {
            $stmt = $db->stmt_init();
            $stmt = $db->prepare("call GetRating(?)");
            $stmt->bind_param("s", $this->rego);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = mysqli_fetch_array($result);
            //$this->rating = $row['rating'];
            $this->desc["rating"] = $row['rating'];
        }

        function AddReview($db, $user, $rating, $comments)
        {
            $stmt = $db->prepare("call AddReview(?, ?, ?, ?)");
            $rating_score = (int)$rating;
            $stmt->bind_param("siss", $user, $rating_score, $comments, $this->rego);
            $stmt->execute();
        }

        function LoadCar($db, $rego, $email)
        {
            $result = $this->LoadCar($email, $rego);
            
            $row = mysqli_fetch_array($result);

            $desc = $row;
        }

        function AddPhoto($db, $filename)
        {
            $stmt = $db->prepare("call AddCarPhoto(?, ?)");
            $stmt->bind_param("ss", $this->desc["rego"], $filename);
            $stmt->execute();
            $stmt->close();
        }

        function GetPhoto($db)
        {
            $stmt = $db->stmt_init();
            $stmt = $db->prepare("call GetCarPhoto(?)");
            $stmt->bind_param("s", $this->desc["rego"]);
            $stmt->execute();
            $result = $stmt->get_result();
            if(mysqli_num_rows($result) > 0)
            {

                $row = mysqli_fetch_array($result);
                $this->desc["image"] = $row["filename"];
            }
            else
            {
                $this->desc["image"] = "default.jpg";
            }
            $stmt->close();
        }
    }
?>