<?php

include "connection.php";
$id = $_GET['id']; // get id through query string

$qry = mysqli_query($conn,"select t.*, g.Genre_Name from tvseries_genres as t join genre as g on t.Genre_ID= g.Genre_ID where t.TvSeries_ID='$id'"); // select query

?>

<html>
	
<head>
<title>ADMIN-View added Gerne to tv</title>
<link rel="stylesheet" href="styles.css">
</head>
	
<body>

<div class="head">
<h2>View Genre</h2>
<p ><a href="viewtvseries.php">return</a></p>
</div>

<div class="BODY" >
<p>TvSeries genre LIST</p>

<table border="1">
  <tr>
	<td>Opetarion</td>
    <td>TvSeries ID</td>
	<td>Genre id</td>
	<td>Genre Name</td>

    
    
  </tr>
<?php

while($data = mysqli_fetch_array($qry ))
{
?>
  <tr>
	<td><a href="deletegenre.php?id=<?php echo $data['TvSeries_ID']; ?>&genreid=<?php echo $data['Genre_ID']; ?>">delete </a></td>
    <td><?php echo $data['TvSeries_ID']; ?></td>
    <td><?php echo $data['Genre_ID']; ?></td>
	<td><?php echo $data['Genre_Name']; ?></td>

  </tr>	
<?php
}
?>

</table>

<?php mysqli_close($conn); // Close connection ?>
</div> 

</body>
</html> 









