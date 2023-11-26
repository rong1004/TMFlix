<?php

include "connection.php";
$id = $_GET['id']; // get id through query string

$qry = mysqli_query($conn,"select t.*, d.Directors_Name 
							from directors_tv as t 
							join directors as d 
							on t.Directors_ID= d.Directors_ID 
							where t.TvSeries_ID='$id'"); // select query

?>

<html>
	
<head>
<title>ADMIN</title>
<link rel="stylesheet" href="styles.css">
</head>
	
<body>

<div class="head">
<h2>View Director</h2>
<p ><a href="viewtvseries.php">return</a></p>
</div>

<div class="BODY" >
<p>TvSeries Director LIST</p>

<table border="1">
  <tr>
	<td>Opetarion</td>
    <td>TvSeries ID</td>
	<td>Director ID</td>
	<td>Director Name</td>

    
    
  </tr>
<?php

while($data = mysqli_fetch_array($qry))
{
?>
  <tr>
	<td><a href="deletetvdirector.php?id=<?php echo $data['TvSeries_ID']; ?>&directorid=<?php echo $data['Directors_ID']; ?>">delete </a></td>
    <td><?php echo $data['TvSeries_ID']; ?></td>
    <td><?php echo $data['Directors_ID']; ?></td>
	<td><?php echo $data['Directors_Name']; ?></td>

  </tr>	
<?php
}
?>

</table>

<?php mysqli_close($conn); // Close connection ?>
</div> 

</body>
</html> 









