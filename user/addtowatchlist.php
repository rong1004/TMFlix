<?php 
	include "../connection.php";
	session_start(); 
	$Member_Email = $_SESSION['Member_Email'];
	$sql1 = "SELECT * FROM Member WHERE Member_Email='$Member_Email'";
	$result1 = mysqli_query($conn,$sql1);
	$row1 = mysqli_fetch_row($result1);
	$Member_ID = $row1[0];

	foreach ($_POST as $key => $value) {
		$sql3 = "SELECT * FROM TvSeries_Watchlist WHERE Member_ID = '$Member_ID' AND TvSeries_ID = '$value'";
		$result3 = mysqli_query($conn,$sql3);
		if (mysqli_num_rows($result3) == 0) {
			$sql2 = "INSERT INTO TvSeries_Watchlist (Member_ID, TvSeries_ID) VALUES ('$Member_ID','$value')";
			mysqli_query($conn, $sql2);
			echo "This TV Series has been added into your watchlist!";
		} else {
			echo "This TV Series is still in your watchlist!";	
		}
	}
?>

<!DOCTYPE html>
<html>
<head> 
	<title>AddtoWatchList</title>
</head>
<body>
	</br></br>
	<a href="watchlist.php"> View your watchlist </a>
	</br></br>
	<a href="watch.php"> Return to TV Series List </a>
	</br></br>
	<a href="../index.php"> Return to Home Page </a>
</body>
</html>