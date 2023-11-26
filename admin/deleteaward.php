<?php

include "connection.php";
$id = $_GET['id']; // get id through query string


											

$qry = mysqli_query($conn,"DELETE FROM awards
		where Awards_ID='$id'"); // select query
header("location:viewaward.php");
			

?>