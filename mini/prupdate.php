<?php
session_start();
$host="localhost";
$username="root";
$password="";
$db_name="mini";
$tbl_name="projects";
$conn=new mysqli($host,$username,$password,$db_name)or die("cannot connect");
$select_db=mysqli_select_db($conn,$db_name) or die (mysqli_error($conn));
$ab=$_POST['pid'];
if(isset($_POST['update']))
    {
        $pid=$_POST['pid'];
        $pname=$_POST['pname'];
        $wrk=$_POST['wrk'];
        $con=$_POST['con_id'];
        $res2="UPDATE $tbl_name set pid='$pid',pname='$pname', wrk='$wrk', con_id='$con' where pid='$pid'";
        $result=mysqli_query($conn,$res2) or die (mysqli_error($conn));
        header("Location:disp1.php");
    }
?>

<?php
$ab1=$_POST['pid'];
$res1="select * from $tbl_name where pid='$ab1'";
$result1=mysqli_query($conn,$res1) or die (mysqli_error($conn));
$cn=mysqli_num_rows($result1);
if($cn==false)
    {
        header("Location:dsn1.php");
    }
else
    {
        while($row=mysqli_fetch_array($result1))
        {
            $pid=$row['pid'];
            $pname=$row['pname'];
            $wrk=$row['wrk'];
            $con=$row['con_id'];
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
    <p ALIGN="center">Update The Project Details.</p>
        <br/><br/>
        <form name="form1" method="post" action="">
        <div class="m">    
        
                
                    <label for="pid"><b>PID</b></label>
                    <input type="text" name="pid" value="<?php echo $pid;?>" >
                    <br>                
                
                    <label for="pname"><b>Project name</b></label>
                    <input type ="text" name="pname" value="<?php echo $pname;?>" >
                    <br>
                
                    <label for="wrk"><b>Work Completion</b></label>
                    <input type ="text" name="wrk" value="<?php echo $wrk;?>" >
                    <br>
                
                    <label for="con_id"><b>Contractor CID</b></label>
                    <input type ="text" name="con_id" value="<?php echo $con;?>" >
                    <br>

                    
                    <button name="update" type="submit" class="registerbtn" value="Update">Update</button>
                    </div>
        </form>
        
    </body>
</html>