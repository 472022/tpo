<?php
session_start();
include('../includes/db.php');
include('../includes/functions.php');
checkAdminLogin();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome, Admin</h1>
    <nav>
        <ul>
            <li><a href="add_job.php">Add Job</a></li>
            <li><a href="view_jobs.php">View Jobs</a></li>
            <li><a href="manage_coordinators.php">Manage Coordinators</a></li>
            <li><a href="view_applications.php">View Applications</a></li>
            <li><a href="manage_students.php">Manage Students</a></li>
            <li><a href="performance_tracking.php">Performance Tracking</a></li>
            <li><a href="view_student_history.php">History Tracking</a></li>
            <li><a href="view_internships.php">View Internship Data</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</body>
</html>
