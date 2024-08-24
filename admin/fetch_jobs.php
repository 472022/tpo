<?php
include('../includes/db.php');

$comname = isset($_POST['comname']) ? $_POST['comname'] : '';
$title = isset($_POST['title']) ? $_POST['title'] : '';
$description = isset($_POST['description']) ? $_POST['description'] : '';
$skills = isset($_POST['skills']) ? $_POST['skills'] : '';
$domain = isset($_POST['domain']) ? $_POST['domain'] : '';
$position = isset($_POST['position']) ? $_POST['position'] : '';
$experience = isset($_POST['experience']) ? $_POST['experience'] : '';
$salary = isset($_POST['salary']) ? $_POST['salary'] : '';
$openings = isset($_POST['openings']) ? $_POST['openings'] : '';
$eligibility = isset($_POST['eligibility']) ? $_POST['eligibility'] : '';
$shift = isset($_POST['shift']) ? $_POST['shift'] : '';
$schedule = isset($_POST['schedule']) ? $_POST['schedule'] : '';

$query = "SELECT * FROM jobs WHERE comname LIKE '%$comname%' AND title LIKE '%$title%' AND description LIKE '%$description%' AND skills LIKE '%$skills%' AND domain LIKE '%$domain%' AND position LIKE '%$position%' AND experience LIKE '%$experience%' AND salary LIKE '%$salary%' AND openings LIKE '%$openings%' AND eligibility LIKE '%$eligibility%' AND shift LIKE '%$shift%' AND schedule LIKE '%$schedule%'";
$result = $conn->query($query);

$output = '';
while($row = $result->fetch_assoc()) {
    $output .= '
    <tr>
        <td>'.$row['comname'].'</td>
        <td>'.$row['title'].'</td>
        <td>'.$row['description'].'</td>
        <td>'.$row['skills'].'</td>
        <td>'.$row['domain'].'</td>
        <td>'.$row['position'].'</td>
        <td>'.$row['experience'].'</td>
        <td>'.$row['salary'].'</td>
        <td>'.$row['openings'].'</td>
        <td>'.$row['eligibility'].'</td>
        <td>'.$row['shift'].'</td>
        <td>'.$row['schedule'].'</td>
        <td>
            <a href="edit_job.php?id='.$row['id'].'">Edit</a>
            <a href="delete_job.php?id='.$row['id'].'">Delete</a>
        </td>
    </tr>';
}

echo $output;
?>
