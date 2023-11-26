<?php 
	include "../connection.php";
	session_start(); 
	$Member_Email = $_SESSION['Member_Email'];
	$sql1 = "SELECT * FROM Member WHERE Member_Email='$Member_Email'";
	$result1 = mysqli_query($conn,$sql1);
	$row1 = mysqli_fetch_row($result1);
	$Member_ID = $row1[0];
	
	$sql2 = "SELECT * FROM TvSeries";
	$result2 = mysqli_query($conn,$sql2);
?>

<!DOCTYPE html>
<html>
<head> 
	<title>Watch</title>
</head>
<body>
	<h1>List of TV Series to Watch</h1>
	<a href="../index.php"> Return to Home Page </a>
	<br/>
	<br/>
	<hr>

	<?php
		while($data2 = mysqli_fetch_array($result2)) {
			$TVID = $data2['TvSeries_ID'];
	?>
			<h3><?php echo $data2['TvSeries_ID'];?>. <?php echo $data2['TvSeries_Title'];?> </h3>
			<p>Duration: <?php echo $data2['TvSeries_Duration'];?> minutes</p>
			<p>Release: <?php echo $data2['Release_Date'];?></p>
			<p>Country: <?php echo $data2['TvSeries_Country'];?></p>
			
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

			<!-- Director -->
			<p>Directors:
			<?php
				$sql5 = "SELECT * FROM Directors_TV JOIN Directors ON Directors_TV.Directors_ID = Directors.Directors_ID
				     	WHERE Directors_TV.TvSeries_ID = '$TVID'";
				$result5 = mysqli_query($conn,$sql5);
				while($data5 = mysqli_fetch_array($result5)) {
					echo " -";
					echo $data5['Directors_Name'];
				}
			?>
			</p>

			<!-- Actor -->
			<p>Actors:
			<?php
				$sql6 = "SELECT * FROM Actors_TV JOIN Actors ON Actors_TV.Actors_ID = Actors.Actors_ID
				     	WHERE Actors_TV.TvSeries_ID = '$TVID'";
				$result6 = mysqli_query($conn,$sql6);
				while($data6 = mysqli_fetch_array($result6)) {
					echo " -";
					echo $data6['Actors_Name'];
				}
			?>
			</p>

			<!-- Award -->
			<p>Awards:
			<?php
				$sql7 = "SELECT * FROM Awards WHERE TvSeries_ID = '$TVID'";
				$result7 = mysqli_query($conn,$sql7);
				$count = 1;
				while($data7 = mysqli_fetch_array($result7)) {
					echo " -";
					echo $data7['Awards_Title'];
					echo " as ";
					echo $data7['Awards_Winners'];
					$count = $count + 1;
				}
				if ($count == 1) {
					echo " NONE";
				}
			?>
			</p>

			<!-- Rating -->
			<p>Rating:
			<?php 
				$sql8 = "SELECT AVG(TvSeries_Rating) FROM Rating WHERE TvSeries_ID = '$TVID'";
				$result8 = mysqli_query($conn,$sql8);
				$data8 = mysqli_fetch_array($result8);
				echo $data8[0];
				if ($data8[0] == NULL) {
					echo "NONE";
				}
			?>
			</p>
			
			<form method="post" action="viewseasons.php">
				<button name="viewseason" type="submit" value= <?php echo $TVID; ?>> View seasons and episodes </button>
			</form>

			<form method="post" action="addtowatchlist.php">
				<button name="watchlist" type="submit" value= <?php echo $TVID; ?>> Add to Watchlist </button>
			</form>

			<form method="post" action="watchshow.php">
				<button name="watch" type="submit" value= <?php echo $TVID; ?>> Watch Now </button>
			</form>
			
	<?php
		}
	?>
</body>
</html>