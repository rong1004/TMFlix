<?php

include "connection.php";

$query = "SELECT * FROM tvseries";

$result1 = mysqli_query($conn, $query);

if(isset($_POST["submit"])){
	
	$sql = "INSERT INTO awards
           (Awards_Title, Awards_Winners, Awards_Nominees, TvSeries_ID)
            VALUES
           ('$_POST[Awards_Title]','$_POST[Awards_Winner]',' $_POST[Awards_Nominees]','$_POST[tvCode]')";

	if (mysqli_query($conn, $sql)) {
			
			echo "New award record created successfully " ;
	} else{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}



?>

<html>
	
<head>
<title>ADMIN-Add Award</title>
<link rel="stylesheet" href="styles.css">
</head>
	
<body>

<div class="head">
<h2>ADD AWARD</h2>
<p ><a href="award.php">return</a></p>
</div>

<div class="BODY" >
<h2>AWARD</h2>
<table border="1", align="center">
  <tr>
    <td align="center">ADD AWARD</td>
  </tr>
  <tr>
    <td>
      <table>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<tr>
          <td>Award TITLE</td>
		  
		
		 
          <td><input type="text" name="Awards_Title" value="" >
          
		  </td>
        </tr>
		<tr>
          <td>Award winner</td>
		  
		
		 
          <td><input type="text" name="Awards_Winner" value="" >
          
		  </td>
        </tr>
		<tr>
          <td>Award Nominees</td>
		  
		
		 
          <td><input type="text" name="Awards_Nominees" value="" >
          
		  </td>
        </tr>        

		<tr>
          <td>TvSeries_Title</td>
          <td>      
			<select name="tvCode">

            <?php while($row1 = mysqli_fetch_array($result1)):;?>
			
            <option  value="<?php echo $row1[0];?>" ><?php echo $row1[1];?></option>

            <?php endwhile;?>
			

			</select>
          </td>
        </tr> 



		

		<tr>
          <td></td>
          <td align="right"><input type="submit" 
          name="submit" value="ADD"></td>
        </tr>
        
        </table>
      </td>
    </tr>
</table>

</div> 

</body>
</html> 









