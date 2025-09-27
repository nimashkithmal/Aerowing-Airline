<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $flight_id = $_POST['flight_id'];

  $sql = "DELETE FROM Flights WHERE flight_id=$flight_id";

  if ($con->query($sql) === TRUE) {
    echo "Flight deleted successfully";
  } else {
    echo "Error deleting flight: " . $con->error;
  }
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Flight</title>
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
    input[type="number"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      box-sizing: border-box;
    }
    input[type="submit"] {
      background-color: #f44336;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #d32f2f;
    }
  </style>
</head>
<body>
  <h1>Delete Flight</h1>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <label for="flight_id">Flight ID:</label>
    <input type="number" id="flight_id" name="flight_id" required><br>
    
    <input type="submit" value="Delete Flight">
  </form>
</body>
</html>
