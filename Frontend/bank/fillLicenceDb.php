<?php
    $myfile = fopen("answers.txt", "r") or die("Unable to open file!");
    // Get Answers
    if ($val <= 5)
    {
      $first = true;
      while(!feof($myfile))
      {
          $line = fgets($myfile);
          $line = explode(",", $line);
          $num = (int) $line[0];
          if ($num > 0)
          {
            $stringTemp = preg_replace('/\s+/', '', $line[1]);
            $answers[$num] = $stringTemp;
          }
      }
      fclose($myfile);
?>