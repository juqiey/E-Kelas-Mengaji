<?php

require '../model/function.php';

$name = clean($_POST['name']);
$ic = clean($_POST['ic']);
$email = clean($_POST['email']);
$phone_no = clean($_POST['phone_no']);
$company_id = clean($_POST['company_id']);
$role = clean($_POST['role']);
$username = clean($_POST['username']);
$password = clean($_POST['password']);

$result = addUser($name,$ic,$email,$phone_no,$company_id,$role,$username,$password);

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