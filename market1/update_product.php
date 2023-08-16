<?php
ini_set('error_reporting', E_ALL);
ini_set( 'display_errors', 1 );
// Start the session
session_start();
if (!isset($_SESSION["isloggedin"])) {
    header("Location: login.php");
}

// Replace these with your actual database credentials

require_once 'dbConnect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $seller = $_SESSION['user_id'];

    // Check if the image file was uploaded successfully
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES["image"]["tmp_name"];
        $imageFileName = $_FILES["image"]["name"];

        // Destination path to store the uploaded image
        $uploadPath = "products_images/" . $imageFileName;

        // Move the uploaded image to the destination path
        if (move_uploaded_file($imageTmpPath, $uploadPath)) {
            // Insert the image path into the database
            $query = "UPDATE products SET name=?, description=?, price=?, image_path=? WHERE id=?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssssi", $name, $description, $price, $uploadPath, $_GET['id']);
            $stmt->execute();
            $stmt->close();
            echo "Image uploaded and saved successfully!";
        } else {
            echo "Failed to move uploaded image.";
        }
    } else {
        echo "Image upload error.";
    }
}
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

            <h2>Update Product Information</h2>
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
