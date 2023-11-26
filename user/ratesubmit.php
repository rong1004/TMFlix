<?php 
	include "../connection.php";
	session_start(); 
	$Member_Email = $_SESSION['Member_Email'];
	$value = $_SESSION['TvSeries_ID'];
	$sql1 = "SELECT * FROM Member WHERE Member_Email='$Member_Email'";
	$result1 = mysqli_query($conn,$sql1);
	$row1 = mysqli_fetch_row($result1);
	$Member_ID = $row1[0];

	if (isset($_POST['rate'])) {
		$Rating = mysqli_real_escape_string($conn, $_POST['rating']);
		$sql2 = "SELECT * FROM Rating WHERE Member_ID = '$Member_ID' AND TvSeries_ID = '$value'";
		$result2 = mysqli_query($conn,$sql2);
		if (mysqli_num_rows($result2) == 1) {
			$sql3 = "UPDATE Rating SET TvSeries_Rating = '$Rating' WHERE Member_ID = '$Member_ID' AND TvSeries_ID = '$value'";
			mysqli_query($conn,$sql3);
		}
		else {
			$sql4 = "INSERT INTO Rating (Member_ID, TvSeries_Rating, TvSeries_ID) VALUES ('$Member_ID', '$Rating', '$value')";
			mysqli_query($conn,$sql4);
		}
	}
?>

<!DOCTYPE html>
<html>
<head> 
	<title>RatingSubmitted</title>
</head>
<body>
	<h2>Your rating has been submitted! Thank you for the feedback.</h2>

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