<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Login to Book Store Administration</h1>
	<?php if(isset($_GET['login']) and $_GET['login'] == "failed"): ?>
		<div class="error">Login failed. Username or password incorrect.</div>
	<?php endif; ?>

	<form action="login.php" method="post">
		<label for="name">Name</label>
		<input type="text" name="name" id="name">
		<label for="password">Password</label>
		<input type="password" name="password" id="password"><br><br>
		<input type="submit" value="Admin Login">
	</form>
</body>
</html>