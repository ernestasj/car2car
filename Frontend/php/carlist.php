<?php
   $carlist = mysqli_query($db,"call UsersListOfCars('$user_check') ");
   
   //$carlist = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
?>