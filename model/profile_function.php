<?php
include '../db/config.php';

function getStudentProfile($student_id) {
    $conn = db();
    $sql = "SELECT * FROM student WHERE studentid = $student_id";
    return $conn->query($sql);
}

function updateStudentProfile($student_id, $new_data) {
    $conn = db();
    // Implement the logic to update the student's profile based on the new data
    // You can use mysqli UPDATE statement here
}

function getParentGuardianInfo($student_id) {
    $conn = db();
    $sql = "SELECT * FROM parent_guardian WHERE studentid = $student_id";
    return $conn->query($sql);
}

// Add more functions as needed for your specific requirements

?>
