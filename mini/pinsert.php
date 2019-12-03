<?php
session_start();
$host="localhost";
$username="root";
$password="";
$db_name="mini";
$tbl_name="projects";
$conn=new mysqli($host,$username,$password,$db_name)or die("cannot connect");
$pid=$_POST['pid'];
$pname=$_POST['pname'];
$wrk=$_POST['wrk'];
$con=$_POST['con_id'];
    $q="SELECT pid from projects where pid='$pid'";
    $cq=mysqli_query($conn,$q) or die(mysqli_error($conn));
    $ret=mysqli_num_rows($cq);
    if($ret>=1)
    {
        echo '<script language="javascript">';
		echo 'alert("pid Already exists");';
		echo 'window.location.href="projects.php";';
		echo '</script>';    
    }
    else
    {
        $query="INSERT INTO projects VALUES('$pid','$pname','$wrk','$con')";
        $aa=mysqli_query($conn,$query) or die(mysqli_error($conn));
        $proc="SELECT COUNT(*) FROM projects where con_id=$con";
        $query2="UPDATE contractor set projects=($proc) where con_id=$con";
        mysqli_query($conn,$query2) or die(mysqli_error($conn));
        $ab="UPDATE contractor set pid=$pid where con_id=$con";
        mysqli_query($conn,$ab) or die(mysqli_error($conn));
        echo '<script language="javascript">';
		echo 'alert("Project  sucessfull registrated");';
		echo 'window.location.href="projects.php";';
		echo '</script>';
      
    }

mysqli_close($conn);

?>



