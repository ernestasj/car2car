<?php
    class Messages {
        var $messages = [];

        function LoadMessages($db, $email, $amount, $order)
        {
            $result = $this->ReadDB($db, $email, $amount, $order);
            
            // Load rows from DB
            $rows;
            foreach($result as $row)
            {
                $this->AddMessage($row);
            }
        }

        function ReadDB($db, $email, $amount, $order) {
/*            
            $stmt = $db->stmt_init();
            $stmt = $db->prepare("call GetMessages(?, ?, ?, ?)");
            $stmt->bind_param("sss", $email, $amount, $order);
            $stmt->execute();
            $result = $stmt->get_result();
*/
            $result = [
                ['name' => "Pablo Escobar", 'time' => "Yesterday", 'message' => "Yeah Mate, full tank of 98 for yah when I drop it off beautiful ride"],
                ['name' => "Jake Paul", 'time' => "Yesterday", 'message' => "Yeah I am in Sydney for a week for recording and need a ride for that time."],
                ['name' => "Ernestas", 'time' => "Yesterday", 'message' => "There is an issue with your car mate, got caught in a bingle."]
            ];

            return $result;
        }

        function AddMessage($row)
        {
            $message = new Message;
            $message->from = $row['name'];
            $message->text = $row['message'];
            $message->time = $row['time'];
            array_push($this->messages, $message);
        }

        function ToJSArray($name)
        {
            $object = "var ". $name . " = [";
            $first = true;
            foreach($this->messages as $message){
                if(!$first) {
                    $object .= ",";
                } else {
                    $first = false;
                }
                $object .= $message->AsJSDict();
            }
            $object .= "];";
            return $object;
        }
    }
?>