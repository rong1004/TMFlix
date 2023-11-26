<?php
session_start();

$Member_Email = "";
$errors = array(); 

include "../connection.php";

if (isset($_POST['register'])) {
	$Member_FirstName = mysqli_real_escape_string($conn, $_POST['Member_FirstName']);
	$Member_LastName = mysqli_real_escape_string($conn, $_POST['Member_LastName']);
	$Member_Email = mysqli_real_escape_string($conn, $_POST['Member_Email']);
	$Member_Gender = mysqli_real_escape_string($conn, $_POST['Member_Gender']);
	$Member_Birthday = mysqli_real_escape_string($conn, $_POST['Member_Birthday']);
	$Member_Password = mysqli_real_escape_string($conn, $_POST['Member_Password']);
	$ConfirmPassword = mysqli_real_escape_string($conn, $_POST['ConfirmPassword']);
	$Member_Address = mysqli_real_escape_string($conn, $_POST['Member_Address']);
	$userType = mysqli_real_escape_string($conn, $_POST['userType']);

	if (empty($Member_FirstName)) { array_push($errors, "First Name is required!"); }
	if (empty($Member_LastName)) { array_push($errors, "Last Name is required!"); }
	if (empty($Member_Email)) { array_push($errors, "Email is required!"); }
	if (empty($Member_Gender)) { array_push($errors, "Please select your gender!"); }
	if (empty($Member_Birthday)) { array_push($errors, "Birthday is required!"); }
	if (empty($Member_Password)) { array_push($errors, "Password is required!"); }
	if ($Member_Password != $ConfirmPassword) {
	array_push($errors, "The two passwords do not match!");
	if (empty($Member_Address)) { array_push($errors, "Address is required!"); }
	if (empty($userType)) { array_push($errors, "Please select your user type!"); }
}

$user_check_query = "SELECT * FROM Member WHERE Member_Email='$Member_Email' LIMIT 1";
$result = mysqli_query($conn, $user_check_query);
$user = mysqli_fetch_assoc($result);
  
if ($user) {
	if ($user['Member_Email'] === $Member_Email) {
		array_push($errors, "email already exists");
	}
}

if (count($errors) == 0) {
  	

  	$query = "INSERT INTO Member (Member_FirstName, Member_LastName, Member_Email, Member_Gender, Member_Birthday, Member_Password, Member_Address, userType) 
  			  VALUES('$Member_FirstName', '$Member_LastName', '$Member_Email', '$Member_Gender', '$Member_Birthday', '$Member_Password','$Member_Address', '$userType')";
			  
  	mysqli_query($conn, $query);
	
	$_SESSION['Member_Email'] = $Member_Email;
  	$_SESSION['success'] = "You are now logged in";
  	
	if($userType == "Trial"){
		header('location: ../index.php');
	} else {
		header('location: paymentmethod.php');
	}
  }
}

if (isset($_POST['login_user'])) {
	$Member_Email = mysqli_real_escape_string($conn, $_POST['Member_Email']);
	$password = mysqli_real_escape_string($conn, $_POST['Member_Password']);

	if (empty($Member_Email)) {
		array_push($errors, "Email is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	if (count($errors) == 0) {
		$query = "SELECT * FROM Member WHERE Member_Email='$Member_Email' AND Member_Password='$password'";
		$results = mysqli_query($conn, $query);
		$_SESSION['Member_Email'] = $Member_Email;
		
		if (mysqli_num_rows($results) == 1 ) {
			header('location: ../index.php');
		}else {
			array_push($errors, "Wrong email/password combination");
		}
	}
}


if (isset($_POST['Proceed'])) {
	$planPrice = mysqli_real_escape_string($conn, $_POST['planPrice']);
	$paymentmethod = mysqli_real_escape_string($conn, $_POST['paymentmethod']);
	
	if (empty($planPrice)) {
		array_push($errors, "Please select plan price!");
	}
	if (empty($paymentmethod)) {
		array_push($errors, "Please select payment method!");
	}
	$startdate = date("Y-m-d");
	$date=strtotime("+1 Months");
	$enddate = date("Y-m-d", $date);
	
	if (count($errors) == 0) {
		$Member_Email = $_SESSION['Member_Email'];
		$query = "SELECT * FROM Member where Member_Email='$Member_Email'";
		$SQLResult1 = mysqli_query($conn, $query);
		$Row = mysqli_fetch_row($SQLResult1);
		$Member_ID = $Row[0];
		
		$query1 = "INSERT INTO AccountPlan (planPrice, startAccess_Date, endAccess_Date, paymentmethod, Member_ID) 
  			  VALUES('$planPrice', '$startdate', '$enddate', '$paymentmethod', '$Member_ID')";
		mysqli_query($conn, $query1);
		
		header('location: paymentsuccess.php');
	}
}

if (isset($_POST['Cancel'])) {
	header('location: registration.php');
}

?>