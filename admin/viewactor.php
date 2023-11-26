<html>
	
<head>
<title>ADMIN-View Actor</title>
<link rel="stylesheet" href="styles.css">
</head>
	
<body>

<div class="head">
<h2>ACTOR</h2>
<p ><a href="actor.php">return</a></p>
</div>

<div class="BODY" >
<p>ACTOR LIST</p>

<table border="1">
  <tr>
	<td>Opetarion</td>
    <td>ACTOR ID</td>
	<td>ACTOR NAME</td>
	<td>ACTOR GENDER</td>
	<td>ACTOR BIRTHDAY</td>
	<td>ACTOR COUNTRY</td>
    
    
  </tr>
<?php

include "connection.php"; // Using database connection file here

$records = mysqli_query($conn,"select * from actors"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
	<td><a href="deleteactor.php?id=<?php echo $data['Actors_ID']; ?>">delete </a>
		<a href="editactor.php?id=<?php echo $data['Actors_ID']; ?>">edit </a></td>
    <td><?php echo $data['Actors_ID']; ?></td>
    <td><?php echo $data['Actors_Name']; ?></td>
	<td><?php echo $data['Actors_Gender']; ?></td>
    <td><?php echo $data['Actors_Birthday']; ?></td>
	<td><?php echo $data['Actors_Country']; ?></td>
    
  </tr>	
<?php
}
?>

</table>

<?php mysqli_close($conn); // Close connection ?>
</div> 




</body>
</html> 