<?php
session_start();
include('../includes/db.php');
include('../includes/functions.php');

if (!isset($_SESSION['student'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
</head>
<body>
    <h1>Welcome, Student</h1>
    <nav>
        <ul>
            <li><a href="view_jobs.php">View Jobs</a></li>
            <li><a href="view_applications.php">View Applications</a></li>
            <li><a href="progress.php">View Progress</a></li>
            <li><a href="performance_track.php">Progress Tracking</a></li>
            <li><a href="student_history.php">History treack</a></li>
            <li><a href="internship_form.php">Submit Internship Data</a></li>
            <li><a href="view_my_internships.php">view Internship Data</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</body>
</html>
