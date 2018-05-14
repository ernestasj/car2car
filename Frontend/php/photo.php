<?php

    function UploadPhoto($fieldname)
    {
        $filename = $_FILES[$fieldname]['name'];
        $file_info = pathinfo($filename);
        $extension = $file_info["extension"];
        $random_name = rand();
        $new_file_name = $random_name . "." . $extension;
        $directory = "../img/";
        $target = $directory . $new_file_name;
        
        //$allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
        //$detectedType = exif_imagetype($_FILES[$fieldname]['tmp_name']);
        /*
        if(!in_array($detectedType, $allowedTypes))
        {
            return false;
        }
        */
        if(move_uploaded_file($_FILES[$fieldname]['tmp_name'], $target)) 
        {
            return $new_file_name;
        } 
        else
        {
            null;
        }
    }
?>