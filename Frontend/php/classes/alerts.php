<?php
    class Alerts {
        var $alerts = [];

        function LoadAlerts($db, $email, $amount, $order)
        {
            $result = $this->ReadDB($db, $email, $amount, $order);
            
            // Load rows from DB
            $rows;
            foreach($result as $row)
            {
                $this->AddAlert($row);
            }
        }

        function ReadDB($db, $email, $amount, $order) {
/*            
            $stmt = $db->stmt_init();
            $stmt = $db->prepare("call GetAlerts(?, ?, ?, ?)");
            $stmt->bind_param("sss", $email, $amount, $order);
            $stmt->execute();
            $result = $stmt->get_result();
*/
            $result = [ ["text" => "New Enquiry", "time" => "4 minutes ago"],
                ["text" => "3 New Shares on your Ad", "time" => "12 minutes ago"],
                ["text" => "Vehicle Returned", "time" => "4 minutes ago"]
            ];


            return $result;
        }

        function AddAlert($row)
        {
            $alert = new Alert;
            $alert->text = $row['text'];
            $alert->time = $row['time'];
            array_push($this->alerts, $alert);
        }

        function ToJSArray($name)
        {
            $object = "var ". $name . " = [";
            $first = true;
            foreach($this->alerts as $alert){
                if(!$first) {
                    $object .= ",";
                } else {
                    $first = false;
                }
                $object .= $alert->AsJSDict();
            }
            $object .= "];";
            return $object;
        }

        function ToJSON()
        {
            $data = [];
            foreach($this->alerts as $alert) {
                array_push($data, $alert->AsArray());
            }
            return json_encode($data);
        }

    }
?>