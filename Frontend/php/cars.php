<?php
    class Cars {
        var $cars = [];

        function LoadCars($db, $keywords)
        {
            $result = $this->ReadDB($db, $keywords);
            
            // Load rows from DB
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_array($result))
                {
                    $this->AddCar($row);
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

        function AddCar($row)
        {
            $car = new Car;
            $car->rego = $row['rego'];
            $car->make = $row['make'];
            $car->model = $row['model'];
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
            foreach($this->cars as $car) {
                array_push($data, $car->AsArray());
            }
            return json_encode($data);
        }

    }
?>