<?php   //Generate Car entries for the car database
    include("../php/includes.php");

    $numberOfEntries = 100;
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
        $yearTemp = rand($yearMin, $yearMax);
        $suburb = RandomSuburb($db);
        $user = RandomUser($db);
        $makeModel = RandomMakeModel($db);

        $desc["rego"] = $regoArray[$count];
        $desc["make"] = $makeModel["make"];
        $desc["model"] = $makeModel["model"];
        $desc["year"] = $yearTemp;
        $desc["doors"] = RandomDoors($db);
        $desc["petrol"] = RandomPetrol($db);
        $desc["transmission"] = RandomTransmission($db);
        $desc["enginecc"] = RandomEnginecc($db);
        $desc["kms"] = RandomKMS($db);
        $desc["body"] = RandomPetrol($db);
        $desc["monday"] = RandomYesNo();
        $desc["tuesday"] = RandomYesNo();
        $desc["wednesday"] = RandomYesNo();
        $desc["thursday"] = RandomYesNo();
        $desc["friday"] = RandomYesNo();
        $desc["saturday"] = RandomYesNo();
        $desc["sunday"] = RandomYesNo();
        $desc["public_holidays"] = RandomYesNo();
        $desc["postcode"] = $suburb["postcode"];
        $desc["suburb"] = $suburb["name"];
        $desc["state"] = $suburb["state"];
        $desc["description"] = RandomDescription($db);
        $desc["rate"] = rand(15, 100);

        $car = new Car($desc);
        //$car->UpdateDB($db, $user["email"]);
        echo json_encode($car->AsArray());
        $count++;
    }



?>