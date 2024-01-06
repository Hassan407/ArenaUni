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

// Function to handle form submission
function submitForm() {
    global $conn;

    // Retrieve form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['Phonenumber'];
    $governmentID = $_POST['governmentID'];
    $birthDate = $_POST['BirthDate'];
    $gender = $_POST['choice'];
    $department = $_POST['department'];

    // Check if government_id already exists
    $checkQuery = "SELECT * FROM student_info WHERE government_id = '$governmentID'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        // Update the existing record
        $updateQuery = "UPDATE student_info SET first_name='$firstName', last_name='$lastName', email='$email', phone_number='$phoneNumber', birth_date='$birthDate', gender='$gender', department='$department' WHERE government_id='$governmentID'";

        // Check if the query was successful
        if ($conn->query($updateQuery) === TRUE) {
            // Redirect to a success page with a success message
            header("Location: update.html");
            exit();
        } else {
            // Display error message
            echo "Error updating record: " . $conn->error;
        }
    } else {
        // Display error message as the record does not exist
        die("Error: Government ID does not exist. Please provide a valid government ID.");
    }
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    submitForm();
}

// Close the database connection
$conn->close();
?>
