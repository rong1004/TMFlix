<?php

include "connection.php";
$id = $_GET['id']; // get id through query string
$directorid = $_GET['directorid'];								

$qry = mysqli_query($conn,"DELETE FROM directors_tv
		where TvSeries_ID='$id' AND Directors_ID='$directorid'"); // select query
header("location:viewtvseries.php");
			

?>