<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('connect.php');
    $text = $_POST["text"];
    $sql = "INSERT INTO todo (text) VALUES ('$text')";

    // Execute the SQL
    if (mysqli_query($conn, $sql)) {
        echo "succeeded";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Invalid request method. This endpoint only accepts POST requests.";
}
?>
