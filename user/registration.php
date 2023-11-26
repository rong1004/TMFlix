<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>User Registration</title>
</head>
<body>

<header>
	<h2>TMFlix</h2>
</header>

<div>
  	<h2>Register</h2>
</div>
	
	<form method="post" action="registration.php">
		<?php include('errors.php'); ?>
		<div>
			<label>First Name</label>
			<input type="text" name="Member_FirstName" placeholder="Enter Your First Name">
		</div>
		<br>
		<div>
			<label>Last Name</label>
			<input type="text" name="Member_LastName" placeholder="Enter Your Last Name">
		</div>
		<br>
		<div>
			<label>Email</label>
			<input type="email" name="Member_Email" placeholder="Enter Your Email">
		</div>
		<br>
		<div>
			<label>Gender</label>
			<input type="radio" name="Member_Gender"  value="MALE">
				<label for="male">Male</label>
			<input type="radio" name="Member_Gender"  value="FEMALE" >
				<label for="female">Female</label>
		</div>
		<br>
		<div>
			<label>Birthday (YYYY-MM-DD)</label>
			<input type="text" name="Member_Birthday" placeholder="Enter Your Birthday">
		</div>
		<br>
		<div>
			<label>Password</label>
			<input type="password" name="Member_Password" placeholder="Enter Your Password">
		</div>
		<br>
		<div>
			<label>Confirm password</label>
			<input type="password" name="ConfirmPassword" placeholder="Confirm Your Password">
		</div>
		<br>
		<div>
			<label>Address</label>
			<input type="text" name="Member_Address" placeholder="Enter Your Address">
		</div>
		<br>
		<div>
			<label>Register as:</label>
			<br>
			<input type="radio" name="userType"  value="Trial">
				<label for="trial">Trial</label>
			<input type="radio" name="userType"  value="Paid Membership" >
				<label for="Paid Membership">Paid Membership</label>
		</div>
		<br>
		<div>
			<button type="submit" name="register">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
	
</body>
</html>