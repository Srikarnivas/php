<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Creating connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Checking connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $course = $_POST["course"];
    $year = $_POST["year"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password

    // Prepare the SQL statement
    $sql = "INSERT INTO students (name, email, phone, dob, gender, address, course, year, password) 
            VALUES ('$name', '$email', '$phone', '$dob', '$gender', '$address', '$course', '$year', '$password')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "
        <div class='success-message'>
            Registration successful!
        </div>
        <script>
            setTimeout(function() {
                window.location.href = './demo/index.html';
            }, 3000);
        </script>
        <style>
            .success-message {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                color: #28a745;
                font-size: 24px;
                font-weight: bold;
            }
        </style>
        ";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Close the connection
mysqli_close($conn);
?>
