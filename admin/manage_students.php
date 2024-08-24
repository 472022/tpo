<?php
session_start();
include('../includes/db.php');
include('../includes/functions.php');

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$result = $conn->query("SELECT * FROM students");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Students</title>
</head>
<body>
    <h2>Manage Students</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>PRN</th>
            <th>Roll No</th>
            <th>Name</th>
            <th>Year</th>
            <th>Branch</th>
            <th>Division</th>
            <th>Batch</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Username</th>
            <th>Password</th>
            <th>Actions</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['prn']; ?></td>
            <td><?php echo $row['roll_no']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['year']; ?></td>
            <td><?php echo $row['branch']; ?></td>
            <td><?php echo $row['division']; ?></td>
            <td><?php echo $row['batch']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td>
                <a href="edit_student.php?id=<?php echo $row['id']; ?>">Edit</a> | 
                <a href="delete_student.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this student?');">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
