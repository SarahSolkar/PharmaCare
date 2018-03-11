<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<div id="form">
		<form action="success.php" method="POST">
			<p>
				<label>Email:</label>
				<input type="text" name="email" id="shop" required>
			</p>
			<p>
				<label>Password:</label>
				<input type="password" name="pass" id="pass" required>
			</p>
			<p>
				<input type="submit" name="button" value="Login">
			</p>
		</form>
		<p>Have you not registered yet?<a href="registration.php">Create Account</a></p>
	</div>
</body>
</html>