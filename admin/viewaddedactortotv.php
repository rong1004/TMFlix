<?php

include "connection.php";
$id = $_GET['id']; // get id through query string

$qry = mysqli_query($conn,"select t.*, a.Actors_Name 
							from actors_tv as t 
							join actors as a 
							on t.Actors_ID= a.Actors_ID 
							where t.TvSeries_ID='$id'"); // select query

?>

<html>
	
<head>
<title>ADMIN-View added Actor to tv</title>
<link rel="stylesheet" href="styles.css">
</head>
	
<body>

<div class="head">
<h2>View Actors</h2>
<p ><a href="viewtvseries.php">return</a></p>
</div>

<div class="BODY" >
<p>TvSeries Actors LIST</p>

<table border="1">
  <tr>
	<td>Opetarion</td>
    <td>TvSeries ID</td>
	<td>Actors ID</td>
	<td>Actors Name</td>

    
    
  </tr>
<?php

while($data = mysqli_fetch_array($qry))
{
?>
  <tr>
	<td><a href="deletetvactor.php?id=<?php echo $data['TvSeries_ID']; ?>&actorid=<?php echo $data['Actors_ID']; ?>">delete </a></td>
    <td><?php echo $data['TvSeries_ID']; ?></td>
    <td><?php echo $data['Actors_ID']; ?></td>
	<td><?php echo $data['Actors_Name']; ?></td>

  </tr>	
<?php
}
?>

</table>

<?php mysqli_close($conn); // Close connection ?>
</div> 

</body>
</html> 









