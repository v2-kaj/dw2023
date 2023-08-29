<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="" method="get">
      Name <br>
      <input type="text" name="me" >
      <input type="submit" value="Say Hie">
    </form>
    <?php
      if(isset($_GET["me"])){

        $name = $_GET["me"];
        echo $name;
    }

     ?>
  </body>
</html>
