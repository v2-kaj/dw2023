<?php
session_start();

require_once('connect.php');

$id = $_SESSION['id'];
$text= $_GET['task_text'];
$sql = "UPDATE todo  SET text='$text' WHERE id=$id";
if (mysqli_query($conn, $sql)) {
    header("Location: todo.php");
}
else{
    echo "No";
}
$conn->close();
