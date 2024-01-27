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

// function updateStudentProfile($studentid, $studentname, $studentemail, $hashedPassword) {
//     global $conn;
//     $sql = "UPDATE student SET studentname = ?, studentemail = ?, studentpassword = ? WHERE studentid = ?";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("ssssi", $studentname, $studentemail, $hashedPassword, $studentid);
//     $stmt->execute();
//     $stmt->close();
//  }

function updateStudentProfile($studentid, $studentname, $studentbirth, $studentgender, $studentnum, $studentemail, $studentaddress, $studentposkod, $studentcity, $parentsname, $parentsnum, $newPassword) {
    global $conn;

    // Update the student's name
    $stmt = $conn->prepare("UPDATE student SET studentname = ? WHERE studentid = ?");
    $stmt->bind_param("si", $studentname, $studentid);
    $stmt->execute();

    // Update the student's date of birth
    $stmt = $conn->prepare("UPDATE student SET studentbirth = ? WHERE studentid = ?");
    $stmt->bind_param("si", $studentbirth, $studentid);
    $stmt->execute();

    // Update the student's gender
    $stmt = $conn->prepare("UPDATE student SET studentgender = ? WHERE studentid = ?");
    $stmt->bind_param("si", $studentgender, $studentid);
    $stmt->execute();

    // Update the student's phone number
    $stmt = $conn->prepare("UPDATE student SET studentnum = ? WHERE studentid = ?");
    $stmt->bind_param("si", $studentnum, $studentid);
    $stmt->execute();

    // Update the student's email address
    $stmt = $conn->prepare("UPDATE student SET studentemail = ? WHERE studentid = ?");
    $stmt->bind_param("si", $studentemail, $studentid);
    $stmt->execute();

    // Update the student's address
    $stmt = $conn->prepare("UPDATE student SET studentaddress = ? WHERE studentid = ?");
    $stmt->bind_param("si", $studentaddress, $studentid);
    $stmt->execute();

    // Update the student's postal code
    $stmt = $conn->prepare("UPDATE student SET studentposkod = ? WHERE studentid = ?");
    $stmt->bind_param("si", $studentposkod, $studentid);
    $stmt->execute();

    // Update the student's city
    $stmt = $conn->prepare("UPDATE student SET studentcity = ? WHERE studentid = ?");
    $stmt->bind_param("si", $studentcity, $studentid);
    $stmt->execute();

    // Update the student's parent or guardian's name
    $stmt = $conn->prepare("UPDATE student SET parentsname = ? WHERE studentid = ?");
    $stmt->bind_param("si", $parentsname, $studentid);
    $stmt->execute();

    // Update the student's parent or guardian's phone number
    $stmt = $conn->prepare("UPDATE student SET parentsnum = ? WHERE studentid = ?");
    $stmt->bind_param("si", $parentsnum, $studentid);
    $stmt->execute();

    // Update the student's password
    if (!empty($newPassword)) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE student SET studentpassword = ? WHERE studentid = ?");
        $stmt->bind_param("si", $hashedPassword, $studentid);
        $stmt->execute();
    }

    $stmt->close();
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
