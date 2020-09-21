<?php
session_start();
$con = mysqli_connect("localhost","root","","test")or die("connect_error".mysqli_error($con));

if(@$_REQUEST['btn']=='SignUp'){

        $fn = $_REQUEST['fn'];
        $un = $_REQUEST['un'];
        $ps = $_REQUEST['ps'];

        // echo $fn,$un,$ps;

        mysqli_query($con,"insert into session set firstname='$fn',username='$un',password='$ps'");

        $res = mysqli_query($con,"select * from session where username='".$un."' and password='".$ps."'");
        $rec = mysqli_fetch_array($res);
        
        if(mysqli_num_rows($res)>0){
            $_SESSION['uname']='abc';
            $_SESSION['name']=$rec['firstname'];
            header('location:test1.php');
        }
        else{
            echo "<script>alert('Invalid')</script>";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="sg.php" method="post">
        <input type="text" name="fn" placeholder="Name"><br><br>
        <input type="text" name="un" placeholder="Username"><br><br>
        <input type="password" name="ps" placeholder="Password"><br><br>
        <input type="submit" name="btn" value="Signup">
    </form>
</body>
</html>