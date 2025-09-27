<?php
include '../config/connection.php';

$errors = []; // Array to store validation errors

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    // Validation
    if(empty($name)){
        $errors[] = "Name is required";
    }
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = "Valid email is required";
    }
    if(empty($category)){
        $errors[] = "Category is required";
    }
    if(empty($message)){
        $errors[] = "Message is required";
    }

    // If there are no validation errors, proceed with database insertion
    if(empty($errors)){
        $sql = "INSERT INTO SupportRequests (name, email, category, message) VALUES ('$name', '$email', '$category', '$message')";
        $result = mysqli_query($con, $sql);

        if($result){
            echo "<script>alert('Form submitted successfully!');</script>";
            header('location: H_display.php');
            exit(); // Make sure to exit after redirection
        } else {
            die(mysqli_error($con));
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Request - Aerowing</title>
    <link rel="icon" type="image/jpeg" href="../assets/images/Logo1.jpg">
    <link rel="shortcut icon" href="../assets/images/Logo1.jpg">
    <link rel="apple-touch-icon" href="../assets/images/Logo1.jpg">
    <link rel="stylesheet" href="H_styles.css">
    <script>
        function showMessage(message) {
            alert(message);
        }
    </script>
</head>
<body>
    <div class="container">
        <div style="text-align: center; margin-bottom: 20px;">
            <img src="../assets/images/Logo1.jpg" alt="Aerowing" style="max-width: 80px; height: auto;">
            <h2>Aerowing Support</h2>
        </div>
        <?php 
        if(!empty($errors)){
            echo '<div class="errors"><ul>';
            foreach($errors as $error){
                echo "<li>$error</li>";
            }
            echo '</ul></div>';
        }
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="showMessage('Form submitted successfully!')">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <option value="">Select category</option>
                <option value="General Inquiry">General Inquiry</option>
                <option value="Feedback">Feedback</option>
                <option value="Support">Support</option>
            </select>

            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>

            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>
