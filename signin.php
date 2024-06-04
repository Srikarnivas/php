<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $email = $_POST["email"];
    $name = $_POST["name"];
    $password = $_POST["password"];

    // Prepare the SQL statement
    $sql = "SELECT * FROM students WHERE email = '$email' AND name = '$name'";
    $result = mysqli_query($conn, $sql);

    // Check if the user exists
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Store user details in session
            session_start();
            $_SESSION['student'] = $row;

            echo "
            <div class='success-message'>
                Sign-In successful! Redirecting...
            </div>
            <script>
                setTimeout(function() {
                    window.location.href = 'profile.php';
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
            echo "Incorrect password.";
        }
    } else {
        echo "No user found with the given email and name.";
    }
}

// Close the connection
mysqli_close($conn);
?>
