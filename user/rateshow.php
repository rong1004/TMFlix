<?php 
	include "../connection.php";
	session_start(); 
	$Member_Email = $_SESSION['Member_Email'];
	$sql1 = "SELECT * FROM Member WHERE Member_Email='$Member_Email'";
	$result1 = mysqli_query($conn,$sql1);
	$row1 = mysqli_fetch_row($result1);
	$Member_ID = $row1[0];

	foreach ($_POST as $key => $value) {
		$_SESSION['TvSeries_ID'] = $value;
		$sql5 = "SELECT * FROM Rating WHERE Member_ID = '$Member_ID' AND TvSeries_ID = '$value'";
		$result5 = mysqli_query($conn,$sql5);
		if (mysqli_num_rows($result5) == 1) {
			echo "Show has been previously rated by you.";
			echo "</br>";
			echo "Click return if you don't want to change the rating.";
			echo "</br>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head> 
	<title>RateShow</title>
</head>
<body>
	<form method="post" action="ratesubmit.php">
		<label>Your Rating: </label>
		<input type="text" name="rating" placeholder="Enter rating (0.0-10.0)">
		<button type="submit" name="rate">Rate</button>
	</form>

	</br></br>
	<a href="rate.php"> Rate other series </a>
	</br></br>
	<a href="watchlist.php"> View your watchlist </a>
	</br></br>
	<a href="watch.php"> Return to TV Series List </a>
	</br></br>
	<a href="../index.php"> Return to Home Page </a>
</body>
</html>