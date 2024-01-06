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

    
        // SQL query to insert data into the table
        $sql = "INSERT INTO student_info (first_name, last_name, email, phone_number, government_id, birth_date, gender, department) VALUES ('$firstName', '$lastName', '$email', '$phoneNumber', '$governmentID', '$birthDate', '$gender', '$department')";

        // Check if the query was successful
        if ($conn->query($sql) === TRUE) {
            // Redirect to a success page with a success message
            header("Location: re.html");
            exit();
        } else {
            // Display error message
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    submitForm();
}

// Close the database connection
$conn->close();
?>
