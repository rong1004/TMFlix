<?php

include "connection.php";

$query = "SELECT * FROM tvseries";

$result1 = mysqli_query($conn, $query);

if(isset($_POST['submit'])) // when click on Update button
{
    $Name = $_POST['Season_Name'];
    $code = $_POST['TVCode'];
	
    $sql = "INSERT INTO seasons
           (TvSeries_ID, Season_Name)
            VALUES
           ('$code','$Name')";	
     	if (mysqli_query($conn, $sql)) {
			mysqli_close($conn);
			echo "season added successfully";
			
	} 	
}

?>

<html>
	
<head>
<title>ADMIN-Add Season</title>
<link rel="stylesheet" href="styles.css">
</head>
	
<body>

<div class="head">
<h2>ADD SEASONS </h2>
<p ><a href="TVSERIES.php">return</a></p>
</div>

<div class="BODY" >
<h2>SEASONS</h2>
<table border="1", align="center">
  <tr>
    <td align="center">ADD SEASONS</td>
  </tr>
  <tr>
    <td>
      <table>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
				
		<tr>
          <td>TV SERIES</td>
          <td>      
			<select name="TVCode">

            <?php while($row1 = mysqli_fetch_array($result1)):;?>
			
            <option  value="<?php echo $row1[0];?>" ><?php echo $row1[1];?></option>

            <?php endwhile;?>
			

			</select>
          </td>
        </tr> 
		
		<tr>
          <td>SEASON TITLE</td>
		  
          <td><input type="text" name="Season_Name" >
          
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
