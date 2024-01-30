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

/*function loginAdmin($email){
    $conn = db();
    $sql = "SELECT * FROM admin WHERE adminemail='$email' ORDER BY adminid DESC LIMIT 1";
    return $conn->query($sql);
}*/

/*function registerUser($conn,$studentname,$studentbirth, $studentgender, $studentnum, $studentaddress, $studentposkod, $studentcity ,$studentemail,
$studentpassword ,$parentsname ,$parentsnum, $role) {
    // Validate and sanitize data (you should add more validation)
    // ...

    // Insert user data into the database
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (firstName, birthdate, gender, phone, address, poskod, city, email, password) 
            VALUES ('$studentname', '$studentbirth', '$studentgender', '$studentnum', '$studentaddress', '$studentposkod', '$studentcity',
             '$studentemail', '$parentsname', '$hashedPassword')";

    // Execute the SQL query
    // Note: Use prepared statements to prevent SQL injection
    $result = mysqli_query($conn, $sql);

    return $result;
}*/

// Custom password verification function
function verifyPassword($inputPassword, $storedPassword) {
    // You can use your own password verification logic here
    // For example, you might compare the passwords directly
    return $inputPassword === $storedPassword;
}

?>

