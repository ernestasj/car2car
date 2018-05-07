<?php
    class Cars {
        var $cars = [];

        function LoadCars($db, $keywords)
        {
            $result = $this->ReadDB($db, $keywords);
            
            // Load rows from DB
            $rows;
            foreach($result as $row)
            {
                $this->AddCar($row);
            }
        }

        function ReadDB($db, $keywords) {
/*            
            $stmt = $db->stmt_init();
            $stmt = $db->prepare("call GetMessages(?, ?, ?, ?)");
            $stmt->bind_param("sss", $email, $amount, $order);
            $stmt->execute();
            $result = $stmt->get_result();
*/
            $result = [
                ['rego' => "HGD-ERT", 'make' => "Holden", 'model' => 'Commodore'],
                ['rego' => "ASS-WTF", 'make' => "Ford", 'model' => 'Falcon'],
                ['rego' => "ASD-FGH", 'make' => "Toyota", 'model' => '86']
            ];

            return $result;
        }

        function AddCar($row)
        {
            $car = new Message;
            $car->rego = $row['rego'];
            $car->make = $row['make'];
            $car->model = $row['model'];
            array_push($this->car, $car);
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