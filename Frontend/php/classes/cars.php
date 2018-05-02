<?php
    class Cars {
        var $cars = [];
        var $db;

        function LoadCars($db, $keywords)
        {
            $this->db = $db;

            $result = $this->ReadDB($this->db, $keywords);
            
            // Load rows from DB
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_array($result))
                {
                    $this->AddCar($db, $row);
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

        function ReadDB($db, $keywords) {
            $count = 10;
            $offset = 0;
            $stmt = $db->stmt_init();
            $stmt = $db->prepare("call Search(?, ?, ?)");
            $stmt->bind_param("sii", $keywords, $count, $offset);
            $stmt->execute();
            $result = $stmt->get_result();
            /*
            $result = [
                ['rego' => "HGD-ERT", 'make' => "Holden", 'model' => 'Commodore'],
                ['rego' => "ASS-WTF", 'make' => "Ford", 'model' => 'Falcon'],
                ['rego' => "ASD-FGH", 'make' => "Toyota", 'model' => '86']
            ];
            */
            return $result;
        }

        function AddCar($db, $row)
        {
            $car = new Car;
            $car->rego = $row['rego'];
            $car->make = $row['make'];
            $car->model = $row['model'];
            $car->AddRating($db);
            array_push($this->cars, $car);
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
            foreach($this->cars as $car) {
                $car_array = $car->AsArray();
                $car_array['id'] = $count;
                array_push($data, $car_array);
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

    }
?>