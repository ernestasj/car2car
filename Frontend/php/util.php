<?php

    function EmptyIfUnset($obj, $key)
    {
        $var = "";
        if(property_exists($obj, $key))
        {
            if(isset($obj->$key))
            {
                $newvar = $obj->$key;
                if($newvar != "%3F")
                {
                    $var = $newvar;
                }
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
?>