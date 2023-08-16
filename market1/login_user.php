<?php
// Start the session
session_start();

require_once 'dbConnect.php';

// Get user input
$userName = $_POST["user_name"];
$userPassword = $_POST["user_password"];

// Create a prepared statement
$stmt = $conn->prepare("SELECT id, password FROM users WHERE username=?");
$stmt->bind_param("s", $userName);
$stmt->execute();
$stmt->bind_result($userId, $storedHashedPassword);
$stmt->fetch();

// Verify the password
if ($storedHashedPassword !== null && password_verify($userPassword, $storedHashedPassword)) {
	// Login the user by putting their id in session
	$_SESSION["user_id"] = $userId;
	// After successful login, redirect the user to the profile page
	$_SESSION["isloggedin"]=true;
	$_SESSION["invalidCredentials"] = false;
	header("Location: index.php");
	exit();
} else {
	// Authentication failed, redirect to login page
	$_SESSION["invalidCredentials"] = true;
	header("Location: login.php");
	exit();
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
