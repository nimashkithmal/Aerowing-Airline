<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connection.php'; // Include the corrected connection file

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate flight ID (assuming it should be numeric)
    $flight_id = isset($_POST['flight_id']) ? intval($_POST['flight_id']) : null;
    if ($flight_id === null || $flight_id <= 0) {
        $errors[] = "Flight ID is required and must be a positive number.";
    }

    // Validate flight number (assuming alphanumeric with dashes and spaces allowed)
    $flight_number = trim($_POST['flight_number']);
    if (empty($flight_number)) {
        $errors[] = "Flight number is required.";
    }

    // Validate departure and arrival airports
    $departure_airport = trim($_POST['departure_airport']);
    $arrival_airport = trim($_POST['arrival_airport']);
    if (empty($departure_airport) || empty($arrival_airport)) {
        $errors[] = "Departure and arrival airports are required.";
    }

    // Validate departure and arrival times
    $departure_time = $_POST['departure_time'];
    $arrival_time = $_POST['arrival_time'];
    if (empty($departure_time) || empty($arrival_time)) {
        $errors[] = "Departure and arrival times are required.";
    }

    // Validate price (must be a positive number)
    $price = isset($_POST['price']) ? floatval($_POST['price']) : null;
    if ($price === null || $price <= 0) {
        $errors[] = "Price is required and must be a positive number.";
    }

    // If there are no validation errors, proceed with insertion
    if (empty($errors)) {
        $sql = "INSERT INTO Flights (flight_id, flight_number, departure_airport, arrival_airport, departure_time, arrival_time, price)
            VALUES ($flight_id, '$flight_number', '$departure_airport', '$arrival_airport', '$departure_time', '$arrival_time', $price)";

        if ($con->query($sql) === TRUE) {
            echo "New flight created successfully";
            // Redirect to A_read.php after successful insertion
            header("Location: A_read.php");
            exit();
        } else {
            $errors[] = "Error inserting data: " . $con->error;
        }
    }
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Flight</title>
    <link rel="stylesheet" href="A_flight.css">
</head>
<body class="container">

<h1>Add New Flight</h1>

<?php if (!empty($errors)): ?>
    <div class="error-message">
        <?php foreach ($errors as $error): ?>
            <p><?php echo $error; ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" onsubmit="return validateForm()">
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

    <input type="submit" value="Add Flight">
</form>

<script>
    function validateForm() {
        var flightId = document.getElementById("flight_id").value;
        var flightNumber = document.getElementById("flight_number").value.trim();
        var departureAirport = document.getElementById("departure_airport").value.trim();
        var arrivalAirport = document.getElementById("arrival_airport").value.trim();
        var departureTime = document.getElementById("departure_time").value;
        var arrivalTime = document.getElementById("arrival_time").value;
        var price = document.getElementById("price").value;

        if (flightId <= 0) {
            alert("Flight ID must be a positive number.");
            return false;
        }
        if (flightNumber === "") {
            alert("Flight Number is required.");
            return false;
        }
        if (departureAirport === "" || arrivalAirport === "") {
            alert("Departure and Arrival Airports are required.");
            return false;
        }
        if (departureTime === "" || arrivalTime === "") {
            alert("Departure and Arrival Times are required.");
            return false;
        }
        if (price <= 0) {
            alert("Price must be a positive number.");
            return false;
        }
        return true;
    }
</script>

</body>
</html>
