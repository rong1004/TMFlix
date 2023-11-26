<?php 
	include "../connection.php";
	session_start(); 
	$Member_Email = $_SESSION['Member_Email'];
	$sql1 = "SELECT * FROM Member WHERE Member_Email='$Member_Email'";
	$result1 = mysqli_query($conn,$sql1);
	$row1 = mysqli_fetch_row($result1);
	$Member_ID = $row1[0];

	foreach ($_POST as $key => $value) {
		$sql5 = "SELECT * FROM TvSeries_Watchlist WHERE Member_ID = '$Member_ID' AND TvSeries_ID = '$value'";
		$result5 = mysqli_query($conn,$sql5);
		if (mysqli_num_rows($result5) == 1) {
			$sql6 = "DELETE FROM TvSeries_Watchlist WHERE Member_ID = '$Member_ID' AND TvSeries_ID = '$value'";
			mysqli_query($conn,$sql6);
			echo "Show has been removed from your watchlist.";
			echo "</br>";
		}

		$sql3 = "SELECT * FROM TvSeries_WatchCount WHERE Member_ID = '$Member_ID' AND TvSeries_ID = '$value'";
		$result3 = mysqli_query($conn,$sql3);
		if (mysqli_num_rows($result3) == 0) {
			$sql2 = "INSERT INTO TvSeries_WatchCount (Member_ID, TvSeries_ID, Watch_Count) VALUES ('$Member_ID','$value',1)";
			mysqli_query($conn, $sql2);
			echo "Thanks for watching!";
		} else {
			$sql4 = "UPDATE TvSeries_WatchCount SET Watch_Count = Watch_Count + 1 WHERE Member_ID = '$Member_ID' AND TvSeries_ID = '$value'";
			mysqli_query($conn,$sql4);
			echo "Thanks for watching again!";	
		}
	}
?>

<!DOCTYPE html>
<html>
<head> 
	<title>WatchEnd</title>
</head>
<body>
	</br></br>
	<a href="rate.php"> Rate your watched series </a>
	</br></br>
	<a href="watchlist.php"> View your watchlist </a>
	</br></br>
	<a href="watch.php"> Return to TV Series List </a>
	</br></br>
	<a href="../index.php"> Return to Home Page </a>
</body>
</html>