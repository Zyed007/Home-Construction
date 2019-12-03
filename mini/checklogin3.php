<?php
session_start();
$host="localhost";
$username="root";
$password="";
$db_name="mini";
$tbl_name="customer";
$conn=new mysqli($host,$username,$password,$db_name)or die("cannot connect");
if(isset($_POST['uname']) && isset($_POST['psw']))
{
	$user=$_POST['uname'];
	$password=$_POST['psw'];
	$ab="SELECT * FROM customer WHERE username='$user' and password='$password'";
	$result=mysqli_query($conn,$ab) or die(mysqli_error($conn));
	$cnt=mysqli_num_rows($result);
	if($cnt == true)
	{ 
		$_SESSION['uname']=$user;
		header('Location:cus.php');
		}
		else 
		{
		echo '<script language="javascript">';
		echo 'alert("Wrong Credentials Entered");';
		echo 'window.location.href="customer.html";';
		echo '</script>';
		}
		}
		ob_end_flush(); 
		?> 