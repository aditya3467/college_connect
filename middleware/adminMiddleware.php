<?php
include('../functions/myfunctions.php');
// session_start();

if(isset($_SESSION['auth'])){


    if($_SESSION['role_as']!=1){
        redirect("../index.php", " You are not authorised to access this page");
        // header('Location: ../login.php');
        exit();
        
       }
}

else{
    redirect("../login.php", " Login to continue");   
    // header('Location: ../login.php');
    // echo "<script> window.location.href= '../login.php' </script>";
    exit();
}

?>

