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


function updateStudentProfile($student_id, $name, $class, $img_ucua_url, $img_action_url) {
    global $conn;
    $sql = "UPDATE student SET studentname = ?, studentclass = ?, img_ucua = ?, img_action = ? WHERE studentid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssi', $name, $class, $img_ucua_url, $img_action_url, $student_id);
    $result = $stmt->execute();
    $stmt->close();
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
