<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    $username= "";
    $pass= "";
    $myDB= mysqli_connect('localhost', 'root', '', 'am-phoenix');
    $error= array();
    // login
    if(isset($_POST['Login'])) {
        $username= strtolower(mysqli_real_escape_string($myDB, $_POST['username']));
        $pass= mysqli_real_escape_string($myDB, $_POST['password']);

        if(empty($username)){
            array_push($error, "You didn't enter your username");
        } elseif(empty($pass)){
            array_push($error, "You didn't enter your password");
        } elseif(count($error)==0){
            $info = "SELECT * FROM admins WHERE username = '$username' AND pass = '$pass'";
            $result = mysqli_query($myDB, $info);
            if(mysqli_num_rows($result)==1){
                $_SESSION['success']= $username;
                header("location: home.php");
            } else{
                array_push($error, "This data doesn't exist!");
            }
        }
    }
?>