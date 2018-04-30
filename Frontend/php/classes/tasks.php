<?php
    class Tasks {
        var $tasks = [];

        function LoadTasks($db, $email, $amount, $order)
        {
            $result = $this->ReadDB($db, $email, $amount, $order);
            
            // Load rows from DB
            $rows;
            foreach($result as $row)
            {
                $this->AddTask($row);
            }
        }

        function ReadDB($db, $email, $amount, $order) {
/*            
            $stmt = $db->stmt_init();
            $stmt = $db->prepare("call GetTasks(?, ?, ?, ?)");
            $stmt->bind_param("sss", $email, $amount, $order);
            $stmt->execute();
            $result = $stmt->get_result();
*/
            $result = [
                ["name" => "Pablo", "rego" => "CH55HI", "percentage" => "40"],
                ["name" => "Ernestas", "rego" => "CK16YL", "percentage" => "20"]
            ];
    

            return $result;
        }

        function AddTask($row)
        {
            $task = new Task;
            $task->name = $row['name'];
            $task->rego = $row['rego'];
            $task->percentage = $row['percentage'];
            array_push($this->tasks, $task);
        }

        function ToJSArray($name)
        {
            $object = "var ". $name . " = [";
            $first = true;
            foreach($this->tasks as $task){
                if(!$first) {
                    $object .= ",";
                } else {
                    $first = false;
                }
                $object .= $task->AsJSDict();
            }
            $object .= "];";
            return $object;
        }

        function ToJSON()
        {
            $data = [];
            foreach($this->tasks as $task) {
                array_push($data, $task->AsArray());
            }
            return json_encode($data);
        }

    }
?>