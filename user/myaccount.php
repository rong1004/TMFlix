<?php 
	include "../connection.php";
	session_start(); 
	$Member_Email = $_SESSION['Member_Email'];
	$sql1 = "SELECT * FROM Member WHERE Member_Email='$Member_Email'";
	$result1 = mysqli_query($conn,$sql1);
	$row1 = mysqli_fetch_row($result1);
	$Member_ID = $row1[0];
	
	$sql2 = "SELECT * FROM Member LEFT JOIN AccountPlan ON Member.Member_ID = AccountPlan.Member_ID WHERE Member.Member_ID = '$Member_ID'";
	$result2 = mysqli_query($conn,$sql2);
	$data = mysqli_fetch_array($result2);
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Account</title>
</head>
<body>
	<h1>My Account</h1>
	<a href="../index.php"> Return to Home Page </a>
	<br/>
	<br/>
	<hr>
	<table border="1" style="text-align:left;">
		<tr>
			<th>First Name:</th>
			<th><?php echo $data['Member_FirstName']; ?></th>
		</tr>
		<tr>
			<th>Last Name:</th>
			<th><?php echo $data['Member_LastName']; ?></th>
		</tr>
		<tr>
			<th>Email:</th>
			<th><?php echo $data['Member_Email']; ?></th>
		</tr>
		<tr>
			<th>Gender:</th>
			<th><?php echo $data['Member_Gender']; ?></th>
		</tr>
		<tr>
			<th>Birthday:</th>
			<th><?php echo $data['Member_Birthday']; ?></th>
		</tr>
		<tr>
			<th>Address:</th>
			<th><?php echo $data['Member_Address']; ?></th>
		</tr>
		<tr>
			<th>Subscription Type:</th>
			<th><?php echo $data['userType']; ?></th>
		</tr>
		<tr>
			<th>Subscription Description:</th>
			<th><?php echo $data['planPrice']; ?></th>
		</tr>
		<tr>
			<th>Subscription End Dates:</th>
			<th><?php echo $data['endAccess_Date']; ?></th>
		</tr>
	</table>
</body>
</html>