<?php
session_start();

// Check if the student is set in the session
if (!isset($_SESSION['student'])) {
    header("Location: signin.html");
    exit();
}

// Get student details from the session
$student = $_SESSION['student'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .profile-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 50px auto;
        }

        .profile-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-details {
            font-family: Arial, sans-serif;
        }

        .profile-details p {
            font-size: 18px;
            margin: 10px 0;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .buttons button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
        }

        .home-button {
            background-color: #007bff;
            color: #fff;
        }

        .home-button:hover {
            background-color: #0056b3;
        }

        .print-button {
            background-color: #28a745;
            color: #fff;
        }

        .print-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h2>Student Profile</h2>
        <div class="profile-details">
            <p><strong>Name:</strong> <?php echo $student['name']; ?></p>
            <p><strong>Email:</strong> <?php echo $student['email']; ?></p>
            <p><strong>Phone Number:</strong> <?php echo $student['phone']; ?></p>
            <p><strong>Date of Birth:</strong> <?php echo $student['dob']; ?></p>
            <p><strong>Gender:</strong> <?php echo $student['gender']; ?></p>
            <p><strong>Address:</strong> <?php echo $student['address']; ?></p>
            <p><strong>Course:</strong> <?php echo $student['course']; ?></p>
            <p><strong>Year:</strong> <?php echo $student['year']; ?></p>
        </div>
        <div class="buttons">
            <button class="home-button" onclick="window.location.href='./demo/index.html'">Home</button>
            <button class="print-button" onclick="window.print()">Print</button>
        </div>
    </div>
</body>
</html>
