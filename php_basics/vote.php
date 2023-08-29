<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="" method="post">
      Age <br>
      <input type="text" name="age" >
      <input type="submit" value="Say Hie">
    </form>
    <?php
      if(isset($_POST["age"])){
        $age = $_POST["age"];
        if($age>=18){
          echo "<h1>Eligible to vote</h1>";
        }
        else{
          echo "<h1>You are too young</h1>";
        }

    }

     ?>
  </body>
</html>
