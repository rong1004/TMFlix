<?php

include "connection.php";

$sqlCount = "SELECT Member_ID, SUM(Watch_Count) AS Watch_Count, TvSeries_ID FROM TvSeries_WatchCount GROUP BY TvSeries_ID ORDER BY Watch_Count DESC LIMIT 5";
	$resultCount = mysqli_query($conn,$sqlCount);

$qry1 = mysqli_query($conn,"select s.*, t.*, g.* 
							from tvseries as s
							join tvseries_genres as t
							on s.TvSeries_ID=t.TvSeries_ID
							join genre as g 
							on t.Genre_ID= g.Genre_ID 
							"); // select query

$qry = mysqli_query($conn,"select s.*, t.*, a.Actors_Name 
							from tvseries as s
							join actors_tv as t
							on s.TvSeries_ID=t.TvSeries_ID
							join actors as a 
							on t.Actors_ID= a.Actors_ID 
							"); // select query

?>

<html>
	
<head>
<title>ADMIN-REPORT</title>
<link rel="stylesheet" href="styles.css">
</head>
	
<body>

<div class="head">
<h2>REPORT</h2>
<p ><a href="adminmain.php">return</a></p>
</div>


<div class="BODY" >
<h2> Top 5 TV Series</h2>
<table border="1">
  <tr>
	
	<td>View Count</td>
	<td>Title</td>
	<td>Duration</td>
	<td>Release</td>
    <td>Country</td>
	<td>Season</td>
	<td>Genre</td>
    <td>Directors</td>
	<td>Actors</td>
	<td>Awards</td>
    
  </tr>
  
<?php
			while($dataCount = mysqli_fetch_array($resultCount)) {
				$TVID = $dataCount['TvSeries_ID'];
				$sqlTv = "SELECT * FROM TvSeries WHERE TvSeries_ID = '$TVID'";
				$resultTv = mysqli_query($conn,$sqlTv);
				$data2 = mysqli_fetch_array($resultTv);
		?>
	<tr>		
			<td><?php echo $dataCount['Watch_Count'];?> </td>
			<td><?php echo $data2['TvSeries_Title'];?></td>
			<td><?php echo $data2['TvSeries_Duration'];?> minutes</td>
			<td><?php echo $data2['Release_Date'];?></td>
			<td><?php echo $data2['TvSeries_Country'];?></td>
			

			<!-- Season -->
			<td>
			<?php
				$sql4 = "SELECT COUNT(*) FROM Seasons WHERE TvSeries_ID = '$TVID'";
				$result4 = mysqli_query($conn,$sql4);
				$data4 = mysqli_fetch_array($result4);
				echo $data4[0];
			?>
			</td>

			<!-- Genre -->
			<td>
			<?php
				$sql3 = "SELECT * FROM TvSeries_Genres JOIN Genre ON TvSeries_Genres.Genre_ID = Genre.Genre_ID
				     	WHERE TvSeries_Genres.TvSeries_ID = '$TVID'";
				$result3 = mysqli_query($conn,$sql3);
				while($data3 = mysqli_fetch_array($result3)) {
					
				echo "-";
					echo $data3['Genre_Name'];
					echo "<br>";
					
				}
			?>
			</td>

			<!-- Director -->
			<td>
			<?php
				$sql5 = "SELECT * FROM Directors_TV JOIN Directors ON Directors_TV.Directors_ID = Directors.Directors_ID
				     	WHERE Directors_TV.TvSeries_ID = '$TVID'";
				$result5 = mysqli_query($conn,$sql5);
				while($data5 = mysqli_fetch_array($result5)) {
					echo "-";
					echo $data5['Directors_Name'];
					echo "<br>";
				}
			?>
			</td>

			<!-- Actor -->
			<td>
			<?php
				$sql6 = "SELECT * FROM Actors_TV JOIN Actors ON Actors_TV.Actors_ID = Actors.Actors_ID
				     	WHERE Actors_TV.TvSeries_ID = '$TVID'";
				$result6 = mysqli_query($conn,$sql6);
				while($data6 = mysqli_fetch_array($result6)) {
					echo "-";
					echo $data6['Actors_Name'];
					echo "<br>";
				}
			?>
			</td>

			<!-- Award -->
			<td>
			<?php
				$sql7 = "SELECT * FROM Awards WHERE TvSeries_ID = '$TVID'";
				$result7 = mysqli_query($conn,$sql7);
				$count = 1;
				while($data7 = mysqli_fetch_array($result7)) {
					echo "-";
					echo $data7['Awards_Title'];
					echo "<br>";
					echo " as ";
					echo $data7['Awards_Winners'];
					$count = $count + 1;
					echo "<br>";
				}
				if ($count == 1) {
					echo " NONE";
				}
			?>
			</td>



			<?php } ?>
</tr>
</table>

</div> 


<div class="BODY" >
<h2>TV series based on genre</h2>

<table border="1">
  <tr>
	<td>Genre ID</td>
	<td>Genre Name</td>
    <td>TvSeries ID</td>
	<td>TvSeries Title</td>
	

    
    
  </tr>
<?php

while($data = mysqli_fetch_array($qry1))
{
?>
  <tr>
	<td><?php echo $data['Genre_ID']; ?></td>
	<td><?php echo $data['Genre_Name']; ?></td>
	<td><?php echo $data['TvSeries_ID']; ?></td>
	<td><?php echo $data['TvSeries_Title']; ?></td>
  </tr>	
<?php
}
?>

</table>


</div> 

<div class="BODY" >
<h2>TV series based on actor</h2>

<table border="1">
  <tr>
	<td>Actors ID</td>
	<td>Actors Name</td>
    <td>TvSeries ID</td>
	<td>TvSeries Title</td>

  </tr>
<?php

while($data = mysqli_fetch_array($qry))
{
?>
  <tr>   
	<td><?php echo $data['Actors_ID']; ?></td>
	<td><?php echo $data['Actors_Name']; ?></td>
	<td><?php echo $data['TvSeries_ID']; ?></td>
	<td><?php echo $data['TvSeries_Title']; ?></td>
 

  </tr>	
<?php
}
?>

</table>


</div> 

</body>
</html> 









