<?php

session_start();
require_once 'dbConnect.php';

$del_query = "SELECT products.seller
            FROM products
            WHERE products.id=?";
$del_stmt = $conn->prepare($del_query);
$del_stmt->bind_param("i", $_GET['id']);
$del_stmt->execute();
$del_stmt->bind_result($seller);
$del_stmt->fetch();
$del_stmt->close();

if($seller==$_SESSION['user_id']){
$query = "DELETE FROM products WHERE id=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();
$stmt->close();
header("Location: index.php");
} else{
    echo "Not permitted";
}
