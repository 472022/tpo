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

$result = $conn->query("SELECT applications.*, jobs.title AS job_title FROM applications 
                        JOIN jobs ON applications.job_id = jobs.id 
                        WHERE student_id='$student_id'");
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Applications</title>
</head>
<body>
    <h2>My Job Applications</h2>
    <table border="1">
        <tr>
            <th>Job Title</th>
            <th>Status</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['job_title']; ?></td>
            <td><?php echo $row['status']; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
