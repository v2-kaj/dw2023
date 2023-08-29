<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="flexible.css" />
  </head>
  <body>
    <div class="row">
      <header class='col-12'>
        <h1>DW APP - All Users</h1>
      </header>
      <div id="allUsers" class="col-6">
    <ol>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dw_2023";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users";

    // execute the query and store the result in users variable
    $users = mysqli_query($conn, $sql);
    //check if you found some users
        if (mysqli_num_rows($users) > 0) {
            // output data of each user
            foreach ($users as $user) {
                echo "<li>" . $user["username"] ." ". $user["email"] ."</li>";
            }
        } else {
            echo "No users";
        }
    mysqli_close($conn);
?>
</ol>
<a href='create_account.html'>Register User</a>
</div>
  </div>

  </body>
</html>
