<?php
session_start();
include('../includes/db.php');
include('../includes/functions.php');
checkAdminLogin();

$result = $conn->query("SELECT * FROM jobs");
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Jobs</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Styling for search boxes */
        .search-box {
            width: 100%;
            padding: 5px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }
        .search-row input {
            margin-bottom: 5px;
        }
        /* Optional: Make table headers stand out */
        th {
            background-color: #f2f2f2;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h2>Job Listings</h2>
    
    <!-- Search boxes placed in a separate row -->
    <div class="search-row">
        <input type="text" id="search_comname" class="search-box" placeholder="Search by Company">
        <input type="text" id="search_title" class="search-box" placeholder="Search by Job Title">
        <input type="text" id="search_description" class="search-box" placeholder="Search by Description">
        <input type="text" id="search_skills" class="search-box" placeholder="Search by Skills">
        <input type="text" id="search_domain" class="search-box" placeholder="Search by Domain">
        <input type="text" id="search_position" class="search-box" placeholder="Search by Position">
        <input type="text" id="search_experience" class="search-box" placeholder="Search by Experience">
        <input type="text" id="search_salary" class="search-box" placeholder="Search by Salary">
        <input type="text" id="search_openings" class="search-box" placeholder="Search by Openings">
        <input type="text" id="search_eligibility" class="search-box" placeholder="Search by Eligibility">
        <input type="text" id="search_shift" class="search-box" placeholder="Search by Shift">
        <input type="text" id="search_schedule" class="search-box" placeholder="Search by Schedule">
    </div>

    <!-- Job Listings Table -->
    <table border="1">
        <thead>
            <tr>
                <th>Company</th>
                <th>Job Title</th>
                <th>Description</th>
                <th>Skills</th>
                <th>Domain</th>
                <th>Position</th>
                <th>Experience</th>
                <th>Salary</th>
                <th>Openings</th>
                <th>Eligibility</th>
                <th>Shift</th>
                <th>Schedule</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="job_list">
            <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['comname']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['skills']; ?></td>
                <td><?php echo $row['domain']; ?></td>
                <td><?php echo $row['position']; ?></td>
                <td><?php echo $row['experience']; ?></td>
                <td><?php echo $row['salary']; ?></td>
                <td><?php echo $row['openings']; ?></td>
                <td><?php echo $row['eligibility']; ?></td>
                <td><?php echo $row['shift']; ?></td>
                <td><?php echo $row['schedule']; ?></td>
                <td>
                    <a href="edit_job.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="delete_job.php?id=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <script>
        $(document).ready(function(){
            function load_data(query_params) {
                $.ajax({
                    url: "fetch_jobs.php",
                    method: "POST",
                    data: query_params,
                    success: function(data){
                        $('#job_list').html(data);
                    }
                });
            }

            // Load all jobs on page load
            load_data();

            // Filter jobs based on input fields
            $('#search_comname, #search_title, #search_description, #search_skills, #search_domain, #search_position, #search_experience, #search_salary, #search_openings, #search_eligibility, #search_shift, #search_schedule').on('keyup', function(){
                var comname = $('#search_comname').val();
                var title = $('#search_title').val();
                var description = $('#search_description').val();
                var skills = $('#search_skills').val();
                var domain = $('#search_domain').val();
                var position = $('#search_position').val();
                var experience = $('#search_experience').val();
                var salary = $('#search_salary').val();
                var openings = $('#search_openings').val();
                var eligibility = $('#search_eligibility').val();
                var shift = $('#search_shift').val();
                var schedule = $('#search_schedule').val();
                
                load_data({
                    comname: comname,
                    title: title,
                    description: description,
                    skills: skills,
                    domain: domain,
                    position: position,
                    experience: experience,
                    salary: salary,
                    openings: openings,
                    eligibility: eligibility,
                    shift: shift,
                    schedule: schedule
                });
            });
        });
    </script>
</body>
</html>
