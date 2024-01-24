<?php
include '../db/config.php';

//Get the student profile by ID
function getStudentProfile($student_id, $student_name, $student_username, $student_password, $student_class, $student_birth, $student_gender, $student_address, $student_num, $student_email) {
    global $conn;
    $sql = "SELECT * FROM student WHERE studentid = ? OR studentname = ? OR studentusername = ? OR studentpassword = ? OR studentclass = ? OR studentbirth = ? OR studentgender = ? OR studentaddress = ? OR studentnum = ? OR studentemail = ? OR parentsname = ? OR parentsnum = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('isssssssssss', $student_id, $student_name, $student_username, $student_password, $student_class, $student_birth, $student_gender, 
    $student_address,  $student_num, $student_email,  $parents_name, $parents_num);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();  // Close the statement to free up resources
    return $result;
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

// function getTeacherProfile($teacher_id) {
//     global $conn;

//     $query = "SELECT * FROM teacher WHERE teacher_id = ?";
//     $stmt = $conn->prepare($query);
//     $stmt->bind_param("i", $teacher_id);
//     $stmt->execute();
//     $result = $stmt->get_result();

//     if ($result->num_rows > 0) {
//         $row = $result->fetch_assoc();
//         return $row;
//     } else {
//         return false;
//     }
// }

// function getTeacherProfile ($teacher_id, $teacher_name, $teacher_phoneno, $teacher_email, $teacher_bank, $teacher_accountno, $teacher_username, $teacher_password, $teacher_address) {
//     global $conn;
//     //$sql = "SELECT teachername, teacherphoneno, teacheremail, teacherbank, teacheraccountno, teacherusername, teacherpassword, teacheraddress FROM teacher WHERE teacherid = ?";
//     $sql = "SELECT teacher WHERE teacherid = ? OR teachername = ? OR teacherphoneno = ? OR teacheremail = ? OR teacherbank = ? OR teacheraccountno = ? OR teacherusername = ? OR teacherpassword = ? OR teacheraddress = ?";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("isisisss", $teacher_id, $teacher_name, $teacher_phoneno, $teacher_email, $teacher_bank, $teacher_accountno, $teacher_username, $teacher_password, $teacher_address);
//     $stmt->execute();
//     $result = $stmt->get_result();
//     //$stmt->close();
//     if ($row = $result->fetch_assoc()) {
//         return $row;
//     } else {
//         return $result;
//     }
// }

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
