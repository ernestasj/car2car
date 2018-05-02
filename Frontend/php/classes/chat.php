<?php
    class Chat {
        var $messages = [];

        function LoadMessages($db, $id)
        {
            $result = $this->ReadDB($db, $email, $id);
            
            // Load rows from DB
            $rows;
            foreach($result as $row)
            {
                $this->AddMessage($row);
            }
        }

        function ReadDB($db, $email, $id) {
            
            $stmt = $db->stmt_init();
            $stmt = $db->prepare("call GetChatHistory(?, ?)");
            $stmt->bind_param("sss", $email, $id);
            $stmt->execute();
            $result = $stmt->get_result();
/*
            $result = [
                ['sender' => "Pablo", 'time' => "Yesterday", 'message' => "Hi is the car still available?"],
                ['sender' => "Bob", 'time' => "Yesterday", 'message' => "Yeah."],
                ['sender' => "Pablo", 'time' => "Yesterday", 'message' => "Can I pick it up tomorrow?"]
            ];

*/          return $result;
        }

        function AddMessage($row)
        {
            $message = new Message;
            $message->from = $row['sender'];
            $message->text = $row['message'];
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