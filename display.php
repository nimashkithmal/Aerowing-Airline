<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        p {
            margin-bottom: 10px;
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        .btn-update {
            background-color: #2196F3;
        }

        .btn-danger {
            background-color: #f44336;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .btn-danger:hover {
            background-color: #e53935;
        }

        .btn-home {
            background-color: #2196F3;
        }
    </style>
</head>

<body>
    <div class="container">
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

        // Get the user's information from the database based on UserID in the session
        $sql = "SELECT UserID, Username, Email, FirstName, LastName, Phone, Address FROM Users WHERE UserID = ?";
        if ($stmt = $con->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("i", $_SESSION["UserID"]);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();

                // Check if the user exists
                if ($stmt->num_rows == 1) {
                    // Bind result variables
                    $stmt->bind_result($UserID, $Username, $Email, $FirstName, $LastName, $Phone, $Address);
                    if ($stmt->fetch()) {
                        // Display user information
                        echo "<h2>User Information</h2>";
                        echo "<p><strong>User ID:</strong> $UserID</p>";
                        echo "<p><strong>Username:</strong> $Username</p>";
                        echo "<p><strong>Email:</strong> $Email</p>";
                        echo "<p><strong>First Name:</strong> $FirstName</p>";
                        echo "<p><strong>Last Name:</strong> $LastName</p>";
                        echo "<p><strong>Phone:</strong> $Phone</p>";
                        echo "<p><strong>Address:</strong> $Address</p>";

                        // Add update and delete buttons
                        echo '<div class="btn-container">';
                        echo '<a href="update.php" class="btn btn-update">Update</a>';
                        echo '<a href="delete.php" class="btn btn-danger">Delete</a>';
                        echo '</div>';

                        // Add the "Back to Home" button
                        echo '<div style="text-align:center; margin-top:20px;">';
                        echo '<a href="Navigation bar.html" class="btn btn-home">Back to Home</a>'; // Assuming index.php is your home page
                        echo '</div>';
                    } else {
                        echo "Error fetching user information.";
                    }
                } else {
                    echo "User not found.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }

        // Close connection
        $con->close();
        ?>
    </div>
</body>

</html>
