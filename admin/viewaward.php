<html>
	
<head>
<title>ADMIN-view award</title>

<link rel="stylesheet" href="styles.css">

</head>
	
<body>

<div class="head">
<h2>AWARD</h2>
<p ><a href="award.php">return</a></p>
</div>

<div class="BODY" >
<p>AWARD LIST</p>

<table border="1">
  <tr>
	<td>Opetarion</td>
    <td>AWARD ID</td>
	<td>AWARD TITLE</td>
	<td>AWARD WINNER</td>
	<td>AWARD NOMINEES</td>
	<td>TvSeries ID</td>
    
    
  </tr>
<?php

include "connection.php"; // Using database connection file here

$records = mysqli_query($conn,"select * from awards"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
	<td><a href="deleteaward.php?id=<?php echo $data['Awards_ID']; ?>">delete </a>
		<a href="editaward.php?id=<?php echo $data['Awards_ID']; ?>">edit </a></td>
    <td><?php echo $data['Awards_ID']; ?></td>
    <td><?php echo $data['Awards_Title']; ?></td>
	<td><?php echo $data['Awards_Winners']; ?></td>
    <td><?php echo $data['Awards_Nominees']; ?></td>
	<td><?php echo $data['TvSeries_ID']; ?></td>
    
  </tr>	
<?php
}
?>

</table>

<?php mysqli_close($conn); // Close connection ?>
</div> 




</body>
</html> 