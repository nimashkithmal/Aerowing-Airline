<?php
//connection db
require_once '../config/connection.php';

//chech the delete_ID parameter i the url
if(isset($_GET['delete_ID'])){
    $deleteID = $_GET['delete_ID'];

    $sql = "DELETE FROM new WHERE ID = '$deleteID'";
    if($con->query($sql) === TRUE){
       echo"<script> alert ('user Account Deleted');</script>";
    echo"<script> window.location.href = 'H_read.php';</script> ";
    }else{
        echo"Account deleted Failed";
    }
}else{
    echo"delete id parameter not found";
}
$con->close();

?>