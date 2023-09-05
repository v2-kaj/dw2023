<?php
require_once('connect.php');
$id = $_POST['id'];
$sql = "DELETE FROM todo WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo "Deleted successfully";
} else {
    echo "Error deleting todo: " . mysqli_error($conn);
}

$conn->close();
?>





