<?php

require 'server.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check for upload errors
    if ($_FILES['fileUpload']['error'] !== UPLOAD_ERR_OK) {
        die("Upload failed with error code " . $_FILES['fileUpload']['error']);
    }
// <<<<<<< HEAD
//     else {
        
//         $student = "INSERT INTO studentinfo(fname, mname, lname, age, sex, courseid, schoolid, hrequired, startdate, end_date) VALUES('$Fname','$Mname','$Lname', 
//         '$age', '$sex','$courses', '$school', '$reqhours', '$Sdate', '$Edate');";
//         $query = mysqli_query($conn, $student);

//         echo "<script>window.alert('Register Successfully!');</script>";
//         echo "<script>window.location.assign('dashboard.php')</script>";
//     } 
    
//         // if($query){
//         //     move_uploaded_file($intern_temp_name, $img_folder);
// =======

    $tmpFilePath = $_FILES['fileUpload']['tmp_name'];
    $imageFileType = strtolower(pathinfo($_FILES['fileUpload']['name'], PATHINFO_EXTENSION));


    // Check if temporary file exists
    if (file_exists($tmpFilePath)) {
        // Validate if the file is an image
        $check = getimagesize($tmpFilePath);
        if ($check !== false) {
            // Read file content into a variable
            $imageData = file_get_contents($tmpFilePath);
            $imageData = mysqli_real_escape_string($conn, $imageData);

            // Gather other form data
            $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
            $middleName = mysqli_real_escape_string($conn, $_POST['middleName']);
            $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
            $sex = mysqli_real_escape_string($conn, $_POST['sex']);
            $age = mysqli_real_escape_string($conn, $_POST['age']);
            $hours = mysqli_real_escape_string($conn, $_POST['hours']);
            $courseName = mysqli_real_escape_string($conn, $_POST['course']);
            $startDate = mysqli_real_escape_string($conn, $_POST['startDate']);
            $endDate = mysqli_real_escape_string($conn, $_POST['endDate']);
            $schoolName = mysqli_real_escape_string($conn, $_POST['school']);

            // Insert data into the database
            $query = "INSERT INTO studentinfo (fname, mname, lname, sex, age, hrequired, courseid, startdate, end_date, schoolid, image, status) 
                      VALUES ('$firstName', '$middleName', '$lastName', '$sex', '$age', '$hours', '$courseName', '$startDate', '$endDate', '$schoolName', '$imageData', 'On-Going')";

            if (mysqli_query($conn, $query)) {
                echo "<script>window.location.assign('students.php')</script>";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "File is not an image.";
        }
    } else {
        die("Temporary file does not exist.");
    }

    mysqli_close($conn);
}
?>
