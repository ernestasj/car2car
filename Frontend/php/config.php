<?php
    session_start();
   define('DB_SERVER', 'localhost:3306');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'car');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die("Error " . mysqli_error($rs));
   $user;
   if(isset($_SESSION['user']))
   {
       $user = unserialize($_SESSION['user']);
   }
?>