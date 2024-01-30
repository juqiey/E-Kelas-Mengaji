<?php
require '../model/profile_function.php';

//check role that are not authorized
$non_authorize = ['2','1'];
blockAccess($non_authorize);

// Get the student ID from the URL parameter
$student_id = isset($_GET['id']) ? intval($_GET['id']) : 2;

// Fetch the student profile using the getstudentProfile function
$student = getStudentProfile($student_id);

// Check if the student profile exists
if ($student) {
  // Display the student profile
} else {
  // Display an error message
  echo "Error: student not found.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $title = "Profile Pelajar";
  require '../global/header.php';
  ?>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Pelajar</title>
  <link href="../resources/main.css" rel="stylesheet" />
  <style>
    .student-profile .card {
      border-radius: 10px;
    }

    .student-profile .card .card-header .profile_img {
      width: 150px;
      height: 150px;
      object-fit: cover;
      margin: 10px auto;
      border: 10px solid #ccc;
      border-radius: 50%;
    }

    .student-profile .card h3 {
      font-size: 20px;
      font-weight: 700;
    }

    .student-profile .card p {
      font-size: 16px;
      color: #000;
    }

    .student-profile .table th,
    .student-profile .table td {
      font-size: 14px;
      padding: 5px 10px;
      color: #000;
    }
  </style>
</head>

<body class="sb-nav-fixed">
  <?php
  require '../global/navigation_header.php';
  ?>
  <div id="layoutSidenav">
    <?php
    require '../global/sidebar.php';
    ?>
    <div id="layoutSidenav_content">
      <main>
        <!-- Student Profile -->
        <div class="student-profile py-4">
          <div class="container">
            <div class="card-header text-center">
              <h3>Profile Pelajar</h3>
              <br>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="card shadow-sm">
                  <div class="card-header bg-transparent text-center">
                    <!-- Fetch and display student profile picture, name, and username -->
                    <?php
                    // Your existing code for fetching and displaying student profile picture, name, and username
                    ?>
                    <!-- <img class="rounded-circle" src="https://shorturl.at/s0379" alt="Profile"> -->
                    <img class="rounded-circle" src="<?php echo htmlspecialchars($student['profileurl']); ?>" alt="Profile">
                    <h3>
                      <?php echo $student['studentname']; ?>
                    </h3>
                    <?php
                    ?>
                    <a href="edit_student_profile.php" class="btn btn-primary">Edit Profile</a>
                  </div>
                  <div class="card-body">
                    <!-- Display other student information -->
                    <p class="mb-0">
                      <strong class="pr-1">Username: </strong>
                      <?php echo $student['studentusername']; ?>
                    </p>
                    <p class="mb-0">
                      <strong class="pr-1">ID Pelajar: </strong>
                      <?php echo $student_id; ?>
                    </p>
                    <p class="mb-0">
                      <strong class="pr-1">Kelas: </strong>
                      <?php echo $student['studentclass']; ?>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-8">
                <!-- pelajar -->
                <div class="card shadow-sm">
                  <div class="card-header bg-transparent border-0">
                    <h3 class="mb-0">
                      <i class="far fa-clone pr-1"></i>Maklumat Pelajar
                    </h3>
                  </div>
                  <div class="card-body pt-0">
                    <table class="table table-bordered">
                      <tr>
                        <th width="30%">Nama Penuh</th>
                        <td width="2%">:</td>
                        <td><?php echo htmlspecialchars($student['studentname']); ?></td>
                      </tr>
                      <tr>
                        <th width="30%">Tarikh Lahir</th>
			<td width="2%">:</td>
                        <td><?php echo htmlspecialchars($student['studentbirth']); ?></td>
                      </tr>
                      <tr>
                        <th width="30%">Jantina</th>
                        <td width="2%">:</td>
                        <td><?php echo htmlspecialchars($student['studentgender']); ?></td>
                      </tr>
                      <tr>
                        <th width="30%">Alamat Rumah</th>
                        <td width="2%">:</td>
                        <td><?php echo htmlspecialchars($student['studentaddress']); ?></td>
                      </tr>
                      <tr>
                        <th width="30%">No. Telefon</th>
                        <td width="2%">:</td>
                        <td><?php echo htmlspecialchars($student['studentnum']); ?></td>
                      </tr>
                      <tr>
                        <th width="30%">Email</th>
                        <td width="2%">:</td>
                        <td><?php echo htmlspecialchars($student['studentemail']); ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <br>
                <!-- ibubapa/penjaga -->
                <div class="card shadow-sm">
                  <div class="card-header bg-transparent border-0">
                    <h3 class="mb-0">
                      <i class="far fa-clone pr-1"></i>Maklumat Ibu Bapa/Penjaga
                    </h3>
                  </div>
                  <div class="card-body pt-0">
                    <table class="table table-bordered">
                      <tr>
                        <th width="30%">Nama Ibu/Bapa/Penjaga</th>
                        <td width="2%">:</td>
                        <td><?php echo htmlspecialchars($student['parentsname']); ?></td>
                      </tr>
                      <tr>
                        <th width="30%">No. Telefon</th>
                        <td width="2%">:</td>
                        <td><?php echo htmlspecialchars($student['parentsnum']); ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
  <?php
  require '../global/script.php'
    ?>
</body>

</html>
