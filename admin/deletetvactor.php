<?php

include "connection.php";
$id = $_GET['id']; // get id through query string
$actorid = $_GET['actorid'];								

$qry = mysqli_query($conn,"DELETE FROM actors_tv
		where TvSeries_ID='$id' AND Actors_ID='$actorid'"); // select query
header("location:viewtvseries.php");
			

?>