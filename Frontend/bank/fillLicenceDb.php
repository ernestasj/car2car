<?php

function randomDate($start_date, $end_date)
{
    // Convert to timetamps
    $min = strtotime($start_date);
    $max = strtotime($end_date);

    // Generate random number using above bounds
    $val = rand($min, $max);

    // Convert back to desired date format
    return date('Y-m-d', $val);
}

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
mysqli_query($con, "use fakeRMS");

    $myfile = fopen("listOfNamesMale.txt", "r") or die("Unable to open file!");
    $licenceNum = 100000;
    $ageMax = 100;
    $ageMin = 18;

    while(!feof($myfile))
    {
      $line = fgets($myfile);
      $line = explode(" ", $line);
      echo " - ".$line[0]." | ".$line[1]."<br>";
      $d=strtotime("-100 Years");
      $d2=strtotime("-18 Years");
      $firstName = $line[0];
      $lastName = $line[1];
      $dob = randomDate(date("Y-m-d", $d),date("Y-m-d", $d2));
      $gender = 'm';
      $insertStatement = "INSERT INTO LicenceList VALUES (
        '".$licenceNum."',
        '".$firstName."',
        '".$lastName."',
        '".$dob."',
        '".$gender."'     
        )";
        $licenceNum++;
        mysqli_query($con, $insertStatement);
    }
    fclose($myfile);

    $myfile = fopen("listOfNamesFemale.txt", "r") or die("Unable to open file!");
    
    while(!feof($myfile))
    {
      $line = fgets($myfile);
      $line = explode(" ", $line);
      echo " - ".$line[0]." | ".$line[1]."<br>";
      $d=strtotime("-100 Years");
      $d2=strtotime("-18 Years");
      $firstName = $line[0];
      $lastName = $line[1];
      $dob = randomDate(date("Y-m-d", $d),date("Y-m-d", $d2));
      $gender = 'f';
      $insertStatement = "INSERT INTO LicenceList VALUES (
        '".$licenceNum."',
        '".$firstName."',
        '".$lastName."',
        '".$dob."',
        '".$gender."'     
        )";
        $licenceNum++;
        mysqli_query($con, $insertStatement);
    }
    fclose($myfile);
?>