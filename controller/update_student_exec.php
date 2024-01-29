<?php
require '../model/profile_function.php';

// Get the student ID and form data from the request
$student_id = $_POST['student_id'];
$formData = $_POST;

// Remove the student_id from the form data
unset($formData['student_id']);

// Update the student information in the database
updateStudentProfile($student_id, $formData['studentname'], $formData['studentbirth'], $formData['studentgender'], $formData['studentnum'], $formData['studentemail'], $formData['studentaddress'], $formData['studentposkod'], $formData['studentcity'], $formData['parentsname'], $formData['parentsnum'], $formData['newPassword']);

// Redirect back to the student profile page
header('Location: student_profile.php?id=' . $student_id);
exit;
?>