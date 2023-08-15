<?php

// Start the session
session_start();
if (!isset($_SESSION["isloggedin"])) {
    header("Location: login.php");
}

// Replace these with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "market";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $seller = $_SESSION['user_id'];
    $image = $_FILES["image"]["tmp_name"]; // Image upload

    // Read image data as binary
    $imageData = file_get_contents($image);

    // Prepare and bind the INSERT statement
    $query = "INSERT INTO products (name, description, seller, price, image) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssiis", $name, $description, $seller, $price, $imageData);


    // Execute the statement
    if ($stmt->execute()) {
        echo "Product added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="flexible.css" />
    <title>Add Product</title>
</head>

<body>
    <div class="row">
        <header class='col-12'>
            <h1>Online Market</h1>
        </header>
    </div>
    <div class="row">
        <div class='col-2'>
         <?php
          require_once 'nav.php';
         ?>

        </div>
        <div class="col-8">

            <h2>Add Product</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" required><br>

                <label for="name">Price:</label><br>
                <input type="text" id="price" name="price" required><br>

                <label for="description">Description:</label> <br>
                <textarea id="description" name="description" required></textarea><br>

                <label for="image">Image:</label> <br>
                <input type="file" id="image" name="image" accept="image/*" required><br>
                <br>
                <input type="submit" value="Add Product">
            </form>
        </div>
    </div>
</body>

</html>
