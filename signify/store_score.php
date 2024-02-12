<?php
file_put_contents('debug.txt', print_r($_POST, true)); // Write POST data to a file for debugging

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_SESSION['username'];
    $score = $_POST['score'];

    // Store the quiz score in the database (modify the database connection details)
    $servername = "localhost";
    $db_username = "root"; // Changed from $username to $db_username to avoid conflict
    $password = "sandesh";
    $dbname = "login";

    $conn = new mysqli($servername, $db_username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO quiz_scores (username, score) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    // Check if the statement was prepared successfully
    if (!$stmt) {
        die("Error in SQL statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("si", $username, $score);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Score stored successfully.";
    } else {
        echo "Error storing score: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
