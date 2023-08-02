<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<title></title>
</head>

<body>
	<?php
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
		echo "Connected successfully";
	?>
</body>

</html>
