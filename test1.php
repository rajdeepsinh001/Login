<?php
    session_start();
    
    if($_SESSION['uname']='abc'){
        echo $_SESSION['name'];
        echo '<br><br><a href="lg.php">Logout</a>';
    }
    else{
        echo "<script>alert('Login First')</script>";
    }

?>