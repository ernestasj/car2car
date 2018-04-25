<?php
    include("includes.php");

    $messages = new Messages();
    $messages->LoadMessages(1, 2, 3, 4);

    $alerts = new Alerts();
    $alerts->LoadAlerts(1, 2, 3, 4);

    $tasks = new Tasks();
    $tasks->LoadTasks(1, 2, 3, 4);

   /*
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 

      $myusername =  $_SESSION['login_user'];
      $rego = mysqli_real_escape_string($db,$_POST['rego']);
      $model = mysqli_real_escape_string($db,$_POST['model']); 
      $rate = mysqli_real_escape_string($db,$_POST['rate']); 
      
      // Do a count instead of return table?
      // Figure out how to do proper request to sql server to avoid security risk below
      //$sql = "SELECT COUNT(*) FROM user WHERE username = '$myusername' and password = '$mypassword'";
      //$stmt = $db->stmt_init();
      $stmt = $db->prepare("CALL AddCar(?, ?, ?, ?)");
      $stmt->bind_param("sssi", $rego, $myusername, $model, $rate);
      $stmt->execute();
   }
   */
?>
