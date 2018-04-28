<?php
    class Cars {
        var $cars = [];

        function AddCar($car)
        {
            array_push($cars, $car);
        }
        /*
        function LoadCars($db, $search_criteria)
        {               
            $stmt = $db->prepare("call GetCars(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("", $email, $this->rego, $this->manufacturer, $this->make, $this->model, $this->year, $this->doors, $this->petrol, $this->transmission, $this->enginecc, $this->kms, $this->body, $this->photo);
            $stmt->execute();
            $stmt->close();    

        }
        */
    }
?>