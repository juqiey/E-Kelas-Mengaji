<?php
require '../model/profile_function.php';

// Function to handle image uploads
function handleUCUAImageUploads($student_id) {
    // Initialize errors array
    $errors = [];

    // Handle img_ucua upload
    if (!empty($_FILES['img_ucua']) && $_FILES['img_ucua']['name'] != null) {
        $file_name = $_FILES['img_ucua']['name'];
        $file_size = $_FILES['img_ucua']['size'];
        $file_tmp = $_FILES['img_ucua']['tmp_name'];
        $ext_name = explode('.', $file_name);
        $file_ext = strtolower(end($ext_name));
        $img_ucua = date('Ymd_his') . '_' . str_replace(' ', '_', $file_name);
        $target_dir = "../ucua_images/ucua_finding/";
        $target_file = $target_dir . $img_ucua;

        $allowed_extensions = ["jpeg", "jpg", "png", "gif"];
        $max_file_size = 4 * 1024 * 1024; // Set the maximum file size to 4 MB

        if (!in_array($file_ext, $allowed_extensions)) {
            $errors[] = "Extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > $max_file_size) {
            $errors[] = "File size must be below 4 MB.";
        }

        if (empty($errors)) {
            $filepath = "../ucua_images/ucua_finding/" . $img_ucua;
            move_uploaded_file($file_tmp, $target_file);
            $img_ucua_url = "/ucua_images/ucua_finding/" . $img_ucua;
            return $img_ucua_url;
        }
    }

    // Handle img_action upload
    if (!empty($_FILES['img_action']) && $_FILES['img_action']['name'] != null) {
        // ... (same as before)

        if (empty($errors)) {
            $filepath = "../ucua_images/ucua_action/" . $img_action;
            move_uploaded_file($file_tmp, $target_file);
            $img_action_url = "/ucua_images/ucua_action/" . $img_action;
            return $img_action_url;
        }
    }

    // If no images were uploaded or there were errors, return an empty string
    return "";
}

// Call the function to handle image uploads
$image_urls = handleUCUAImageUploads($student_id);

// Check if there were any errors during the upload process
if (!empty($errors)) {
    echo "Error(s) during image upload:<br>";
    foreach ($errors as $error) {
        echo "- " . $error . "<br>";
    }
} else {
    // If the upload was successful, update the database with the URLs of the uploaded images
    $stmt = $conn->prepare("UPDATE student SET img_ucua = ?, img_action = ? WHERE student_id = ?");
    $stmt->bind_param("ssi", $img_ucua_url, $img_action_url, $student_id);

    $img_ucua_url = isset($image_urls[0]) ? $image_urls[0] : '';
    $img_action_url = isset($image_urls[1]) ? $image_urls[1] : '';
    $student_id = 1; // Set the student ID here

    $stmt->execute();
    $stmt->close();

    echo "Image(s) uploaded successfully.";
}

$conn->close();

?>