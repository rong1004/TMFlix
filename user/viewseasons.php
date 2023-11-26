<?php 
	include "../connection.php";
	session_start(); 
	$Member_Email = $_SESSION['Member_Email'];
	$sql1 = "SELECT * FROM Member WHERE Member_Email='$Member_Email'";
	$result1 = mysqli_query($conn,$sql1);
	$row1 = mysqli_fetch_row($result1);
	$Member_ID = $row1[0];
	
	foreach ($_POST as $key => $value) {
		$sql3 = "SELECT * FROM Seasons WHERE TvSeries_ID = '$value'";
		$result3 = mysqli_query($conn,$sql3);	
	}

	$sql2 = "SELECT * FROM TvSeries WHERE TvSeries_ID = '$value'";
	$result2 = mysqli_query($conn,$sql2);
	$data2 = mysqli_fetch_array($result2);
?>

<!DOCTYPE html>
<html>
<head> 
	<title>Seasons</title>
</head>
<body>
	<h1>List of Seasons and Episodes</h1>
	<a href="watch.php"> Return to TV lists </a>
	<br/>
	<a href="../index.php"> Return to Home Page </a>
	<br/>
	<br/>
	<hr>
	<h2><?php echo $data2['TvSeries_Title'];?></h2>
	<?php
		while($data3 = mysqli_fetch_array($result3)) {	
	?>
			<h3><?php echo $data3['Season_Name'];?></h3>
			<?php
			$seasonID = $data3['Seasons_ID'];
			$sql4 = "SELECT * FROM Episodes WHERE Season_ID = '$seasonID'";
			$result4 = mysqli_query($conn, $sql4);
			while ($data4 = mysqli_fetch_array($result4)) {
			?>
				<p><?php echo $data4['Episodes_Title']?></p>
			<?php 
				} 
			?>
	<?php
		}
	?>	
</body>
</html>