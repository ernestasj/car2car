<?php

    function EmptyIfUnset($obj, $key)
    {
        $var = "";
        if(property_exists($obj, $key))
        {
            if(isset($obj->$key))
            {
                $newvar = $obj->$key;
                //if($newvar != "%3F")
                //{
                    $var = $newvar;
                //}
            }
        }
        return $var;
    }

    function FindExtension ($filename) 
    { 
        $filename = strtolower($filename) ; 
        $exts = preg_split("[/\\.]", $filename) ; 
        $n = count($exts)-1;
        $exts = $exts[$n];
        return $exts;
    } 

    function RandomEntry($db, $functionName)
    {
        $stmt = $db->stmt_init();
        $stmt = $db->prepare("call ".$functionName."()");
        //$stmt->bind_param();
        $stmt->execute();
        $result = $stmt->get_result();
        $entry;
        if(mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);
            $entry = $row;
            
        }
        $stmt->close();
        return $entry;        
    }

    function RandomValue($db, $function)
    {
        $entry = RandomEntry($db, $function);
        return $entry["value"];
    }
    function RandomSuburb($db) {
        return RandomEntry($db, "RandomSuburb");
    }

    function RandomUser($db) {
        return RandomEntry($db, "RandomUser");
    }

    function RandomMakeModel($db) {
        return RandomEntry($db, "RandomMakeModel");
    }

    function RandomDoors($db) {
        return RandomValue($db, "RandomDoors");
    }
    function RandomTransmission($db) {
        return RandomValue($db, "RandomTransmission");
    }

    function RandomEnginecc($db) {
        return RandomValue($db, "RandomEnginecc");
    }
    function RandomBody($db) {
        return RandomValue($db, "RandomBody");
    }

    function RandomKMS($db) {
        return RandomValue($db, "RandomKMS");
    }

    function RandomPetrol($db) {
        return RandomValue($db, "RandomPetrol");
    }

    function RandomYesNo()
    {
        $yes_no = ["yes", "no"];
        return array_rand($yes_no);
    }

    function RandomDescription()
    {
        return "";
    }

    function InsertSingleString($db, $functionName, $var)
    {
        $stmt = $db->prepare("call ".$functionName."(?)");
        $stmt->bind_param("s", $var);
        $stmt->execute();
        $stmt->close();
    }

    function InsertNames($db, $filename)
    {
        $file = $filename;
        $content = file_get_contents($file);
        $arr = explode(PHP_EOL, $content);
        $count = 0;
        $entries = count($arr);
        while($count < $entries)
        {
            $names = explode(" ", $arr[$count]);
            $firstname = $names[0];
            $lastname = $names[1];
            InsertSingleString($db, "AddFirst", $firstname);
            InsertSingleString($db, "AddLast", $lastname);

            echo "first: ". $firstname. " | last: ".$lastname;
            $count = $count + 1;
        }    
    }

    function RandomName($db)
    {
        return RandomEntry($db, "RandomName");
    }

    function GetEntries($db, $functionName)
    {
        $stmt = $db->stmt_init();
        $stmt = $db->prepare("call ".$functionName."()");
        //$stmt->bind_param();
        $stmt->execute();
        $result = $stmt->get_result();
        $entries = [];
        if(mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);
            array_push($entries, $row);
            
        }
        $stmt->close();
        return $entries;        
    }

?>