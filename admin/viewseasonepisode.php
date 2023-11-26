<html>
	
<head>
<title>ADMIN-View tv's Season and Episode</title>
<link rel="stylesheet" href="styles.css">
</head>
	
<body>

<div class="head">
<h2>TvSeries</h2>
<p ><a href="TVSERIES.php">return</a></p>
</div>

<div class="BODY" >
<p>TvSeries seasons</p>

<table border="1">
  <tr>
	<td>Opetarion</td>
    <td>SEASON ID</td>
	<td>TvSeries ID</td>
	<td>SEASON TITLE</td>

    
    
  </tr>
  
<?php

include "connection.php"; // Using database connection file here

$records = mysqli_query($conn,"select * from seasons"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
	<td><a href="deletetvseason.php?id=<?php echo $data['Seasons_ID']; ?>">delete </a></td>
    <td><?php echo $data['Seasons_ID']; ?></td>
    <td><?php echo $data['TvSeries_ID']; ?></td>
	<td><?php echo $data['Season_Name']; ?></td>

    
  </tr>	
<?php
}
?>

</table>

<?php mysqli_close($conn); // Close connection ?>
</div> 


<div class="BODY" >
<p>TvSeries Seasons Episodes</p>

<table border="1">
  <tr>
	<td>Opetarion</td>
    <td>Episodes ID</td>
	<td>Episodes TITLE</td>
	<td>SEASON ID</td>

    
    
  </tr>
<?php

include "connection.php"; // Using database connection file here

$records = mysqli_query($conn,"select * from episodes"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
	<td><a href="deletetvepisode.php?id=<?php echo $data['Episodes_ID']; ?>">delete </a></td>
    <td><?php echo $data['Episodes_ID']; ?></td>
	<td><?php echo $data['Episodes_Title']; ?></td>
    <td><?php echo $data['Season_ID']; ?></td>

    
  </tr>	
<?php
}
?>

</table>

<?php mysqli_close($conn); // Close connection ?>
</div> 

</body>
</html> 