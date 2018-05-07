<?php
    class Messages {
        var $messages = [];

        function LoadMessages($db, $email, $bookingid)
        {
            $result = $this->ReadDB($db, $email, $bookingid);
            
            // Load rows from DB
            $rows;
            foreach($result as $row)
            {
                $this->AddMessage($row);
            }
        }

        function ReadDB($db, $email, $bookingid) {

            $stmt = $db->stmt_init();
            $stmt = $db->prepare("call GetMessages(?)");
            $stmt->bind_param("i", $bookingid);
            $stmt->execute();
            $result = $stmt->get_result();
/*
            $result = [
                ['name' => "Pablo Escobar", 'time' => "Yesterday", 'message' => "Yeah Mate, full tank of 98 for yah when I drop it off beautiful ride"],
                ['name' => "Jake Paul", 'time' => "Yesterday", 'message' => "Yeah I am in Sydney for a week for recording and need a ride for that time."],
                ['name' => "Ernestas", 'time' => "Yesterday", 'message' => "There is an issue with your car mate, got caught in a bingle."]
            ];
*/
            return $result;
        }

        function AddMessage($row)
        {
            
            $from = $row['sender'];
            $text = $row['message'];
            $bookingid = $row['bookingid'];
            $message = new Message($from, $text, $bookingid);
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
        function ToJSON()
        {
            $data = [];
            foreach($this->messages as $message) {
                array_push($data, $message->AsArray());
            }
            return json_encode($data);
        }

    }
?>