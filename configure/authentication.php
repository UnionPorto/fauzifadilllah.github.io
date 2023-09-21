<?php
    session_start();
    include('connection.php');
    $nama1 = $_POST['Username'];
    $password1 = $_POST['Password'];

    $query1 = mysqli_query($db,"SELECT * FROM login WHERE Username='$nama1' AND Password='$password1'");

    if( mysqli_num_rows($query1)==1 ){
        header("Location: ../page/dashboard.php");
        $user = mysqli_fetch_array($query1);
        $_SESSION['Username'] = $user['Username'];   
        $_SESSION['Level'] = $user['Level'];   
        $_SESSION['id'] = $user['id'];  


    }
    else if($nama == '' || $password == '' || $nama1 == '' || $password1 == '' ){
        header("Location: ../page/login.php?error=2");

    }
    else{
        header("Location: ../page/login.php?error=1");
    }
?>