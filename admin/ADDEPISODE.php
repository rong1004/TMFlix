<?php

include "connection.php";

$query = "SELECT * FROM seasons";

$result1 = mysqli_query($conn, $query);

if(isset($_POST['submit'])) // when click on Update button
{
    $Name = $_POST['EPISODES_Name'];
    $code = $_POST['SCode'];
	
    $sql = "INSERT INTO episodes
           (Episodes_Title, Season_ID)
            VALUES
           ('$Name','$code')";	
     	if (mysqli_query($conn, $sql)) {
			mysqli_close($conn);
			echo "episode added successfully";
			
	} 	
}

?>

<html>
	
<head>
<title>ADMIN-Add Episodes</title>
<link rel="stylesheet" href="styles.css">
</head>
	
<body>

<div class="head">
<h2>ADD EPISODES</h2>
<p ><a href="TVSERIES.php">return</a></p>
</div>

<div class="BODY" >
<h2>EPISODES</h2>
<table border="1", align="center">
  <tr>
    <td align="center">ADD EPISODES</td>
  </tr>
  <tr>
    <td>
      <table>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
				
		<tr>
          <td>TV SERIES</td>
          <td>      
			<select name="SCode">

            <?php while($row1 = mysqli_fetch_array($result1)):;?>
			
            <option  value="<?php echo $row1[0];?>" ><?php echo $row1[1],"-",$row1[2];?></option>

            <?php endwhile;?>
			

			</select>
          </td>
        </tr> 
		
		<tr>
          <td>EPISODES TITLE</td>
		  
          <td><input type="text" name="EPISODES_Name" >
          
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
