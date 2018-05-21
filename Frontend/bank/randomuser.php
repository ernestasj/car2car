<?php
    

    function RandomMobile()
    {
        return rand();
    }

    function RandomLandline()
    {
        return rand();
    }

    function RandomStreetNo()
    {
        return rand(1, 500);
    }

    function RandomStreetName()
    {
        $name = ["George", "Main", "Park", "Liverpool", "King", "Hunter", "Bathurst", "Anzac", "Blair", "Hurst"];
        $type = ["Road", "Place", "Circuit", "Street", "Highway", "Avenue", "Lane"];

        return $name[array_rand($name)] . " " . $type[array_rand($type)];
    }

    function RandomDOB()
    {
        $min = strtotime("jan 1st -47 years");
        $max = strtotime("dec 31st -18 years");
        $time = rand($min,$max);
        $dob = date("d/m/Y",$time);
        return $dob;
    }

    function RandomCreditCard($db)
    {
        $types = GetEntries($db, "GetCardTypes");
        $type = $types[array_rand($types)];
        
        $min = strtotime("jan 1st +1 years");
        $max = strtotime("dec 31st +6 years");
        $time = rand($min,$max);
        $expiry = date("m/y",$time);

        return ["number" => rand(), "type" => $type["value"], "cvc" => rand(100, 999), "expiry" => $expiry];
    }

    function RandomPassword()
    {
        return "password";
    }

    function RandomLicence()
    {
        return rand(1000000, 10000000);
    }

    function RandomEmail($firstname, $lastname)
    {
        $domains = ["google.com", "yahoo.com", "hotmail.com", "uowmail.edu.au", "freemail.com", "pizza.com.au", "abc.net.au", "wired.com", "optus.com.au", "telstra.com.au", "vodaphone.com.au", "iinet.com.au", "live.com"];
        $year = rand(1950, 2000);
        return  strtolower($firstname[0].$lastname.$year."@".$domains[array_rand($domains)]);
    }


    function GenerateRandomUser($db)
    {
        $suburb = RandomSuburb($db);
        $credit_card = RandomCreditCard($db);
        $name = RandomName($db);
        $desc['email'] = RandomEmail($name["firstname"], $name["lastname"]);
        $desc['password'] = RandomPassword();
        $desc['firstname'] = $name["firstname"];
        $desc['lastname'] = $name["lastname"];
        $desc['licence'] = RandomLicence();
        $desc['dob'] = RandomDOB();
        $desc['number'] = RandomStreetNo();
        $desc['street'] = RandomStreetName();
        $desc['suburb'] = $suburb["name"];
        $desc['state'] = $suburb["state"];
        $desc['postcode'] = $suburb["postcode"];
        $desc['mobnumber'] = RandomMobile();
        $desc['landline'] = RandomLandline();
        $desc['ccnumber'] = $credit_card["number"];
        $desc['cvc'] = $credit_card["cvc"];
        $desc['cardtype'] = $credit_card["type"];
        $desc['expiry'] = $credit_card["expiry"];

        return $desc;
    }
?>
