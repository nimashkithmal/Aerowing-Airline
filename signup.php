<?php
// Include the connection file
include 'connection.php';

// Define variables and initialize with empty values
$username = $password = $email = $firstname = $lastname = $phone = $address = "";
$username_err = $password_err = $email_err = $firstname_err = $lastname_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } else {
        $password = trim($_POST["password"]);
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

    // Check if there are no errors before inserting into database
    if (empty($username_err) && empty($password_err) && empty($email_err) && empty($firstname_err) && empty($lastname_err)) {
        // Prepare an INSERT statement
        $sql = "INSERT INTO Users (Username, Password, Email, FirstName, LastName, Phone, Address) VALUES (?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $con->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssssss", $param_username, $param_password, $param_email, $param_firstname, $param_lastname, $param_phone, $param_address);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password for security
            $param_email = $email;
            $param_firstname = $firstname;
            $param_lastname = $lastname;
            $param_phone = $_POST["phone"]; // Optional field
            $param_address = $_POST["address"]; // Optional field

            // Execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to login page after successful registration
                header("location: login.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
        }

        .login-link a {
            color: #007bff;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label>Username:</label>
                <input type="text" name="username" value="<?php echo $username; ?>">
                <span class="error-message"><?php echo $username_err; ?></span>
            </div>
            <div>
                <label>Password:</label>
                <input type="password" name="password" value="<?php echo $password; ?>">
                <span class="error-message"><?php echo $password_err; ?></span>
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
                <input type="submit" value="Sign Up">
            </div>
            <p class="login-link">Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>
</body>

</html>
