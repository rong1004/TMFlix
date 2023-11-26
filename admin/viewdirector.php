

<html>
	
<head>
<title>ADMIN-VIEW DIRECTOR INFO</title>
<link rel="stylesheet" href="styles.css">
</head>
	
<body>

<div class="head">
<h2>DIRECTOR</h2>
<p ><a href="director.php">return</a></p>
</div>

<div class="BODY" >
<p>DIRECTOR LIST</p>

<table border="1">
  <tr>
	<td>Opetarion</td>
    <td>DIRECTOR ID</td>
	<td>DIRECTOR NAME</td>
	<td>DIRECTOR GENDER</td>
	<td>DIRECTOR BIRTHDAY</td>
	<td>DIRECTOR COUNTRY</td>
    
    
  </tr>
<?php

include "connection.php"; // Using database connection file here

$records = mysqli_query($conn,"select * from directors"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
  	<td><a href="deletedirector.php?id=<?php echo $data['Directors_ID']; ?>">delete </a>
		<a href="editdirector.php?id=<?php echo $data['Directors_ID']; ?>">edit </a></td>
    <td><?php echo $data['Directors_ID']; ?></td>
    <td><?php echo $data['Directors_Name']; ?></td>
	<td><?php echo $data['Directors_Gender']; ?></td>
    <td><?php echo $data['Directors_Birthday']; ?></td>
	<td><?php echo $data['Directors_Country']; ?></td>
    
  </tr>	
<?php
}
?>

</table>

<?php mysqli_close($conn); // Close connection ?>
</div> 




</body>
</html> 