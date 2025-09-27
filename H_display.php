<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Support Requests</title>
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            text-align: center; /* Center align content */
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

        .update-button {
            padding: 5px 10px;
            background-color: #4CAF50; /* Green color */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin-right: 5px;
            text-decoration: none; /* Remove underline from anchor */
        }

        .update-button:hover {
            background-color: #45a049; /* Darker green color on hover */
        }

        .delete-button {
            padding: 5px 10px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin-right: 5px;
            text-decoration: none; /* Remove underline from anchor */
        }

        .delete-button:hover {
            background-color: grey;
        }

        /* New style for the add button */
        .add-button {
            padding: 5px 10px;
            background-color: #3498db; /* Blue color */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin-top: 20px;
            text-decoration: none; /* Remove underline from anchor */
        }

        .add-button:hover {
            background-color: #2980b9; /* Darker blue color on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>All Support Requests</h2>
        <table border="1" style="width: 100%;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Category</th>
                    <th>Message</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM SupportRequests";
                $result = mysqli_query($con, $sql);

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $email = $row['email'];
                        $category = $row['category'];
                        $message = $row['message'];

                        echo '<tr>
                            <td>' . $id . '</td>
                            <td>' . $name . '</td>
                            <td>' . $email . '</td>
                            <td>' . $category . '</td>
                            <td>' . $message . '</td>
                            <td>
                                <button class="update-button"><a href="H_update.php?updateid=' . $id . '">Update</a></button>
                                <button class="delete-button"><a href="H_delete.php?deleteid=' . $id . '">Delete</a></button>
                            </td>
                        </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
        <!-- Button for adding another support request -->
        <div class="middle-button">
            <button class="add-button"><a href="H_insert.php">Add Support Request</a></button>
        </div>
    </div>
</body>
</html>
