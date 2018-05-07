<?php
    class Booking {

        var $rego = "rego";
        var $email = "email";
        var $renter = "email";
        var $days = "";
        function __construct() {
            $argv = func_get_args();
            switch( func_num_args() ) {
                case 0:self::__construct0();
                    break;
                case 4:
                    self::__construct4( $argv[0], $argv[1], $argv[2], $argv[3]);
                    break;
                case 3:
                    self::__construct3( $argv[0], $argv[1], $argv[2] );
                    break;
            }
        }
         
        function WriteDB($db) {
            $stmt = $db->prepare("call AddBooking(?, ?, ?, ?)");
            $stmt->bind_param("ssss", $this->rego, $this->email, $this->renter, $this->days);
            $stmt->execute();
            $stmt->close();
        }

        function __construct4($rego, $email, $renter, $days)
        {
            
            $this->rego = $rego;
            $this->email = $email;
            $this->renter = $renter;
            $this->days = $days;
        }

        function __construct0()
        {
            $this->rego = "rego";
            $this->email = "email";
            $this->renter = "email";
            $this->days = "";
        }

        function ReadDB($db, $email, $rego, $renter, $days) {
            $stmt = $db->stmt_init();
            $stmt = $db->prepare("call GetBooking(?, ?)");
            $stmt->bind_param("ss", $email, $rego);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = mysqli_fetch_assoc($result);
            $this->UpdateFromRow($row);
            $stmt->close();
        }

        function UpdateFromRow($row) {
            $this->rego = $row["rego"];
            $this->manufacturer = $row["manufacturer"];
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

    }
?>