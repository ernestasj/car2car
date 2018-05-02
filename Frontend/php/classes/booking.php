<?php
    class Booking {

        var $rego = "rego";
        var $renter = "email";
        var $date = "";
        function __construct() {
            $argv = func_get_args();
            switch( func_num_args() ) {
                case 0:self::__construct0();
                    break;
                case 4:
                    self::__construct3( $argv[0], $argv[1], $argv[2]);
                    break;
                case 3:
                    self::__construct3( $argv[0], $argv[1], $argv[2] );
                    break;
            }
        }
         
        function WriteDB($db) {
            $stmt = $db->prepare("call AddBooking(?, ?, ?)");
            $stmt->bind_param("sss", $this->rego, $this->renter, $this->date);
            $stmt->execute();
            $stmt->close();
        }

        function __construct3($rego, $renter, $date)
        {
            
            $this->rego = $rego;
            $this->renter = $renter;
            $this->date = $date;
        }

        function __construct0()
        {
            $this->rego = "rego";
            $this->renter = "email";
            $this->date = "";
        }

        function ReadDB($db, $email, $rego, $renter, $days) {
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
            $this->renter = $row["email"];
            $this->date = $row["date"];
        }

        function AsArray(){
            $data = ["rego" => $this->rego, "email" => $this->renter, "date" => $this->date];
            return $data;
        }


    }
?>