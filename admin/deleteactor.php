<?php

include "connection.php";
$id = $_GET['id']; // get id through query string


											

$qry = mysqli_query($conn,"DELETE FROM actors
		where Actors_ID='$id'"); // select query
header("location:viewactor.php");
			

?>