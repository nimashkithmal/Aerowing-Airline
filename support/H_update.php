<?php
include '../config/connection.php';

if(isset($_GET['updateid'])) {
    $id = $_GET['updateid'];
    $sql = "SELECT * FROM SupportRequests WHERE id=?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $name = $row['name'];
        $email = $row['email'];
        $category = $row['category'];
        $message = $row['message'];
    } else {
        die("Invalid ID");
    }

    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $category = mysqli_real_escape_string($con, $_POST['category']);
        $message = mysqli_real_escape_string($con, $_POST['message']);

        $sql = "UPDATE SupportRequests SET name=?, email=?, category=?, message=? WHERE id=?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi", $name, $email, $category, $message, $id);
        $result = mysqli_stmt_execute($stmt);

        if($result){
            // Redirect to display.php after updating
            header('location: H_display.php');
            exit();
        } else {
            $error_message = "Error: " . mysqli_error($con);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Help Request - Aerowing</title>
    <link rel="icon" type="image/jpeg" href="../assets/images/Logo1.jpg">
    <link rel="shortcut icon" href="../assets/images/Logo1.jpg">
    <link rel="apple-touch-icon" href="../assets/images/Logo1.jpg">
    <link rel="stylesheet" href="helpupdate.css">
</head>
<body>
    <div class="container">
        <h1>Update Help Request</h1>
        <?php if(isset($error_message)) echo "<p>$error_message</p>"; ?>
        <form id="help-request-form" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php if(isset($name)) echo $name; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php if(isset($email)) echo $email; ?>" required>

            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <option value="General Inquiry" <?php if(isset($category) && $category == 'General Inquiry') echo 'selected'; ?>>General Inquiry</option>
                <option value="Feedback" <?php if(isset($category) && $category == 'Feedback') echo 'selected'; ?>>Feedback</option>
                <option value="Support" <?php if(isset($category) && $category == 'Support') echo 'selected'; ?>>Support</option>
            </select>

            <label for="message">Message:</label>
            <textarea id="message" name="message" required><?php if(isset($message)) echo $message; ?></textarea>

            <button type="submit" name="submit">Update</button>
        </form>
    </div>
</body>
</html>
