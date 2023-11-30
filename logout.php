<?php
// ob_start();
session_start();
if(isset($_SESSION['auth'])){
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);
    $_SESSION['message']= "Logged out Succesfully";

}
session_destroy();

header('Location: index.php');
// ob_end_flush();
?>
