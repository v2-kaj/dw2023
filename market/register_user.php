<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User account registration</title>
    <link rel="stylesheet" href="flexible.css" />
</head>

<body>
    <div class='row'>
        <div class='col-4'></div>
        <div class='col-4'>
            <?php

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "market";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $username = $_POST["user_name"];
            $email = $_POST["user_email"];
            $password = $_POST["user_password"];

            // Check if username already exists
            $checkStmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
            $checkStmt->bind_param("s", $username);
            $checkStmt->execute();
            $checkResult = $checkStmt->get_result();

            if ($checkResult->num_rows > 0) {
                $_SESSION['username_taken'] = true;
                header("Location: create_account.php");
            } else {
                // Hash the user's password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Create a prepared statement
                $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $username, $email, $hashedPassword);

                // Execute the statement
                if ($stmt->execute()) {
                    // This block will execute if data was successfully inserted into the database
                    echo "<p>You have successfully registered</p>";
                    echo "<a href='login.php'>Go to the login page</a>";
                } else {
                    echo "Error: " . $stmt->error;
                }
            }

            // Close the statements and connection
            $checkStmt->close();
            $stmt->close();
            $conn->close();
            ?>
        </div>
        <div class='col-4'></div>
    </div>
</body>

</html>
