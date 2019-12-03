<?php
$host="localhost";
$username="root";
$password="";
$db_name="mini";
$tbl_name="projects";
$conn=new mysqli($host,$username,$password,$db_name)or die("cannot connect");
$select_db=mysqli_select_db($conn,$db_name)or die(mysqli_error($conn));
$sql="SELECT * FROM $tbl_name";
$result=mysqli_query($conn,$sql)or die(mysql_error($conn));
$count=mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Display</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="css/table.scss">
    <table border="1">
    
<tr>    
   <th>PID</th> 
   <th>Project Name </th>
   <th>Work completed</th>
   <th>Cont ID</th>
   </tr>
    
   
   </body>
</html>
<?php if($count>0)
   {
   while($row=mysqli_fetch_assoc($result))
   {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <body>
    <link rel="stylesheet" type="text/css" href="css/table.scss">
    
    <tbody>
	<tr>
    <td>&nbsp;<?php echo $row['pid'];?></td>
	<td>&nbsp;<?php echo $row['pname'];?></td>
	<td>&nbsp;<?php echo $row['wrk'];?></td>
	<td>&nbsp;<?php echo $row['con_id'];?></td>
    </tr>
   </tbody>
   </body>
    </html>
    <?php
    }
	}
	else
	{
	 echo "0 result";
	 }
     mysqli_close($conn);
     ?>
     <div class="button1">
     <a href="projects.php" class="button2" >home</a> 
     </div>