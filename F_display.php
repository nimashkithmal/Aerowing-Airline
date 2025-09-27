<?php include 'connection.php';

?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>All feedback</title>
    <!-- <link rel="stylesheet" href="F_style.css"> -->
    <style>

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #4caf50;
    color: #fff;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.btn a{
  text-decoration: none;
  color: white;

}

.btn1{
  display: inline-block;
    padding: 10px 20px;
    background-color: #c3cfc3;
    color: #fff;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.btn1 a{
  color:black;
  text-decoration: none;

}
.btn2{
  display: inline-block;
    padding: 10px 20px;
    background-color: #ff3300;
    color: #ff3300;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}
.btn2 a{
  color:white;
  text-decoration: none;

}

.btn:hover {
    background-color: grey;
}

table {
  margin-top: 20px;
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 8px;
    text-align: left;
}

th {
    background-color: #c3cfc3;
    color: #201a1a;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

button {
    padding: 5px 10px;
    background-color: #f44336;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    margin-right: 5px;
}

button:hover {
    background-color: grey;
}

      
    </style>

  </head>
  <body>
    <div class="container">
      <button class="btn"><a href="./F_user.php">Add feedback</a></button>

      <table border="1" style="width: 100%;">
        <thead>
          <tr>
          <th>Id</th>
          <th>Diet plan rating</th>
          <th>Health check-up rating</th>
          <th>Feeadback rating</th>
          <th>Operations</th>
          </tr>
        </thead>

        <tbody>
          
          <?php
          
          $sql = "select * from crud";
          $result = mysqli_query($con,$sql);

          if($result){

            while($row = mysqli_fetch_assoc($result)){
              $id = $row['id'];
              $dietPlanRating = $row['diet_plan_rating'];
              $healthCheckupRating = $row['health_checkup_rating'];
              $feedbackText = $row['feedback_text'];

              echo '<tr>
              <th>'.$id.'</th>
              <td>'.$dietPlanRating.'</td>
              <td>'.$healthCheckupRating.'</td>
              <td>'.$feedbackText.'</td>
              <td>
              <button class="btn1"><a href="F_update.php?updateid='.$id.'">Update</a></button>
              <button class="btn2"><a href="F_delete.php?deleteid='.$id.'">Delete</a></button>
              </td>
              </tr>';
            }
          }

        ?>

        </tbody>
      </table>
    </div>
  </body>
</html>
