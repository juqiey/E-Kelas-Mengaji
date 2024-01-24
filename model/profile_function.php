<?php
include '../db/config.php';

//Get the student profile by ID
function getStudentProfile($student_id){
    global $conn;
    $sql = "SELECT * FROM student WHERE studentid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        return $row;
    } else {
        return false;
    }
}

// Update the student profile by ID
function updateStudentProfile($student_id, $name, $class, $picture) {
    global $conn;
    $picture = file_get_contents($picture['tmp_name']);
    $sql = "UPDATE student SET studentname = ?, studentclass = ?, profilepicture = ? WHERE studentid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssi', $name, $class, $picture, $student_id); // Corrected the data types in bind_param
    $result = $stmt->execute();
    $stmt->close();  // Close the statement to free up resources
    return $result;
}

function getTeacherProfile($teacher_id) {
    global $conn;
    $sql = "SELECT * FROM teacher WHERE teacherid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $teacher_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        return $row;
    } else {
        return false;
    }
}

?>
