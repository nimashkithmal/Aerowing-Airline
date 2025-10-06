<?php
//db connection
require_once '../config/connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ID = $_POST['ID'];
    $name = $_POST["kkname"];
    $email = $_POST["kEmail"];
    $checkindate = $_POST["dob"];
    $checkoutdate = $_POST["dobb"];
    $noofguest = $_POST["kNumberofGuests"];
    $Hotel = $_POST["khotel"]; 

    //update data in the db
    // $sql = "UPDATE new SET kname='$name' ,Email='$email',
    //  checkingdate='$checkindate' , chekoutdate='$checkoutdate' ,
    //   noofguest='$noofguest' ,  hotel='$Hotel'
    //   WHERE ID = '$ID'";

$sql="UPDATE `new` SET `kname`='$name',`Email`='$email'
,`checkingdate`='$checkindate',`chekoutdate`='$checkoutdate',`noofguest`='$noofguest',`hotel`= '$Hotel'
WHERE `ID`='$ID'";

      //check if update was successful

      if($con->query($sql) === TRUE){
        echo "<script>alert('user details updated successfully');</script>";
        // Assuming dashboardbackend.php is in the same directory:
        echo "<script>window.location.href='H_read.php';</script>";
        // OR (if in backend/ subdirectory):
        // echo "<script>window.location.href='backend/dashboardbackend.php'</script>";
      }
    
}
$con->close();
?>