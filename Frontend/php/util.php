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
        $stmt->bind_param("");
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
        return RandomEntry($db, "RandomDoors");
    }
    function RandomTransmission($db) {
        return RandomEntry($db, "RandomTransmission");
    }

    function RandomEnginecc($db) {
        return RandomEntry($db, "RandomEnginecc");
    }
    function RandomBody($db) {
        return RandomEntry($db, "RandomBody");
    }

    function RandomKMS($db) {
        return RandomEntry($db, "RandomKMS");
    }
    
    function RandomPetrol($db) {
        return RandomEntry($db, "RandomPetrol");
    }

?>