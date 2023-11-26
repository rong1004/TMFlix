<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
</head>
<body>
<header>
  <h2>TMFlix</h2>
</header>
<div>
	<h2>Admin Login</h2>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<p>Full Name</p>
		<input type="text" name="Fullname" placeholder="Enter Full Name">
		<p>Password</p>
		<input type="password" name="Admin_Password" placeholder="Enter Your Password">
		
		<button type="submit" name="login_admin">LOGIN</a></button>
		<button><a href="../user/login.php">User login</a></button>
	
		</form>
</div>	
</body>
</html>

<?php
	include "connection.php";
	if (isset($_POST['login_admin'])) {
	$Fullname = mysqli_real_escape_string($conn, $_POST['Fullname']);
	$Admin_Password = mysqli_real_escape_string($conn, $_POST['Admin_Password']);
	

		if ($Fullname == "Admin" && $Admin_Password == "Admin") {
			header('location: adminmain.php');
		}else {
			header('location: adminlogin.php');
		}

}
?>
