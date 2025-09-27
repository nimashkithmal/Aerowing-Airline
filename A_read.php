<?php
include 'connection.php';

$sql = "SELECT * FROM Flights";
$result = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List of Flights</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f4f4f4;
    }

    h1 {
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    th, td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    .actions a {
      margin-right: 5px;
      text-decoration: none;
      color: #007bff;
    }

    .actions a:hover {
      text-decoration: underline;
      color: #0056b3;
    }

    .actions a.delete {
      color: #dc3545;
    }

    .actions a.delete:hover {
      color: #bd2130;
    }
  </style>
</head>
<body>
  <h1>List of Flights</h1>
  <?php
  if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Flight ID</th><th>Flight Number</th><th>Departure Airport</th><th>Arrival Airport</th><th>Departure Time</th><th>Arrival Time</th><th>Price</th><th>Actions</th></tr>";
    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["flight_id"] . "</td>";
      echo "<td>" . $row["flight_number"] . "</td>";
      echo "<td>" . $row["departure_airport"] . "</td>";
      echo "<td>" . $row["arrival_airport"] . "</td>";
      echo "<td>" . $row["departure_time"] . "</td>";
      echo "<td>" . $row["arrival_time"] . "</td>";
      echo "<td>" . $row["price"] . "</td>";
      // Add buttons for Update and Delete with links to A_update.php and A_delete.php
      echo "<td><a href='A_update.php?id=" . $row["flight_id"] . "'>Update</a> | <a href='A_delete.php?id=" . $row["flight_id"] . "'>Delete</a></td>";
      echo "</tr>";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }
  $con->close();
  ?>
</body>
</html>
