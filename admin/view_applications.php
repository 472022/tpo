<?php
session_start();
include('../includes/db.php');
include('../includes/functions.php');
checkAdminLogin();

$result = $conn->query("SELECT applications.*, students.name AS student_name, jobs.title AS job_title 
                        FROM applications 
                        JOIN students ON applications.student_id = students.id 
                        JOIN jobs ON applications.job_id = jobs.id");
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Applications</title>
</head>
<body>
    <h2>Job Applications</h2>
    <table border="1">
        <tr>
            <th>Student Name</th>
            <th>Job Title</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['student_name']; ?></td>
            <td><?php echo $row['job_title']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td>
                <a href="view_application.php?id=<?php echo $row['id']; ?>">View</a>
                <a href="a.php?id=<?php echo $row['id']; ?>&status=accepted">Accept</a>
                <a href="reject_application.php?id=<?php echo $row['id']; ?>&status=rejected">Reject</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
