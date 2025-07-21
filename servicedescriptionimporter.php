<?php

// Enable error reporting to troubleshoot
error_reporting(E_ALL);
ini_set('display_errors', 1);

// MySQL database connection
$servername = "your_database_host";
$username = "your_database_username";
$password = "your_database_password";
$dbname = "your_database_name";  // Replace with your actual DB name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected to the database successfully!<br>";
}

// Load the text file content
$file_content = file_get_contents('your_text_file_url');  // Replace with the correct path to your text file

// Check if the file content was successfully loaded
if (!$file_content) {
    die("Error reading the text file.");
}

// Regular expression to match the service IDs and descriptions
preg_match_all('/data-filter-table-service-id="(\d+)"[^>]*>.*?d-none"[^>]*>(.*?)<\/div>/s', $file_content, $matches);

// Check if we matched any services
if (count($matches[1]) == 0) {
    die("No service IDs and descriptions found in the text file.");
}

// Loop through each matched service and description
foreach ($matches[1] as $index => $service_id) {
    $description = trim(strip_tags($matches[2][$index])); // Clean up description (remove HTML tags)
    
    // Escape special characters for MySQL query to prevent SQL injection and syntax issues
    $service_id = $conn->real_escape_string($service_id);
    $description = $conn->real_escape_string($description);

    // Use backticks around `desc` to avoid conflict with MySQL reserved word
    $sql = "UPDATE services SET `desc` = '$description' WHERE api_service_id = '$service_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Description updated for service ID: " . $service_id . "<br>";
    } else {
        echo "Error updating description for service ID: " . $service_id . " - " . $conn->error . "<br>";
    }
}

// Close the database connection
$conn->close();

?>
