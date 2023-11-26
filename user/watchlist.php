<?php 
	include "../connection.php";
	session_start(); 
	$Member_Email = $_SESSION['Member_Email'];
	$sql1 = "SELECT * FROM Member WHERE Member_Email='$Member_Email'";
	$result1 = mysqli_query($conn,$sql1);
	$row1 = mysqli_fetch_row($result1);
	$Member_ID = $row1[0];
	
	$sql2 = "SELECT * FROM TvSeries_Watchlist WHERE Member_ID = '$Member_ID'";
	$result2 = mysqli_query($conn,$sql2);
	
	foreach ($_POST as $key => $value) {
		$sql6 = "DELETE FROM TvSeries_Watchlist WHERE Member_ID = '$Member_ID' AND TvSeries_ID = '$value'";
		mysqli_query($conn,$sql6);
		header('location: watchlist.php');
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Watchlist</title>
</head>
<body>
	<h1>Watchlist</h1>
	<a href="../index.php"> Return to Home Page </a>
	<br/>
	<br/>
	<hr>

	<?php
		while($data2 = mysqli_fetch_array($result2)) {
			$TVID = $data2['TvSeries_ID'];
			$sql5 = "SELECT * FROM TvSeries WHERE TvSeries_ID = '$TVID'";
			$result5 = mysqli_query($conn,$sql5);
			$data5 = mysqli_fetch_array($result5);
	?>
			<h3><?php echo $data5['TvSeries_ID'];?>. <?php echo $data5['TvSeries_Title'];?> </h3>
			<p>Duration: <?php echo $data5['TvSeries_Duration'];?> minutes</p>
			<p>Release: <?php echo $data5['Release_Date'];?></p>
			<p>Country: <?php echo $data5['TvSeries_Country'];?></p>
			
			<!-- Season -->
			<p>Season:
			<?php
				$sql4 = "SELECT COUNT(*) FROM Seasons WHERE TvSeries_ID = '$TVID'";
				$result4 = mysqli_query($conn,$sql4);
				$data4 = mysqli_fetch_array($result4);
				echo $data4[0];
			?>
			</p>

			<!-- Genre -->
			<p>Genre: 
			<?php
				$sql3 = "SELECT * FROM TvSeries_Genres JOIN Genre ON TvSeries_Genres.Genre_ID = Genre.Genre_ID
				     	WHERE TvSeries_Genres.TvSeries_ID = '$TVID'";
				$result3 = mysqli_query($conn,$sql3);
				while($data3 = mysqli_fetch_array($result3)) {
					echo " -";
					echo $data3['Genre_Name'];
				}
			?>
			</p>
			
			<form method="post" action="watchshow.php">
				<button name="watch" type="submit" value= <?php echo $TVID; ?>> Watch Now </button>
			</form>

			<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<button name="remove" type="submit" value= <?php echo $TVID; ?>> Remove from watchlist </button>
			</form>
		<?php
			}
		?>
</body>
</html>