<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Payment Method</title>
</head>
<body>

<header>
	<h2>TMFlix</h2>
</header>

<div>
  	<h2>Payment</h2>
</div>
	
	<form method="post" action="paymentmethod.php">
		<?php include('errors.php'); ?>
		<div>
			<label>Plan Price:</label>
			<br>
			<input type="radio" name="planPrice"  value="RM17/MONTHLY (One device viewing)">
				<label for="rm17">RM17/MONTHLY (One device viewing)</label>
			<input type="radio" name="planPrice"  value="RM39/MONTHLY (Multiple devices viewing)" >
				<label for="rm39">RM39/MONTHLY (Multiple devices viewing)</label>
		</div>
		<br>
		<div>
			<label>Start Date:</label>
				<?php
					$startdate = date("Y-m-d");
					echo date("Y-m-d"). "<br>" ;
				?>
		</div>
		<br>
		<div>
			<label>End Date:</label>
				<?php
					$enddate=strtotime("+1 Months");
					echo date("Y-m-d", $enddate). "<br>";
				?>	
		</div>
		<br>
		<div>
			<label>Payment Method:</label>
			<input type="radio" name="paymentmethod"  value="FPX">
				<label for="fpx">FPX</label>
			<input type="radio" name="paymentmethod"  value="Credit Cards" >
				<label for="creditcard">Credit Card</label>
		</div>
		<br>
		<div>
			<button type="submit" onclick="myFunction()" name="Proceed" style="margin-right: 30px">Proceed</button><button type="submit" onclick="myFunction1()" name="Cancel">Cancel</button>
			<script>
			function myFunction() {
				alert("Payment Successful!");
			}
			</script>
			<script>
			function myFunction1() {
				alert("Payment failed!");
			}
			</script>
		</div>
	</form>
	
</body>
</html>