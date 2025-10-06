<?php
require_once '../config/connection.php';

$sql = "SELECT * FROM new ";
$result = $con->query($sql);

if($result->num_rows > 0 ){
    while ($row = $result -> fetch_assoc()){
    echo "<br><tr>";
    echo "<td>" .$row["ID"] . "</td>";
    echo "<td>" .$row["kname"] . "</td>";
    echo "<td>" .$row["Email"] . "</td>";
    echo "<td>" .$row["checkingdate"] . "</td>";
    echo "<td>" .$row["chekoutdate"] . "</td>";
    echo "<td>" .$row["noofguest"] . "</td>";
    echo "<td>" .$row["hotel"] . "</td>";
    echo "<td>";
    echo "<button onClick=\"redirectToUpdateForm(". $row["ID"].")\">update</button>";
    echo "<a href=\"H_delete.php?delete_ID=" . $row["ID"] . "\"> Delete</a>";
    echo "<td>";
    echo "<tr><br>";
}
}else{
    echo"no data available";
}
$con->close();

?>