<?php
include '../config/connection.php';

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM SupportRequests WHERE id=$id";
    $result = mysqli_query($con, $sql);

    if($result){
        header('location: H_display.php');
    } else {
        die(mysqli_error($con));
    }
}
?>
