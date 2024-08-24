<?php
session_start();
include('../includes/db.php');
include('../includes/functions.php');
checkAdminLogin();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $department = $_POST['department'];

    $sql = "INSERT INTO coordinators (username, password, department) VALUES ('$username', '$password', '$department')";

    if ($conn->query($sql) === TRUE) {
        echo "New coordinator added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$result = $conn->query("SELECT * FROM coordinators");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Coordinators</title>
</head>
<body>
    <h2>Add Coordinator</h2>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        
        <label for="password">Department:</label>
        <input type="department" id="department" name="department" required><br>
        
        <input type="submit" value="Add Coordinator">
    </form>
    
    <h2>Coordinator List</h2>
    <table border="1">
        <tr>
            <th>Username</th>
            <th>Password</th>
            <th>Department</th>
            <th>Actions</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['department']; ?></td>
            <td>
                <a href="delete_coordinator.php?id=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
