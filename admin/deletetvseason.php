<?php

include "connection.php";
$id = $_GET['id']; // get id through query string


											

$qry = mysqli_query($conn,"DELETE FROM seasons
		where Seasons_ID='$id'"); // select query
header("location:viewseasonepisode.php");
			

?>