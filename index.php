<?php 
	include "connection.php";
	session_start(); 

 	if (!isset($_SESSION['Member_Email'])) {
  		$_SESSION['msg'] = "You must log in first";
  		header('location: user/login.php');
  	}	
  	if (isset($_GET['logout'])) {
  		unset($_SESSION['Member_Email']);
		session_destroy();
  		header("location: user/login.php");
  	}	
	
	$sqlCount = "SELECT Member_ID, SUM(Watch_Count) AS Watch_Count, TvSeries_ID FROM TvSeries_WatchCount GROUP BY TvSeries_ID ORDER BY Watch_Count DESC LIMIT 5";
	$resultCount = mysqli_query($conn,$sqlCount);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
<div>
	<h1>Home Page</h1>
</div>
<div>
<?php  if (isset($_SESSION['Member_Email'])){ ?>
	<?php 
		$MemberEmail = $_SESSION['Member_Email'];
		$sql1 = "SELECT * FROM Member WHERE Member_Email='$MemberEmail'";
		$result1 = mysqli_query($conn,$sql1);
		$row1 = mysqli_fetch_row($result1);
		$memberfname = $row1[1];
		$memberlname = $row1[2];
	?>
    	<p>Welcome <strong><?php echo "$memberfname $memberlname"; ?></strong></p>
	<div>
    		<ul>
			<li> <a href="index.php"> Home </a> </li>
			<li> <a href="user/myaccount.php"> My Account </a> </li>
			<li> <a href="user/watch.php"> Watch </a> </li>
			<li> <a href="user/rate.php"> History </a> </li>
			<li> <a href="user/watchlist.php"> Watchlist </a> </li>
			<li> <a href="index.php?logout='1'" style="color: red;"> Logout </a> </li>
		</ul>
		<hr>
	</div>
	<div>
		<h2> Top 5 Watched TV Series</h2>
		<?php
			while($dataCount = mysqli_fetch_array($resultCount)) {
				$TVID = $dataCount['TvSeries_ID'];
				$sqlTv = "SELECT * FROM TvSeries WHERE TvSeries_ID = '$TVID'";
				$resultTv = mysqli_query($conn,$sqlTv);
				$data2 = mysqli_fetch_array($resultTv);
		?>
			<h3><?php echo $data2['TvSeries_Title'];?></h3>
			<p>Duration: <?php echo $data2['TvSeries_Duration'];?> minutes</p>
			<p>Release: <?php echo $data2['Release_Date'];?></p>
			<p>Country: <?php echo $data2['TvSeries_Country'];?></p>
			<p>View Count: <?php echo $dataCount['Watch_Count'];?> </p>

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

			<form method="post" action="user/viewseasons.php">
				<button name="viewseason" type="submit" value= <?php echo $TVID; ?>> View seasons and episodes </button>
			</form>

			<form method="post" action="user/addtowatchlist.php">
				<button name="watchlist" type="submit" value= <?php echo $TVID; ?>> Add to Watchlist </button>
			</form>

			<form method="post" action="user/watchshow.php">
				<button name="watch" type="submit" value= <?php echo $TVID; ?>> Watch Now </button>
			</form>

			<?php } ?>
	</div>
<?php } ?>	
</div>
		
</body>
</html>