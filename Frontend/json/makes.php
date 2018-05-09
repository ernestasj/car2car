<?php
    include("../php/includes.php");
// similar to body. needs to be a db call so admin can update.
/*    $makes = [["value" => "Ford", "name" => "Ford"]];
    array_push($makes, ["value" => "Holden", "name" => "Holden"]);
    array_push($makes, ["value" => "Nissan", "name" => "Nissan"]);
    array_push($makes, ["value" => "Toyota", "name" => "Toyota"]);
    array_push($makes, ["value" => "Mitsubishi", "name" => "Mitsubishi"]);
    array_push($makes, ["value" => "Subaru", "name" => "Subaru"]);
  */  
    
    //echo json_encode($makes);

    $stmt = $db->stmt_init();
    $stmt = $db->prepare("call GetMakes()");
    //$stmt->bind_param("");
    $stmt->execute();
    $result = $stmt->get_result();
    $makes = [];
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            array_push($makes, $row);
        }
    }

    echo json_encode($makes);

?>