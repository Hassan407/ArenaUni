<?php
// Connection parameters
$servername = "localhost";
$username = "hasan";
$password = "Hasan407AD";
$dbname = "university_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to handle deletion
function deleteData() {
    global $conn;

    // Retrieve Government ID from the form
    $governmentID = $_POST['governmentID'];

    // SQL query to delete data for the specified Government ID
    $sql = "DELETE FROM student_info WHERE government_id = '$governmentID'";

    if ($conn->query($sql) === TRUE) {
        echo "Data for Government ID $governmentID deleted successfully";
    } else {
        echo "Error deleting data: " . $conn->error;
    }
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['governmentID'])) {
    deleteData();
}

// Close the database connection
$conn->close();
?>
