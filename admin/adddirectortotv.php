<?php

include "connection.php";
$id = $_GET['id']; // get id through query string

$qry = mysqli_query($conn,"select * from tvseries where TvSeries_ID='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data
$query = "SELECT * FROM directors";

$result1 = mysqli_query($conn, $query);

if(isset($_POST['submit'])) // when click on add button
{
    $TVID = $_POST['TvSeries_ID'];
    $code = $_POST['DirectorsCode'];
	
    $sql = "INSERT INTO directors_tv
           (Directors_ID, TvSeries_ID)
            VALUES
           ('$code','$TVID')";	
     	if (mysqli_query($conn, $sql)) {
			mysqli_close($conn);
			header("location:viewtvseries.php");
			
	} 	
}

?>

<html>
	
<head>
<title>ADMIN-Add Director to tv</title>
<link rel="stylesheet" href="styles.css">
</head>
	
<body>

<div class="head">
<h2>ADD Directors</h2>
<p ><a href="viewtvseries.php">return</a></p>
</div>

<div class="BODY" >
<h2>Directors</h2>
<table border="1", align="center">
  <tr>
    <td align="center">ADD Directors</td>
  </tr>
  <tr>
    <td>
      <table>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
 <tr>
          <td>TITLE</td>
		  
		
		 
          <td><input type="text" name="TvSeries_ID" value="<?php echo $data['TvSeries_ID'] ?>" placeholder="TvSeries_ID" Required>
          
		  </td>
        </tr>
        

		<tr>
          <td>Directors</td>
          <td>      
			<select name="DirectorsCode">

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









