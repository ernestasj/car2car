<?php
    class Bookings {
        var $bookings = [];
        var $db;

        function LoadBookings($db, $user)
        {
            $this->db = $db;

            $result = $this->ReadDB($this->db, $user);
            
            // Load rows from DB
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_array($result))
                {
                    $this->AddBooking($db, $row);
                }
            }
            
            /*
            $rows;
            foreach($result as $row)
            {
                $this->AddCar($row);  
            }
            */
        }

        function ReadDB($db, $user) {
            $stmt = $db->stmt_init();
            $stmt = $db->prepare("call GetBookings(?)");
            $stmt->bind_param("s", $user);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        }

        function AddBooking($db, $row)
        {
            $booking = new Booking;
            $booking->rego = $row['rego'];
            $booking->renter = $row['renter'];
            $booking->date = $row['date'];
            $booking->bookingid = $row['bookingid'];
            array_push($this->bookings, $booking);
        }

        function ToJSArray($name)
        {
            $object = "var ". $name . " = [";
            $first = true;
            foreach($this->cars as $car){
                if(!$first) {
                    $object .= ",";
                } else {
                    $first = false;
                }
                $object .= $car->AsJSDict();
            }
            $object .= "];";
            return $object;
        }
        function ToJSON()
        {
            $data = [];
            $count = 0;
            foreach($this->bookings as $booking) {
                $booking_array = $booking->AsArray();
                //$booking_array['id'] = $count;
                array_push($data, $booking_array);
                $count = $count + 1;
            }
            return json_encode($data);
        }

        function AddReview($db, $user, $carid, $rating, $comments)
        {
            if(array_key_exists($carid, $this->cars))
            {
                $this->cars[$carid]->AddReview($db, $user, $rating, $comments);
            }
                
        }

        function CarToJSON($carid)
        {
            if(array_key_exists($carid, $this->cars))
            {
                $car = $this->cars[$carid]->AsArray();
                return json_encode($car);
            }
        }

        function GetRego($carid)
        {
            if(array_key_exists($carid, $this->cars))
            {
                $car = $this->cars[$carid];
                return $car->rego;
            }
           
        }

    }
?>