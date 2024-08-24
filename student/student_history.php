<?php
session_start();
include('../includes/db.php');
include('../includes/functions.php');

// Check if the student is logged in
if (!isset($_SESSION['student'])) {
    header("Location: login.php");
    exit();
}

// Get student username from session
$student_username = $_SESSION['student'];

// Retrieve student ID
$sql_student = "SELECT id FROM students WHERE username='$student_username'";
$result_student = $conn->query($sql_student);
$student = $result_student->fetch_assoc();
$student_id = $student['id'];

// Query to get the history of the student's applications
$sql = "SELECT 
            j.title AS job_title,
            j.description AS job_description,
            j.domain AS job_domain,
            a.status AS application_status
        FROM applications a
        JOIN jobs j ON a.job_id = j.id
        WHERE a.student_id = '$student_id'";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application History</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h2>My Application History</h2>
    <table>
        <thead>
            <tr>
                <th>Job Title</th>
                <th>Job Description</th>
                <th>Job Domain</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['job_title']); ?></td>
                        <td><?php echo htmlspecialchars($row['job_description']); ?></td>
                        <td><?php echo htmlspecialchars($row['job_domain']); ?></td>
                        <td><?php echo htmlspecialchars($row['application_status']); ?></td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='4'>No applications found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="logout.php">Logout</a>
</body>
</html>
