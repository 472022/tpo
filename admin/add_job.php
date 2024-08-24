<?php
session_start();
include('../includes/db.php');
include('../includes/functions.php');
checkAdminLogin();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comname= $_POST['comname'];
    $title = $_POST['title'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $skills = $_POST['skills'];
    $domain = $_POST['domain'];
    $position = $_POST['position'];
    $experience = $_POST['experience'];
    $salary = $_POST['salary'];
    $openings = $_POST['openings'];
    $eligibility = $_POST['eligibility'];
    $shift = $_POST['shift'];
    $schedule = $_POST['schedule'];

    $sql = "INSERT INTO jobs (comname, title, description, skills, domain, position, experience, salary, openings, eligibility, shift, schedule) 
            VALUES ('$comname','$title', '$description', '$skills', '$domain', '$position', '$experience', '$salary', '$openings', '$eligibility', '$shift', '$schedule')";

    if ($conn->query($sql) === TRUE) {
        echo "New job added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Job</title>
</head>
<body>
    <form method="POST" action="">
        <label for="comname">Company Name:</label>
        <input type="text" id="title" name="comname" required><br>

        <label for="title">Job Title:</label>
        <input type="text" id="title" name="title" required><br>
        
        <label for="description">Job Description:</label>
        <textarea id="description" name="description" required></textarea><br>
        
        <label for="skills">Skills Required:</label>
        <input type="text" id="skills" name="skills" required><br>
        
        <label for="domain">Domain:</label>
        <input type="text" id="domain" name="domain" required><br>
        
        <label for="position">Position:</label>
        <input type="text" id="position" name="position" required><br>
        
        <label for="experience">Experience:</label>
        <input type="text" id="experience" name="experience" required><br>
        
        <label for="salary">Estimated Salary:</label>
        <input type="text" id="salary" name="salary" required><br>
        
        <label for="openings">No. of Job Openings:</label>
        <input type="number" id="openings" name="openings" required><br>
        
        <label for="eligibility">Who is Eligible:</label>
        <input type="text" id="eligibility" name="eligibility" required><br>
        
        <label for="shift">Shift</label>
        <input type="text" id="shift" name="shift" required><br>
        
        <label for="schedule">Schedule:</label>
        <input type="text" id="schedule" name="schedule" required><br>
        
        <input type="submit" value="Add Job">
    </form>
</body>
</html>
