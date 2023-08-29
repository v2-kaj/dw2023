<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Create Account</title>
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
			<h3>Create Your Account</h3>
			<?php
				if(isset($_SESSION['username_taken'])){
					echo "This username is taken. Please try a different username";
				}
			?>
			<form action="register_user.php" method="POST">
				Username <br />
				<input type="text" name="user_name" placeholder='username' required="required" />
				<br>
				<br>
				Email <br>
				<input type="email" name="user_email" placeholder='email'  required="required" />
				<br>
				<br>
				Password <br>
				<input type="password" name="user_password" placeholder='password'  required="required" />
				<br>
				<br>
				<input type="submit" value="Create Account" />
			</form>
			<br>
			<a href='login.php'>Login</a>
		</div>
		<div class='col-4'></div>
		<?php
			unset($_SESSION['username_taken']);
		?>
	</div>
</body>
</html>
