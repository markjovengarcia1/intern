<?php

require 'server.php';

if (!empty($_GET['rowid'])) {
    $rowid = $_GET['rowid'];
    $fetch = "SELECT * FROM studentinfo INNER JOIN school ON studentinfo.schoolid = school.id INNER JOIN coursetbl ON coursetbl.courseid = studentinfo.courseid WHERE studid LIKE '$rowid';";
    $query = mysqli_query($conn, $fetch);

    while($row = mysqli_fetch_assoc($query)){
        $fname = $row['fname'];  
        $mname = $row['mname'];
        $lname = $row['lname'];
        $age = $row['age'];
        $course = $row['course'];
        $school = $row['schoolname'];



    }
}





?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intern Records</title>
    <link rel="stylesheet" href="css/internInfo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" type="png" href="img/logo-icon.png">
</head>
<body>
    <div class="container">
        <?php include 'component/navbar.php';?> 
        <div class="main-content">
        <div class="intern-info">
            <div class="profile">
                <img src="img/kapatidnijoanna.jpg" alt="Profile Picture">
                <h2><?php echo $fname, " ", $mname[0] ,". ", $lname; ?></h2>
                <p><?php echo $school; ?></p>
        </div>
        <div class="details">
        <div class="detail">Name: <?php echo $fname, " ", $mname[0] ,". ", $lname; ?></div>
        <div class="detail">Age: <?php echo $age; ?></div>
        <div class="detail">Course: <?php echo $course; ?></div>
        <div class="detail">University: <?php echo $school; ?></div>
        <div class="detail">Address: Timalan Conception Naic, Cavite</div>
        <div class="detail">Contact No: 093564457486</div>
        <div class="detail">Guardian: Maryln A. Garcia</div>
        <div class="detail">Parent Contact No: 093564457486</div>
        <div class="button-detail">
            <button class="btn-time">UPDATE</button>
            <button class="btn-time2">DELETE</button>
    </div>
</div>
    <div class="logo">
        <img src="img/EACMedOnly.png" alt="EACMed Logo">
    </div>
    </div>
    <div class="attendance-record">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time in</th>
                        <th>Time Out</th>
                        <th>Rendered Time</th>
                        <th>Remaining Time</th>
                        <th>Allow OT</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>07-22-24</td>
                        <td>7:36 AM</td>
                        <td>5:12 PM</td>
                        <td>Complete</td>
                        <td>224 Hours</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>07-23-24</td>
                        <td>7:38 AM</td>
                        <td>5:16 PM</td>
                        <td>Complete</td>
                        <td>216 Hours</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>07-24-24</td>
                        <td>7:51 AM</td>
                        <td>5:38 PM</td>
                        <td>Complete</td>
                        <td>208 Hours</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>07-25-24</td>
                        <td>7:59 AM</td>
                        <td>5:00 PM</td>
                        <td>Complete</td>
                        <td>200 Hours</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>07-26-24</td>
                        <td>7:58 AM</td>
                        <td>5:29 PM</td>
                        <td>Complete</td>
                        <td>192 Hours</td>
                        <td>Yes</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="attendance-buttons">
            <button class="btn-time">Time In</button>
            <button class="btn-time2">Time Out</button>
        </div>
    </div>
</div>


</div>

    </div>
</body>
</html>