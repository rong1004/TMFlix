<?php

include "connection.php";
$id = $_GET['id']; // get id through query string
$genreid = $_GET['genreid'];								

$qry = mysqli_query($conn,"DELETE FROM tvseries_genres
		where TvSeries_ID='$id' AND Genre_ID='$genreid'"); // select query
header("location:viewtvseries.php");
			

?>