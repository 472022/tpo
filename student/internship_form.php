<?php
session_start();
include('../includes/db.php');
include('../includes/functions.php');

if (!isset($_SESSION['student'])) {
    header("Location: login.php");
    exit();
}

$student_username = $_SESSION['student'];
$sql_student = "SELECT id FROM students WHERE username='$student_username'";
$result_student = $conn->query($sql_student);
$student = $result_student->fetch_assoc();
$student_id = $student['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $company_name = $_POST['company_name'];
    $position = $_POST['position'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $stipend = $_POST['stipend'];
    $responsibilities = $_POST['responsibilities'];
    $supervisor_name = $_POST['supervisor_name'];
    $supervisor_contact = $_POST['supervisor_contact'];

    $sql = "INSERT INTO internships (student_id, company_name, position, start_date, end_date, stipend, responsibilities, supervisor_name, supervisor_contact) 
            VALUES ('$student_id', '$company_name', '$position', '$start_date', '$end_date', '$stipend', '$responsibilities', '$supervisor_name', '$supervisor_contact')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Internship data submitted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Internship Data Collection</title>
</head>
<body>
    <h2>Submit Internship Data</h2>
    <form method="post" action="">
        <label>Company Name:</label>
        <input type="text" name="company_name" required><br>
        <label>Position:</label>
        <input type="text" name="position" required><br>
        <label>Start Date:</label>
        <input type="date" name="start_date" required><br>
        <label>End Date:</label>
        <input type="date" name="end_date" required><br>
        <label>Stipend:</label>
        <input type="text" name="stipend" required><br>
        <label>Responsibilities:</label>
        <textarea name="responsibilities" required></textarea><br>
        <label>Supervisor Name:</label>
        <input type="text" name="supervisor_name" required><br>
        <label>Supervisor Contact:</label>
        <input type="text" name="supervisor_contact" required><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
