<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Information</title>
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

        form {
            width: 100%;
        }

        label,
        input[type="text"],
        input[type="email"],
        textarea,
        input[type="submit"] {
            display: block;
            margin-bottom: 10px;
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        span.error-message {
            color: red;
            font-size: 14px;
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

        // Define variables and initialize with empty values
        $username = $email = $firstname = $lastname = $phone = $address = "";
        $username_err = $email_err = $firstname_err = $lastname_err = "";

        // Processing form data when form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Validate username
            if (empty(trim($_POST["username"]))) {
                $username_err = "Please enter your username.";
            } else {
                $username = trim($_POST["username"]);
            }

            // Validate email
            if (empty(trim($_POST["email"]))) {
                $email_err = "Please enter an email.";
            } else {
                $email = trim($_POST["email"]);
            }

            // Validate first name
            if (empty(trim($_POST["firstname"]))) {
                $firstname_err = "Please enter your first name.";
            } else {
                $firstname = trim($_POST["firstname"]);
            }

            // Validate last name
            if (empty(trim($_POST["lastname"]))) {
                $lastname_err = "Please enter your last name.";
            } else {
                $lastname = trim($_POST["lastname"]);
            }

            // Phone and Address are optional fields, so no validation is performed

            // Check if there are no errors before updating into database
            if (empty($username_err) && empty($email_err) && empty($firstname_err) && empty($lastname_err)) {
                // Prepare an UPDATE statement
                $sql = "UPDATE Users SET Username = ?, Email = ?, FirstName = ?, LastName = ?, Phone = ?, Address = ? WHERE UserID = ?";

                if ($stmt = $con->prepare($sql)) {
                    // Bind variables to the prepared statement as parameters
                    $stmt->bind_param("ssssssi", $param_username, $param_email, $param_firstname, $param_lastname, $param_phone, $param_address, $_SESSION["UserID"]);

                    // Set parameters
                    $param_username = $username;
                    $param_email = $email;
                    $param_firstname = $firstname;
                    $param_lastname = $lastname;
                    $param_phone = $_POST["phone"]; // Optional field
                    $param_address = $_POST["address"]; // Optional field

                    // Execute the prepared statement
                    if ($stmt->execute()) {
                        // Redirect to display page after successful update
                        header("location: display.php");
                        exit();
                    } else {
                        echo "Something went wrong. Please try again later.";
                    }

                    // Close statement
                    $stmt->close();
                }
            }
        }

        // Fetch the user's current information for pre-filling the form
        $sql = "SELECT Username, Email, FirstName, LastName, Phone, Address FROM Users WHERE UserID = ?";
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
                    $stmt->bind_result($db_username, $db_email, $db_firstname, $db_lastname, $db_phone, $db_address);
                    if ($stmt->fetch()) {
                        // Assign fetched values to variables for pre-filling the form
                        $username = $db_username;
                        $email = $db_email;
                        $firstname = $db_firstname;
                        $lastname = $db_lastname;
                        $phone = $db_phone;
                        $address = $db_address;
                    }
                }
            }

            // Close statement
            $stmt->close();
        }

        // Close connection
        $con->close();
        ?>

        <h2>Update Information</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label>Username:</label>
                <input type="text" name="username" value="<?php echo $username; ?>">
                <span class="error-message"><?php echo $username_err; ?></span>
            </div>
            <div>
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo $email; ?>">
                <span class="error-message"><?php echo $email_err; ?></span>
            </div>
            <div>
                <label>First Name:</label>
                <input type="text" name="firstname" value="<?php echo $firstname; ?>">
                <span class="error-message"><?php echo $firstname_err; ?></span>
            </div>
            <div>
                <label>Last Name:</label>
                <input type="text" name="lastname" value="<?php echo $lastname; ?>">
                <span class="error-message"><?php echo $lastname_err; ?></span>
            </div>
            <div>
                <label>Phone:</label>
                <input type="text" name="phone" value="<?php echo $phone; ?>">
            </div>
            <div>
                <label>Address:</label>
                <textarea name="address"><?php echo $address; ?></textarea>
            </div>
            <div>
                <input type="submit" value="Update">
            </div>
        </form>
    </div>
</body>

</html>
