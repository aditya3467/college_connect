<?php
include('../config/dbcon.php');
session_start();
if(isset($_POST['register_btn'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone= mysqli_real_escape_string($con, $_POST['phone']);
    $email= mysqli_real_escape_string($con, $_POST['email']);
    $uid = mysqli_real_escape_string($con,$_POST['uid']);
    $password= mysqli_real_escape_string($con, $_POST['password']);
    $cpassword= mysqli_real_escape_string($con, $_POST['cpassword']);


    // check if email is already registered
    $check_email_query = "SELECT email FROM users where email='$email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);
    // check id=f uid already exists
    $check_uid_query = "SELECT uid FROM users where uid='$uid'";
    $check_uid_query_run = mysqli_query($con, $check_uid_query);
    if(mysqli_num_rows($check_email_query_run)>0){
        $_SESSION['message'] = "User already exist from $email";
        header('Location: ../login.php');
    }

    // check if email is already registered
    
    else if(mysqli_num_rows($check_uid_query_run)>0){
        $_SESSION['message'] = "User already exist from UID $uid";
        header('Location: ../login.php');
    }
    else{

    if($password == $cpassword){

        // insert data into the table
        $insert_query = "INSERT INTO users (name,email,uid,phone,password) VALUES ('$name', '$email','$uid','$phone', '$password')";
        $insert_query_run = mysqli_query($con,$insert_query);

        if($insert_query_run){
            $_SESSION['message']= "Registered Succesfully";
            header('Location: ../login.php');
        }
        else{
            $_SESSION['message']= "Something went wrong";
            header('Location: ../register.php');
        }

    }

    else{
        $_SESSION['message'] ="Password donot match";
        header('Location: ../register.php');
    }
}
}


else if(isset($_POST['login_btn'])){
    $user_name = mysqli_real_escape_string($con,$_POST['user_name']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    
    $login_query = "SELECT * FROM users WHERE  email='$user_name' OR uid = '$user_name' AND password='$password'";
    $login_query_run = mysqli_query($con,$login_query);


    if(mysqli_num_rows($login_query_run)>0){
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $useruid = $userdata['uid'];
        $role_as =$userdata['role_as'];
        
        $_SESSION['auth_user']= [
            'name' => $username, 
            'email' => $useremail,
            'uid' => $useruid
        ];

        $_SESSION['role_as'] = $role_as;

        if($role_as==1){
            $_SESSION['message'] = "Welcome ADMIN";
            header('Location: ../admin/index.php');

        }

        else{

        
        $_SESSION['message'] = "Logged in Successfully";
        header('Location: ../index.php');
        }


    }

    else{
        $_SESSION['message'] ="INVAILID CREDENTIAL";
        header('Location: ../login.php');
    }

}
?>