<?php
require '../model/profile_function.php';

// Get the teacher ID from the URL parameter
$teacher_id = isset($_GET['id']) ? intval($_GET['id']) : 1;

// Fetch the teacher profile using the getTeacherProfile function
$teacher = getTeacherProfile($teacher_id);

// Check if the teacher profile exists
if ($teacher) {
    // Display the teacher profile
} else {
    // Display an error message
    echo "Error: Teacher not found.";
}
?>
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Pengajar</title>
    <link href="../resources/main.css" rel="stylesheet" />
    <style>
      .teacher-profile .card {
        border-radius: 10px;
      }

      .teacher-profile .card .card-header .profile_img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        margin: 10px auto;
        border: 10px solid #ccc;
        border-radius: 50%;
      }

      .teacher-profile .card h3 {
        font-size: 20px;
        font-weight: 700;
      }

      .teacher-profile .card p {
        font-size: 16px;
        color: #000;
      }

      .teacher-profile .table th,
      .teacher-profile .table td {
        font-size: 14px;
        padding: 5px 10px;
        color: #000;
      }
    </style>
  </head>
  <body class="sb-nav-fixed">
    <div class="teacher-profile py-4">
      <div class="container">
        <div class="card-header text-center">
          <h3>Profile Pengajar</h3>
          <br>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="card shadow-sm">
              <div class="card-header bg-transparent text-center">
                <!-- Fetch and display student profile picture, name, and username --> <?php // Your existing code for fetching and displaying student profile picture, name, and username ?> <img class="rounded-circle" src="https://shorturl.at/s0379" alt="Profile">
                <h3> <?php echo $teacher['teachername'];?> </h3>
                <a href="edit\_teacher\_profile.php" class="btn btn-primary">Edit Profile</a>
              </div>
              <div class="card-body">
                <p class="mb-0">
                  <strong class="pr-1">Username: </strong> <?php echo $teacher['teacherusername']; ?>
                </p>
                <p class="mb-0">
                  <strong class="pr-1">ID Pengajar: </strong> <?php echo $teacher_id; ?>
                </p>
                <p class="mb-0">
                  <strong class="pr-1">Email: </strong> <?php echo $teacher['teacheremail']; ?>
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <!-- maklumat peribadi -->
            <div class="card shadow-sm">
              <div class="card-header bg-transparent border-0">
                <h3 class="mb-0">
                  <i class="far fa-clone pr-1"></i>Maklumat Peribadi
                </h3>
              </div>
              <div class="card-body pt-0">
                <table class="table table-bordered">
                  <tr>
                    <th width="30%">Nama Penuh</th>
                    <td width="2%">:</td>
                    <td> <?php echo htmlspecialchars($teacher['teachername']); ?> </td>
                  </tr>
                  <tr>
                    <th width="30%">Alamat Rumah</th>
                    <td width="2%">:</td>
                    <td> <?php echo htmlspecialchars($teacher['teacheraddress']); ?> </td>
                  </tr>
                  <tr>
                    <th width="30%">No. Telefon</th>
                    <td width="2%">:</td>
                    <td> <?php echo htmlspecialchars($teacher['teacherphoneno']); ?> </td>
                  </tr>
                  <tr>
                    <th width="30%">Email</th>
                    <td width="2%">:</td>
                    <td> <?php echo htmlspecialchars($teacher['teacheremail']); ?> </td>
                  </tr>
                </table>
              </div>
            </div>
            <br>
            <!-- kualifikasi-->
            <div class="card shadow-sm">
              <div class="card-header bg-transparent border-0">
                <h3 class="mb-0">
                  <i class="far fa-clone pr-1"></i>Maklumat Bank
                </h3>
              </div>
              <div class="card-body pt-0">
                <table class="table table-bordered">
                  <tr>
                    <th width="30%">Nama Bank</th>
                    <td width="2%">:</td>
                    <td> <?php echo htmlspecialchars($teacher['teacherbank']); ?> </td>
                  </tr>
                  <tr>
                    <th width="30%">No. Akaun Bank</th>
                    <td width="2%">:</td>
                    <td> <?php echo htmlspecialchars($teacher['teacheraccountno']); ?> </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  </body>
</html>