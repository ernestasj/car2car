<?php   //Generate Car entries for the car database
    include("../php/includes.php");
    include("./randomcar.php");

    $numberOfEntries = 10000;
    $yearMin = 1995;
    $yearMax = 2018;

    $count = 0;
    $alphabet = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
    $regoNum1 = $regoNum2 = $regoNum3 = $regoNum4 = 0;
    $regoNumMain = 10;
    while ($count <= $numberOfEntries)
    {
        $returnVal = "".$alphabet[$regoNum1].$alphabet[$regoNum2].$regoNumMain.$alphabet[$regoNum3].$alphabet[$regoNum4];
        $regoNum1++;
        if ($regoNum1 > 25)
        {
            $regoNum1 = 0;
            $regoNum2++;
            if ($regoNum2 > 25)
            {
                $regoNum2 = 0;
                $regoNum3++;
                if ($regoNum3 > 25)
                {
                    $regoNum3 = 0;
                    $regoNum4++;
                    if ($regoNum4 > 25)
                    {
                        $regoNum4 = 0;
                    }
                }
            }
        }
        $regoNumMain = $regoNumMain + 1;
        if ($regoNumMain > 99)
        {
            $regoNumMain = 10;
        }
        //echo $count.") ".$returnVal."<br>";
        $regoArray[$count] = $returnVal;
        $count++;
    }

    $count = 0;
    while ($count < $numberOfEntries)
    {
        $user = RandomUser($db);
        $car = RandomCar($db, $yearMin, $yearMax, $regoArray[$count]);
        $car->WriteDB($db, $user["email"]);
        //echo json_encode($car->AsArray());
        //echo $user["email"];
        $count++;
    }



?>