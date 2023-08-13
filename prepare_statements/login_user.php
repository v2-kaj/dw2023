<?php
// Start the session
session_start();

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

// Get user input
$userName = $_POST["user_name"];
$userPassword = $_POST["user_password"];

// Create a prepared statement
$stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
$stmt->bind_param("ss", $userName, $userPassword);
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Authenticate a user
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	// Login the user by putting their id in session
	$_SESSION["user_id"] = $row["id"];
	$_SESSION["isloggedin"] = true;
	// After successful login, redirect the user to the profile page
	header("Location: profile.php");
	exit();
} else {
	// Authentication failed, redirect to login page
	header("Location: login.php");
	exit();
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
