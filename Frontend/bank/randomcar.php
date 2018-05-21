<?php
    function RandomCar($db, $minyear, $maxyear, $rego)
    {
        $yearTemp = rand($minyear, $maxyear);
        $suburb = RandomSuburb($db);
        $user = RandomUser($db);
        $makeModel = RandomMakeModel($db);

        $desc["rego"] = $rego;
        $desc["make"] = $makeModel["make"];
        $desc["model"] = $makeModel["model"];
        $desc["year"] = $yearTemp;
        $desc["doors"] = RandomDoors($db);
        $desc["petrol"] = RandomPetrol($db);
        $desc["transmission"] = RandomTransmission($db);
        $desc["enginecc"] = RandomEnginecc($db);
        $desc["kms"] = RandomKMS($db);
        $desc["body"] = RandomBody($db);
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
        return $car;
    }
?>