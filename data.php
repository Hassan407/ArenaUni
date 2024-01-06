<?php
$servername = "localhost";
$username = "hasan";
$password = "Hasan407AD";
$dbname = "university_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}

$sql = "SELECT * FROM student_info";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Database Data</title>
    <link rel="icon" href="images/Logo.png" type="image/x-icon">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: block;
            height: 100vh;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: auto;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>University Registration Data</h2>

<table>
    <thead>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone number</th>
        <th>government ID</th>
        <th>Birth Date</th>
        <th>Gender</th>
        <th>Department</th>
     </tr>
    </thead>
    <tbody>

    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['first_name']}</td>";
        echo "<td>{$row['last_name']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['phone_number']}</td>";
        echo "<td>{$row['government_id']}</td>";
        echo "<td>{$row['birth_date']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['department']}</td>";
        echo "</tr>";
    }

    mysqli_free_result($result);
    mysqli_close($conn);
    ?>

    </tbody>
</table>

</body>
</html>
