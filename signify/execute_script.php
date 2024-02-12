<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["startButton"])) {
    // Execute the Python script using the system command
    $output = shell_exec('python "D:\Signify-T\app.py" 2>&1');

    // Filter out TensorFlow-related lines
    $filteredOutput = filterOutTensorFlowLines($output);
    echo "Thank you";
} else {
    echo "Invalid request.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["startButton1"])) {
    // Execute the Python script using the system command
    $output = shell_exec('python D:\Latest\flask_app.py');


} else {
    echo "Invalid request.";
}

// Function to filter out TensorFlow-related lines
function filterOutTensorFlowLines($output) {
    // Customize this function based on the actual format of your output
    // Currently, it filters out lines containing "tensorflow" or "2023-"
    $lines = explode("\n", $output);
    $filteredLines = array_filter($lines, function ($line) {
        return (stripos($line, "tensorflow") === false) && (stripos($line, "2023-") === false);
    });
    return implode("\n", $filteredLines);
}
?>
