<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="flexible.css" />
</head>

<body>
	<div class='row'>
		<header class='col-12'>
			<h1>Online Market</h1>
		</header>
	</div>
	<div class='row'>
		<div class='col-4'></div>
		<div class='col-4'>
			<h3>Login</h3>
			<?php
			if (isset($_SESSION['invalidCredentials'])) {
				if ($_SESSION['invalidCredentials']) {
					echo "<p>Invalid Credentials</p>";
				}
			}
			?>
			<form action="login_user.php" method="POST">
				Username <br />
				<input type="text" name="user_name" placeholder='username' />
				<br>
				<br>
				Password <br>
				<input type="password" name="user_password" placeholder='password' />
				<br>
				<br>
				<input type="submit" value="Login" />
			</form>
			<br>
			<a href='create_account.php'>Create an account</a>
		</div>
		<div class='col-4'></div>
	</div>
	<?php unset($_SESSION["invalidCredentials"]);?>
</body>

</html>