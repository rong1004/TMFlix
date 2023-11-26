<?php

include "connection.php";
$id = $_GET['id'];

$qry = mysqli_query($conn,"select * from awards where Awards_ID='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data


if(isset($_POST['submit'])){
		
		
     	if (mysqli_query($conn, "update awards set Awards_Title = '$_POST[Awards_Title]', Awards_Winners = '$_POST[Awards_Winner]', Awards_Nominees = '$_POST[Awards_Nominees]' where Awards_ID='$_POST[Awards_ID]'")){
			mysqli_close($conn);
			header("location:viewaward.php");
			
	} 
}

?>

<html>
	
<head>
<title>ADMIN-Edit award</title>
<link rel="stylesheet" href="styles.css">
</head>
	
<body>

<div class="head">
<h2>UPDATE AWARD</h2>
<p ><a href="viewaward.php">return</a></p>
</div>

<div class="BODY" >
<h2>AWARD</h2>
<table border="1", align="center">
  <tr>
    <td align="center">UPDATE AWARD</td>
  </tr>
  <tr>
    <td>
      <table>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<tr>
          <td>Award ID</td>
		 
          <td><input type="text" name="Awards_ID" value="<?php echo $data['Awards_ID']; ?>" >
          
		  </td>
        </tr>
		<tr>
          <td>Award TITLE</td>
		 
          <td><input type="text" name="Awards_Title" value="<?php echo $data['Awards_Title']; ?>" >
          
		  </td>
        </tr>
		<tr>
          <td>Award winner</td>
		  
		
		 
          <td><input type="text" name="Awards_Winner" value="<?php echo $data['Awards_Winners']; ?>" >
          
		  </td>
        </tr>
		<tr>
          <td>Award Nominees</td>
		  
		
		 
          <td><input type="text" name="Awards_Nominees" value="<?php echo $data['Awards_Nominees']; ?>" >
          
		  </td>
        </tr>        

		<tr>
          <td></td>
          <td align="right"><input type="submit" 
          name="submit" value="UPDATE"></td>
        </tr>
        
        </table>
      </td>
    </tr>
</table>

</div> 

</body>
</html> 









