<?php
require_once '../model/function.php';
require '../db/config.php';

$studentname = clean($_POST['studentname']);
$studentbirth = clean($_POST['studentbirth']);
$studentgender = clean($_POST['studentgender']);
$studentnum = clean($_POST['studentnum']);

$studentaddress= clean($_POST['studentaddress']);
$studentposkod = clean($_POST['studentposkod']);
$studentcity = clean($_POST['studentcity']);

$studentemail = clean($_POST['studentemail']);
$studentpassword = clean($_POST['studentpassword']);
$parentsname = clean($_POST['parentsname']);
$parentsnum = clean($_POST['parentsnum']);

$role = clean($_POST['role']);
$conn = db();

$result = mysqli_query($conn, $sql);

//Check whether the query was successful or not
if($result!="" && $result > 0) {
    echo ("<script LANGUAGE='JavaScript'>
            alert('Successfully sign up.')
            window.location.href='../view/login.php';
            </script>");
    exit();
} else {
    echo ("<script LANGUAGE='JavaScript'>
            alert('Failed to sign up.')
            history.back();
            </script>");
    exit();
}

?>