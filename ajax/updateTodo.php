<?php
require_once('connect.php');
$id = $_POST['id'];
$text= $_POST['text'];
$sql = "UPDATE todo  SET text='$text' WHERE id=$id";
if (mysqli_query($conn, $sql)) {
    echo "succeed";
}
else{
    echo "No";
}
$conn->close();
