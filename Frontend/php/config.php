<?php
   define('DB_SERVER', 'localhost:3306');
   define('DB_USERNAME', 'daddy');
   define('DB_PASSWORD', 'yeet');
   define('DB_DATABASE', 'car');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die("Error " . mysqli_error($rs));
?>