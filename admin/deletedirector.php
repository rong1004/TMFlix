<?php

include "connection.php";
$id = $_GET['id']; // get id through query string


											

$qry = mysqli_query($conn,"DELETE FROM directors
		where Directors_ID='$id'"); // select query
header("location:viewdirector.php");
			

?>