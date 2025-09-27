<?php

   include 'connection.php';
   $id = $_GET['updateid'];
   $sql = "select * from crud where id=$id";
   $result = mysqli_query($con,$sql);
   $row = mysqli_fetch_assoc($result);
   $dietPlanRating = $row['diet_plan_rating'];
   $healthCheckupRating = $row['health_checkup_rating'];
   $feedbackText = $row['feedback_text'];

   if(isset($_POST['submit'])){

    $dietPlanRating = $_POST['diet-plan'];
    $healthCheckupRating = $_POST['health-checkup'];
    $feedbackText = $_POST['feedback'];

    $sql = "UPDATE crud SET id=$id,diet_plan_rating='$dietPlanRating', health_checkup_rating='$healthCheckupRating', feedback_text='$feedbackText' WHERE id=$id";

    $result = mysqli_query($con,$sql);

    if($result){

        echo "Data updated succsessfully";
        //header('location:F_display.php');
    } else {

        die(mysqli_error($con));
    }
   }

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diet Plan & Health Check-up Feedback</title>
    <link rel="stylesheet" href="F_style.css">
</head>
<body>
    <div class="container">
        <h1>Diet Plan & Health Check-up Feedback</h1>
        <p>Thank you for using our diet plan and health check-up system! We value your feedback and would appreciate it if you could take a moment to answer the following questions.</p>
        <form id="feedback-form"  method="post">
            <div class="feedback-question">
                <label for="diet-plan">How satisfied were you with the provided diet plan?</label>
                <select name="diet-plan" id="diet-plan">
                    <option value="very_satisfied" <?php if($dietPlanRating == 'very_satisfied') echo 'selected'; ?>>Very Satisfied</option>
                    <option value="satisfied" <?php if($dietPlanRating == 'satisfied') echo 'selected'; ?>>Satisfied</option>
                    <option value="neutral" <?php if($dietPlanRating == 'neutral') echo 'selected'; ?>>Neutral</option>
                    <option value="dissatisfied" <?php if($dietPlanRating == 'dissatisfied') echo 'selected'; ?>>Dissatisfied</option>
                    <option value="very_dissatisfied" <?php if($dietPlanRating == 'very_dissatisfied') echo 'selected'; ?>>Very Dissatisfied</option>
                </select>
            </div>
            <div class="feedback-question">
                <label for="health-checkup">Did the health check-up provide valuable insights?</label>
                <select name="health-checkup" id="health-checkup">
                    <option value="yes" <?php if($healthCheckupRating == 'yes') echo 'selected'; ?>>Yes</option>
                    <option value="no" <?php if($healthCheckupRating == 'no') echo 'selected'; ?>>No</option>
                    <option value="unsure" <?php if($healthCheckupRating == 'unsure') echo 'selected'; ?>>Unsure</option>
                </select>
            </div>
            <div class="feedback-question">
                <label for="feedback">Do you have any additional feedback or suggestions?</label>
                <textarea name="feedback" id="feedback"><?php echo $feedbackText; ?></textarea>
            </div>
            <button type="submit" name="submit">Update</button>
        </form>
        
 <a href="Navigation bar.html" class="btn btn-home">Back to Home</a>'; 
 
    </div>
</body>
</html>