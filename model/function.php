<?php
require '../db/config.php';

// function clean($str) {
//     $conn = db();
//     $str = trim($str);
//     if (get_magic_quotes_gpc() false) {
//         $str = stripslashes($str);
//     }
//     return mysqli_real_escape_string($conn, $str);
// }

function login($email, $password) {
    $conn = db();

    // Use prepared statements to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $email);

    // Determine the table name based on the user role
    $tableName = '';
    switch ($_POST['userRole']) {
        case 'student':
            $tableName = 'student';
            break;
        case 'admin':
            $tableName = 'admin';
            break;
        case 'teacher':
            $tableName = 'teacher';
            break;
        default:
            // Handle invalid role
            return false;
    }

    // Update the query to use placeholders for both variables
    $sql = "SELECT * FROM $tableName WHERE email=? AND password=?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameters
    $stmt->bind_param("ss", $email, $password);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Close the statement
    $stmt->close();

    // Return the result row if it exists, or false if not
    return $result->num_rows > 0 ? $result->fetch_assoc() : false;
}



function registerUser($conn, $studentname, $studentbirth, $studentgender, $studentnum, $studentaddress, $studentposkod, $studentcity, $studentemail, $studentpassword, $parentsname, $parentsnum, $role) 
    {
    // Validate and sanitize data (you should add more validation)
    // ...

    // Insert user data into the database
    $hashedPassword = password_hash($studentpassword, PASSWORD_BCRYPT);

    $sql = "INSERT INTO student (studentname, studentbirth, studentgender, studentnum, studentaddress, studentposkod, studentcity, studentemail, studentpassword
            parentsname, parentsnum) 
            VALUES ('$studentname', '$studentbirth', '$studentgender', '$studentnum', '$studentaddress', '$studentposkod', '$studentcity',
             '$studentemail', '$hashedPassword', '$parentsname', '$parentsnum')";

    // Execute the SQL query
    // Note: Use prepared statements to prevent SQL injection
    $result = mysqli_query($conn, $sql);

    return $result;
}

// function loginUser($conn, $email, $password) {
//     // Validate and sanitize data (you should add more validation)
//     // ...

//     // Retrieve user data from the database
//     $sql = "SELECT * FROM users WHERE email = '$email'";
//     $result = mysqli_query($conn, $sql);

//     if ($result && mysqli_num_rows($result) > 0) {
//         $row = mysqli_fetch_assoc($result);
//         $hashedPassword = $row['password'];

//         // Verify the password
//         if (password_verify($password, $hashedPassword)) {
//             // Login successful
//             return true;
//         } else {
//             // Incorrect password
//             return false;
//         }
//     } else {
//         // User not found
//         return false;
//     }
// }
// ?>

