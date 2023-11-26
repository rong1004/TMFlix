<?php
include "../connection.php";
session_start();

$Member_Email = $_SESSION['Member_Email'];
$SQLString1 = "SELECT * FROM Member where Member_Email='$Member_Email'";
$SQLResult1 = mysqli_query($conn,$SQLString1);
$Row = mysqli_fetch_row($SQLResult1);
$ID = $Row[0];
$Email = $Row[3];

$SQLString2 = "SELECT * FROM AccountPlan WHERE Member_ID = $ID";
$SQLResult2 = mysqli_query($conn,$SQLString2);
$Row1 = mysqli_fetch_row($SQLResult2);
$planPrice = $Row1[1];
$paymentmethod = $Row1[4];
$startDate = $Row1[2];
$endDate = $Row1[3];

$receipt = fopen("receipt.txt","w");
$SHOPNAME = "TMFlix";
fwrite($receipt,"*************************************************************************");
fwrite($receipt,"\n\t\t\t\t".$SHOPNAME."\n");
fwrite($receipt,"*************************************************************************");
fwrite($receipt,"\n\n");
fwrite($receipt,"Email: ".$_SESSION['Member_Email']."\n");
fwrite($receipt,"Plan Price: ".$planPrice."\n");
if ($paymentmethod=="FPX") {
	fwrite($receipt,"Payment Method: FPX\n\n");
}
if ($paymentmethod=="Credit Cards") {
	fwrite($receipt,"Payment Method: Credit Cards\n\n");
}
fwrite($receipt,"Start Access Date: ".$startDate."\n");
fwrite($receipt,"End Access Date: ".$endDate."\n");
fwrite($receipt,"*************************************************************************");
fclose($receipt);
rename("receipt.txt","receipt.doc");

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>PaymentSuccess</title>
	</head>
	<body>
		<div>
			<h1>Payment Successful</h1>
			<br/><br/>
				<p>Email:</p>
				<div>
					<?php
						echo $Email;
					?>
				</div>
				<br/><br/>
				<p>Plan Price:</p>
				<div>
					<?php
						echo $planPrice;
					?>
				</div>
				<br/><br/>
				<p>Payment Method:</p>
				<div>
					<?php
						echo $paymentmethod;
					?>
				</div>
				<br/><br/>
				<p>Start Access Date:</p>
				<div>
					<?php
						echo $startDate;
					?>
				</div>
				<br/><br/>
				<p>End Access Date:</p>
				<div>
					<?php
						echo $endDate;
					?>
				</div>
			<br/><br/>
			<input onclick="location.href='receipt.doc';" type="button" value="Print Receipt" style="margin-right: 30px">
			<input onclick="location.href='../index.php';" type="button" value="Home" >
		</div>
	</body>
</html>
