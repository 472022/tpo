<?php
session_start();
include('../includes/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prn = $_POST['prn'];
    $roll_no = $_POST['roll_no'];
    $name = $_POST['name'];
    $year = $_POST['year'];
    $branch = $_POST['branch'];
    $division = $_POST['division'];
    $batch = $_POST['batch'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO students (prn, roll_no, name, year, branch, division, batch, address, email, phone, username, password) 
            VALUES ('$prn', '$roll_no', '$name', '$year', '$branch', '$division', '$batch', '$address', '$email', '$phone', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful";
        header("Location: login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
</head>
<body>
    <form method="POST" action="">
        <label for="prn">PRN:</label>
        <input type="text" id="prn" name="prn" required><br>
        
        <label for="roll_no">Roll No:</label>
        <input type="text" id="roll_no" name="roll_no" required><br>
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>
        
        <label for="year">Year:</label>
        <input type="text" id="year" name="year" required><br>
        
        <label for="branch">Branch:</label>
        <input type="text" id="branch" name="branch" required><br>
        
        <label for="division">Division:</label>
        <input type="text" id="division" name="division" required><br>
        
        <label for="batch">Batch:</label>
        <input type="text" id="batch" name="batch" required><br>
        
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br>
        
        <label for="email">Email (College email):</label>
        <input type="email" id="email" name="email" required><br>
        
        <label for="phone">Phone No:</label>
        <input type="text" id="phone" name="phone" required><br>
        
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        
        <input type="submit" value="Register">
    </form>
</body>
</html>
