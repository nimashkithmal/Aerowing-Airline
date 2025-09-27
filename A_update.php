<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $flight_id = $_POST['flight_id'];
  $flight_number = $_POST['flight_number'];
  $departure_airport = $_POST['departure_airport'];
  $arrival_airport = $_POST['arrival_airport'];
  $departure_time = $_POST['departure_time'];
  $arrival_time = $_POST['arrival_time'];
  $price = $_POST['price'];

  $sql = "UPDATE Flights SET 
    flight_number='$flight_number', 
    departure_airport='$departure_airport', 
    arrival_airport='$arrival_airport', 
    departure_time='$departure_time', 
    arrival_time='$arrival_time', 
    price=$price 
    WHERE flight_id=$flight_id";

  if ($con->query($sql) === TRUE) {
    echo "Flight updated successfully";
   
    
  } else {
    echo "Error updating flight: " . $con->error;
  }
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Flight</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }
    h1 {
      margin-bottom: 20px;
    }
    form {
      max-width: 500px;
      margin: auto;
    }
    label {
      display: block;
      margin-bottom: 5px;
    }
    input[type="number"],
    input[type="text"],
    input[type="datetime-local"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      box-sizing: border-box;
    }
    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <h1>Update Flight</h1>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <label for="flight_id">Flight ID:</label>
    <input type="number" id="flight_id" name="flight_id" required><br>
    
    <label for="flight_number">Flight Number:</label>
    <input type="text" id="flight_number" name="flight_number" required><br>
    
    <label for="departure_airport">Departure Airport:</label>
    <input type="text" id="departure_airport" name="departure_airport" required><br>
    
    <label for="arrival_airport">Arrival Airport:</label>
    <input type="text" id="arrival_airport" name="arrival_airport" required><br>
    
    <label for="departure_time">Departure Time:</label>
    <input type="datetime-local" id="departure_time" name="departure_time" required><br>
    
    <label for="arrival_time">Arrival Time:</label>
    <input type="datetime-local" id="arrival_time" name="arrival_time" required><br>
    
    <label for="price">Price:</label>
    <input type="number" id="price" name="price" step="0.01" required><br>
    
    <input type="submit" value="Update Flight">
  </form>
</body>
</html>
