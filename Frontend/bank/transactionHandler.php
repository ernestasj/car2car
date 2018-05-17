<?php

function checkCVV($card, $cvv, $con)
{
    $checkStatement = "SELECT * FROM card WHERE cardNum = '".$card."'";
    $result = mysqli_query($con, $checkStatement);
    if (mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);
        if ($row['cvv'] != $cvv)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    else
    {
        return false;
    }
}

function deductFromAccount($card, $cvv, $amount, $con)
{//ERRORS: 0 = NO ERROR | 1 = INCORRECT ACCOUNT DETAILS | 2 = LACK OF FUNDS
    if (checkCVV($card, $cvv, $con) == true)
    {
        $getAccountQuery = "SELECT * FROM Account WHERE accountId = (SELECT accountId FROM card WHERE cardNum = '".$card."')";
        $result = mysqli_query($con, $getAccountQuery);
        if (mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);
            if ($row['balance'] < $amount)
            {
                return 2;
            }
            else
            {
                $newBalance = $row['balance'] - $amount;
                $updateStatement = "UPDATE ACCOUNT SET balance = '".$newBalance."' WHERE accountId = (SELECT accountId FROM card WHERE cardNum = '".$card."')";
                mysqli_query($con, $updateStatement);
                return 0;
            }
        }
        else
        {
            return 1;
        }
    }
    else
    {
        return 1;
    }
}
function addToAccount($card, $cvv, $amount, $con)
{//ERRORS: 0 = NO ERROR | 1 = INCORRECT ACCOUNT DETAILS
    if (checkCVV($card, $cvv, $con) == true)
    {
        $getAccountQuery = "SELECT * FROM Account WHERE accountId = (SELECT accountId FROM card WHERE cardNum = '".$card."')";
        $result = mysqli_query($con, $getAccountQuery);
        if (mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);
            $newBalance = $row['balance'] + $amount;
            $updateStatement = "UPDATE ACCOUNT SET balance = '".$newBalance."' WHERE accountId = (SELECT accountId FROM card WHERE cardNum = '".$card."')";
            mysqli_query($con, $updateStatement);
            return 0;
        }
        else
        {
            return 1;
        }
    }
    else
    {
        return 1;
    }
}


function testFunc($con)
{
    $testCardNum = "4000000000097";
    $testCardCvv = 123;
    $testAmmount = 100;
    $testResult = deductFromAccount($testCardNum, $testCardCvv, $testAmmount, $con);
    echo "TEST RESULT = ".$testResult."<br>";
}

//==============================================================
//CONNECTING TO DATABASE
$servername = "localhost:3306";
$username = "root";
$password = "";
$returnVal = "";
//Creating Connection

$con = mysqli_connect($servername, $username, $password, 'test');

//Checking Connection
if (!$con)
{
	die("Connection Failed: " . mysqli_connect_error());
}
mysqli_query($con, "use bank");
//==============================================================
testFunc($con);
?>