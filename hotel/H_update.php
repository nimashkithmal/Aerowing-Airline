<?php
require_once '../config/connection.php';

if(isset($_GET['ID'])){
    $ID = $_GET['ID'];

    //retri  eve the recode with the given id
    $sql = "SELECT * FROM new WHERE ID = '$ID'";
    $result = $con->query($sql);

    if ($result->num_rows >0){
        $row =$result->fetch_assoc();
        $name =$row['kname'];
        $email =$row['Email'];
        $checkindate =$row['checkingdate'];
        $checkoutdate =$row['chekoutdate'];
        $noofguest =$row['noofguest'];
        $Hotel =$row['hotel'];

        //display the updae

                echo "<form action='H_update_process.php' method='POST'>";
                echo "<input type='hidden' name='ID' value='". $ID ."'>";
                echo "<br><label for='name'>Name:</label>";
                echo "<input type='text' id='fname' name='kkname' value='". $name ."'><br><br>";

                echo "<label for='email'>Email:</label>";
                echo "<input type='email' id='email' name='kEmail' value='". $email ."'><br><br>";

                echo "<label for='date'>Check-in Date:</label>";
                echo "<input type='Date' id='check-in' name='dob' value='". $checkindate ."'><br><br>";

                echo "<label for='date'>Check-out Date:</label>";
                echo "<input type='Date' id='check-out' name='dobb' value='". $checkoutdate ."'><br><br>";

                echo "<label for='guests'>Number of Guests:</label>";
                echo "<input type='number' id='guests' name='kNumberofGuests' min='1' value='". $noofguest ."'><br><br>";

                echo "<label for='Hotel'>Choose the Hotel:</label>";
                echo "<select id='guests' name='khotel' min='1' value='". $Hotel ."'><br><br>";

                echo "<option value='Queen's Hotel'>Queen's Hotel</option>";
                echo "<option value='The Golden Ridge Hotel'>The Golden Ridge Hotel</option>";
                echo "<option value='Mahaweli Reach Hotel'>Mahaweli Reach Hotel</option>";
                echo "<option value='Amaya Lake Hotel Dambulla'>Amaya Lake Hotel Dambulla</option>";
                echo "</select>";
                echo "<button type='submit' name='booknow'>Update</button>";
                echo "</form>";

    }else{
    echo "No record available";
}
}else{
    echo "ID paremeter is mising";
}
?>