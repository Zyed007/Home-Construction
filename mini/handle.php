<?php
session_start();
$host="localhost";
$username="root";
$password="";
$db_name="mini";
$tbl_name="contractor";
$conn=new mysqli($host,$username,$password,$db_name)or die("cannot connect");
$select_db=mysqli_select_db($conn,$db_name) or die (mysqli_error($conn));
$ab=$_POST['uname'];
if(isset($_POST['update']))
    {
        $id=$_POST['id'];
        $user=$_POST['uname'];
        $pass=$_POST['psw'];
        $proc=$_POST['Proc'];
        $pno=$_POST['pno'];
        $res2="UPDATE $tbl_name set con_id='$id',Username='$user',Password='$pass',projects='$proc',pno='$pno' where Username='$user'";
        $result=mysqli_query($conn,$res2) or die (mysqli_error($conn));
        header('location:disp.php');
    }
?>

<?php
$ab1=$_POST['uname'];
$res1="select * from $tbl_name where Username='$ab1'";
$result1=mysqli_query($conn,$res1) or die (mysqli_error($conn));
$cn=mysqli_num_rows($result1);
if($cn==false)
    {
        header("Location:dsn.php");
    }
else
    {
        while($row=mysqli_fetch_array($result1))
        {
            $id=$row['con_id'];
            $user=$row['Username'];
            $pass=$row['Password'];
            $proc=$row['projects'];
            $pno=$row['pno'];
        }
    }   
?>

<html>
    <head>
        <title>Update data</title>
        <link rel="stylesheet" type="text/css" href="css/reg.css">
        </head>
    <body>
    <div class="container">
    <h1 ALIGN="center">Update</h1>
    <p ALIGN="center">Update The Contractor Details.</p>
        <br/><br/>
        <form name="form1" method="post" action="">
        <div class="m">    
                <label for="id"><b>Con ID</b></label>
                <input type="text" name="id" value="<?php echo $id;?>" >
                <br>
                <label for="uname" ><b>Contractor Name</b></label>
                    <input type ="text" name="uname" value="<?php echo $user;?>" >
                    <br>
                <label for="psw" ><b>Password</b></label>
                    <input type ="text" name="psw" value="<?php echo $pass;?>" >
                    <br>
                <label for="Proc"><b>Project Completed</b></label>
                    <input type ="text" name="Proc" value="<?php echo $proc;?>" >
                    <br>
                <label for="pno"><b>Contact No</b></label>
                    <input type ="text" name="pno" value="<?php echo $pno;?>" >
                    <br>
                    <button name="update" type="submit" class="registerbtn" value="Update">Update</button>
                    
                
            </table>
        </form>
    </body>
</html>