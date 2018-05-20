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
        echo $count.") ".$returnVal."<br>";
        $regoArray[$count] = $returnVal;
        $count++;
    }


    /*==================================
    $numberOfEntries = 100;
    $globalDoors = 4;
    $globalCC = 1000;
    $yearMin = 1995;
    $yearMax = 2018;
    $kmsMax = 500000;
    $body = "body";
    $modelArray = array();
    $regoArray = array();
    $globalPetrol = "petrol";
    ==================================*/

    //====================================
    //Filling Database

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
        $desc["monday"] = array_rand(["yes"], ["no"]);
        $desc["tuesday"] = array_rand(["yes"], ["no"]);
        $desc["wednesday"] = array_rand(["yes"], ["no"]);
        $desc["thursday"] = array_rand(["yes"], ["no"]);
        $desc["friday"] = array_rand(["yes"], ["no"]);
        $desc["saturday"] = array_rand(["yes"], ["no"]);
        $desc["sunday"] = array_rand(["yes"], ["no"]);
        $desc["public_holidays"] = array_rand(["yes"], ["no"]);
        $desc["postcode"] = $suburb["postcode"];
        $desc["suburb"] = $suburb["name"];
        $desc["state"] = $suburb["state"];
        $desc["description"] = RandomDescription($db);
        $desc["rate"] = rand(15, 100);

        $car = new Car($desc);
        $car->UpdateDB($db, $user["email"]);
        $count++;
    }



?>