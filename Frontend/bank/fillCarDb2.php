<?php   //THIS IS FOR CAR DATABSE NOT FAKE RMS
class ModelClass
{
    public $make;
    public $model;
    function __construct($make, $model)
    {
        $this->make = $make;
        $this->model = $model;
    }
}
$numberOfEntries = 100;
$globalDoors = 4;
$globalCC = 1000;
$yearMin = 1995;
$yearMax = 2018;
$kmsMax = 500000;
$globalBody = "body";
$modelArray = array();
$regoArray = array();
$globalPetrol = "petrol";
$transmission = array("auto", "manual");



//Connecting To Database
$servername = "localhost:3306";
$dbusername = "root";
$dbpassword = "";
//Creating Connection

$con = mysqli_connect($servername, $dbusername, $dbpassword, 'test');

//Checking Connection
if (!$con)
{
	die("Connection Failed: " . mysqli_connect_error());
}
echo "CONNECTED!<br>";
// Connected successfully
//Getting Data
mysqli_query($con, "use car");
$getCarDetails = "SELECT * FROM model;";
$modelResult = mysqli_query($con, $getCarDetails);
if (mysqli_num_rows($modelResult) > 0)
{
	while ($row = mysqli_fetch_assoc($modelResult))
	{
        $modelArray[count($modelArray)] = new ModelClass($row["make"], $row["name"]);
    }
}



foreach ($modelArray as $value)
{
    echo " - ".$value->make." | ".$value->model."<br>";
}




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
    $tranNum = rand(0, 1);
    $kms = rand(0, $kmsMax);
    $yearTemp = rand($yearMin, $yearMax);
    $makeNum = rand(0, count($modelArray)-1);
    $insertStatement = "INSERT INTO car VALUES(
        '".$regoArray[$count]."',
        '".$modelArray[$makeNum]->make."',
        '".$modelArray[$makeNum]->model."',
        '".$modelArray[$makeNum]->make."',
        '".$globalPetrol."',
        '".$transmission[$tranNum]."',
        '".$yearTemp."',
        '".$globalDoors."',
        '".$globalCC."',
        '".$kms."', 
        '".$globalBody."',
        'default.jpg',
        'bob'
        )";
    mysqli_query($con, $insertStatement);
    $count++;
}



?>