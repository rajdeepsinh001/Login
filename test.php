<?php
    session_start();
    $con = mysqli_connect("localhost","root","","test")or die("connect error".mysqli_error($con));
    

    if(@$_REQUEST['btn']=='login'){

        $a = $_REQUEST['un'];
        $b = $_REQUEST['ps'];

        //echo $a,$b;

    $res = mysqli_query($con,"select * from session where username='".$a."' and password='".$b."'");
    $rec = mysqli_fetch_array($res);

    if(mysqli_num_rows($res)!=0){
        $_SESSION['uname'] = 'abc';
        $_SESSION['name'] = $rec['firstname'];
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
    <form action="test.php" method="post">
        <input type="text" name="un"><br><br>
        <input type="text" name="ps"><br><br>
        <input type="submit" name="btn" value="login">
    </form>
    <a href="sg.php">SignUp</a>
</body>
</html>