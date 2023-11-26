<html>
	
<head>
<title>ADMIN-VIEWTVseries</title>
<link rel="stylesheet" href="styles.css">
</head>
	
<body>

<div class="head">
	<h2>TvSeries</h2>
	<p><a href="TVSERIES.php">return</a></p>
</div>

<div class="BODY" >
	<p>TvSeries LIST</p>

<table border="1">
  <tr>
	<td>Opetarion</td>
    <td>TvSeries ID</td>
	<td>TvSeries TITLE</td>
	<td>TvSeries Duration</td>
	<td>Release Date</td>
	<td>TvSeries Country</td>
	<td>genre</td>
	<td>actor</td>
	<td>director</td> 
  </tr>
  
<?php

include "connection.php"; // Using database connection file here

$records = mysqli_query($conn,"select * from tvseries"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>

  <tr>
     <td><a href="deletetvseries.php?id=<?php echo $data['TvSeries_ID']; ?>">delete </a>
		<a href="edittvseries.php?id=<?php echo $data['TvSeries_ID']; ?>">edit</a></td>
    <td><?php echo $data['TvSeries_ID']; ?></td>
    <td><?php echo $data['TvSeries_Title']; ?></td>
	<td><?php echo $data['TvSeries_Duration']; ?></td>
	<td><?php echo $data['Release_Date']; ?></td>
	<td><?php echo $data['TvSeries_Country']; ?></td>
    <td><a href="addgenretotv.php?id=<?php echo $data['TvSeries_ID']; ?>">Add </a>
		<a href="viewaddedgenretotv.php?id=<?php echo $data['TvSeries_ID']; ?>">view</a></td>
	<td><a href="addactortotv.php?id=<?php echo $data['TvSeries_ID']; ?>">Add </a>
		<a href="viewaddedactortotv.php?id=<?php echo $data['TvSeries_ID']; ?>">view</a></td>
	<td><a href="adddirectortotv.php?id=<?php echo $data['TvSeries_ID']; ?>">Add </a>
		<a href="viewaddeddirectortotv.php?id=<?php echo $data['TvSeries_ID']; ?>">view</a></td>
  </tr>	
  
<?php
}
?>

</table>

<?php mysqli_close($conn); // Close connection ?>
</div> 




</body>
</html> 