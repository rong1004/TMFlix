<html>
	
<head>
<title>ADMIN-Genre Type</title>
<link rel="stylesheet" href="styles.css">
</head>
	
<body>

<div class="head">
<h2>TYPE OF GENRE</h2>
<p ><a href="adminmain.php">return</a></p>
</div>

<div class="BODY" >
<p>TYPE OF GENRE</p>

<table border="1">
  <tr>
    <td>Genre No.</td>
    <td>Genre Name</td>
    
  </tr>
<?php

include "connection.php"; // Using database connection file here

$records = mysqli_query($conn,"select * from genre"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
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