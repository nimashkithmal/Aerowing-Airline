<?php

require_once "../config/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // inputs variable catch asian data
    $name = mysqli_real_escape_string($con, $_POST["kkname"]);
    $email = mysqli_real_escape_string($con, $_POST["kEmail"]);
    $checkindate = mysqli_real_escape_string($con, $_POST["dob"]);
    $checkoutdate = mysqli_real_escape_string($con, $_POST["dobb"]);
    $noofguest = mysqli_real_escape_string($con, $_POST["kNumberofGuests"]);
    $khotel = mysqli_real_escape_string($con, $_POST["khotel"]);

    // db data save
    $sql = "INSERT INTO new (kname, Email, checkingdate, chekoutdate, noofguest, hotel) 
            VALUES ('$name', '$email', '$checkindate', '$checkoutdate', '$noofguest', '$khotel')";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Data Added Successfully')</script>";
        // Redirect to display.php after successful insertion
        echo "<script>window.location.href='H_read.php'</script>";
    } else {
        // Handle any errors during query execution
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    // Close the database connection
    $con->close();
}
?>
