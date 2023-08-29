<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      $userDetails = array("name"=>"Ron", "age"=>21, "email"=>"ron@mail.com");

      echo "<h1>Using a for loop</h1>";
      foreach($userDetails as $detail){
        echo $detail;
        echo " ";

      }
      phpmyadmin

    ?>
  </body>
</html>
