<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION["UserID"]) || empty($_SESSION["UserID"])) {
    header("location: login.php");
    exit();
}

// Include the connection file
include 'connection.php';

// Define variable to store delete status
$delete_status = "";

// Processing deletion when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare a DELETE statement
    $sql = "DELETE FROM Users WHERE UserID = ?";

    if ($stmt = $con->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $_SESSION["UserID"]);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Delete successful, so destroy the session and redirect to login page
            session_destroy();
            header("location: login.php");
            exit();
        } else {
            $delete_status = "Error deleting account.";
        }

        // Close statement
        $stmt->close();
    }
}

// Close connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
</head>

<body>
    <h2>Delete Account</h2>
    <p>Are you sure you want to delete your account?</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <input type="submit" value="Yes, Delete My Account">
            <a href="display.php">Cancel</a>
        </div>
    </form>
    <p><?php echo $delete_status; ?></p>
</body>

</html>
