<?php
//Php file for validating a card
function validateCard($cardTypeP, $cardNumberP)
{
//=========================================
//Set Card number and type here
    $cardType = $cardTypeP;
    $cardNumber = $cardNumberP;
    //$cardType = $_POST['cardType'];
    //$cardNumber = $_POST['cardNum'];
//=========================================
    $cardResult = false;
    $cardNumber = $res = preg_replace("/[^0-9,.]/", "", $cardNumber);
    echo "CARD: ".$cardNumber."<br>";
    $len = strlen($cardNumber);
    $d2 = substr($cardNumber, 0, 2);
    //Checking Kinda of Card
    if ($cardType == 'v' && ($d2{0} != 4 || !($len == 13 || $len == 16)))
    {//Checks for invalid visa card
        echo "Invalid V";
    }
    else if ($cardType == 'm' && (($d2 < 51) || ($d2 > 56) ||($len != 16)))
    {//Checks for invalid master card
        echo 'Invalid M';
    }
    else if ($cardType == 'a' && (!(($d2 == 34) || ($d2 == 37)) || ($len != 15))) 
    {
        echo 'Invalid A';
    }
    else
    {//Card passed initial tests, now Mod 10 algorithm
        echo "passed";
        $splitDigits = str_split($cardNumber);
        $splitDigits = array_reverse($splitDigits);

        foreach(range(1, count($splitDigits) - 1, 2) as $i)
        {
            $splitDigits[$i] *= 2;
            if ($splitDigits[$i] > 9)
            {
                $splitDigits[$i] = ($splitDigits[$i] - 10) + 1;
            }
        }
        $checkVal = array_sum($splitDigits);

        if (($checkVal % 10) == 0)
        {
            $cardResult = true;
            echo "<br>VALID CARD:";
            return true;
        }
        else
        {
            $cardResult = false;
            echo "<br>INVALID CARD:";
            return false;
        }
    }
}



?>