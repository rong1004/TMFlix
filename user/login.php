<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
</head>
<body>
	<div>
		<h2>Login</h2>
	</div>
	 
	<form method="post" action="login.php">
		<?php include('errors.php'); ?>
		<div>
			<label>Email</label>
			<input type="text" name="Member_Email" >
		</div>
		<br>
		<div>
			<label>Password</label>
			<input type="password" name="Member_Password">
		</div>
		<br>
		<div>
			<button type="submit" name="login_user">Login</button>
		</div>
		<p>
			Not yet a member? <a href="registration.php">Sign up</a>
		</p>
		<p>
			<a href="../admin/adminlogin.php">Admin Login</a>
		</p>
	</form>
</body>
</html>