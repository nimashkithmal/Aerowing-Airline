<?php
include 'connection.php';

$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['diet-plan']) || empty($_POST['health-checkup']) || empty($_POST['feedback'])) {
        $errors[] = "All fields are required.";
    }

    if (empty($errors)) {
        $dietPlanRating = $_POST['diet-plan'];
        $healthCheckupRating = $_POST['health-checkup'];
        $feedbackText = mysqli_real_escape_string($con, $_POST['feedback']);

        $sql = "INSERT INTO `crud` (diet_plan_rating, health_checkup_rating, feedback_text) VALUES ('$dietPlanRating', '$healthCheckupRating', '$feedbackText')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            header('location: F_display.php');
            exit();
        } else {
            $errors[] = "Error inserting data: " . mysqli_error($con);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airline Reservation Feedback</title>
    <link rel="stylesheet" href="F_style.css">
</head>
<body>
    <div class="container">
        <h1>Airline Reservation Check-up Feedback</h1>
        <p>Thank you for using our Airline Reservation system! We value your feedback and would appreciate it if you could take a moment to answer the following questions.</p>
        
        <?php if (!empty($errors)): ?>
            <div class="error-message">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form id="feedback-form" method="post">
            <div class="feedback-question">
                <label for="diet-plan">How satisfied were you with the provided reservation plan?</label>
                <select name="diet-plan" id="diet-plan" required>
                    <option value="">Select satisfaction level</option>
                    <option value="very_satisfied">Very Satisfied</option>
                    <option value="satisfied">Satisfied</option>
                    <option value="neutral">Neutral</option>
                    <option value="dissatisfied">Dissatisfied</option>
                    <option value="very_dissatisfied">Very Dissatisfied</option>
                </select>
            </div>
            <div class="feedback-question">
                <label for="health-checkup">Did the airline booking provide valuable insights?</label>
                <select name="health-checkup" id="health-checkup" required>
                    <option value="">Select option</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                    <option value="unsure">Unsure</option>
                </select>
            </div>
            <div class="feedback-question">
                <label for="feedback">Do you have any additional feedback or suggestions?</label>
                <textarea name="feedback" id="feedback" rows="5" required></textarea>
            </div>
            <button type="submit" name="submit">Submit Feedback</button>
        </form>
    </div>
</body>
</html>

<script>//validation
    document.getElementById("feedback-form").addEventListener("submit", function(event) {
        var dietPlan = document.getElementById("diet-plan").value;
        var healthCheckup = document.getElementById("health-checkup").value;
        var feedbackText = document.getElementById("feedback").value.trim();

        if (dietPlan === "" || healthCheckup === "" || feedbackText === "") {
            alert("Please fill in all fields.");
            event.preventDefault();
        }
    });
</script>
