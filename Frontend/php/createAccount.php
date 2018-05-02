<?php

include("classes/accounts.php");


$tempAccount = new Account(
                        $_POST["email"], $_POST["password"], $_POST["firstname"],
                        $_POST["lastname"], $_POST["licence"], $_POST["cardtype"], 
                        $_POST["ccnumber"], $_POST["expiry"], $_POST["cvc"], $_POST["cardname"]); 

//Send to DB
$tempAccount->WriteDb($db);

?>