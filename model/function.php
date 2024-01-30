<?php
require '../db/config.php';

//this function to clean data that passed
function clean($str) {
    $conn=db();
    $str = @trim($str);
    if(get_magic_quotes_gpc()) {
        $str = stripslashes($str);
    }
    return mysqli_real_escape_string($conn,$str);
}

function loginStudent($email){
    $conn = db();
    $sql = "SELECT * FROM student WHERE studentemail='$email' ORDER BY studentid DESC LIMIT 1";
    return $conn->query($sql);
}

function loginTeacher($email){
    $conn = db();
    $sql = "SELECT * FROM teacher WHERE teacheremail='$email' ORDER BY teacherid DESC LIMIT 1";
    return $conn->query($sql);
}

function loginAdmin($email){
    $conn = db();
    $sql = "SELECT * FROM admin WHERE adminemail='$email' ORDER BY adminid DESC LIMIT 1";
    return $conn->query($sql);
}

function registerStudent($name,$dob,$sex,$phone,$address,$postcode,$city,$email,$password,$parentsname,$parentsphoneno){
    $conn=db();
    $sql="INSERT INTO student(studentname,studentdob,studentsex,studentphoneno,studentaddress,studentpostcode,studentcity,studentemail,password,parentsname,parentsphoneno)
            VALUES('$name','$dob','$sex','$phone','$address','$postcode','$city','$email','$password','$parentsname','$parentsphoneno')";

    return $conn->query($sql);
}

// Custom password verification function
function verifyPassword($inputPassword, $storedPassword) {
    // You can use your own password verification logic here
    // For example, you might compare the passwords directly
    return $inputPassword === $storedPassword;
}

?>

