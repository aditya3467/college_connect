<?php
include('config/dbcon.php');

function getAllActive($table){


    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);

}
function getByID($table,$id){


    global $con;
    $query = "SELECT * FROM $table WHERE id= '$id' ";
    return $query_run = mysqli_query($con, $query);

}
function getByStream($table,$stream){


    global $con;
    $query = "SELECT DISTINCT subject FROM $table WHERE stream= '$stream' ";
    return $query_run = mysqli_query($con, $query);

}
function getBySubject($table,$subject){


    global $con;
    $query = "SELECT * FROM $table WHERE subject= '$subject' ";
    return $query_run = mysqli_query($con, $query);

}


function redirect($url,$message){
    $_SESSION['message']= $message;
    header('Location: '.$url);
    exit();
}

?>