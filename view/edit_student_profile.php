<?php
  require '../model/profile_function.php';

  $student_id = 2;
  $student_data = getStudentProfile($student_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  $title = "Edit Profile Pelajar";
  require '../global/header.php';
  ?>
  <link href="../resources/main.css" rel="stylesheet" />
  <script src="../js/updateStudentProfile.js"></script>
  <form id="updateStudentForm" method="post" action="update_student_profile.php">

  <style>
    .account-settings .user-profile {
      margin: 0 0 1rem 0;
      padding-bottom: 1rem;
      text-align: center;
    }

    .profile_img {
      width: 150px;
      height: 150px;
      object-fit: cover;
      margin: 10px auto;
      border: 10px solid #ccc;
      border-radius: 50%;
    }

    .account-settings .user-profile .user-avatar {
      margin: 0 0 1rem 0;
    }

    .account-settings .user-profile .user-avatar img {
      width: 90px;
      height: 90px;
      -webkit-border-radius: 100px;
      -moz-border-radius: 100px;
      border-radius: 100px;
    }

    .account-settings .user-profile h5.user-name {
      margin: 0 0 0.5rem 0;
    }

    .account-settings .user-profile h6.user-studentemail {
      margin: 0;
      font-size: 0.8rem;
      font-weight: 400;
      color: #9fa8b9;
    }

    .account-settings .about {
      margin: 2rem 0 0 0;
      text-align: center;
    }

    .account-settings .about h5 {
      margin: 0 0 15px 0;
      color: #007ae1;
    }

    .account-settings .about p {
      font-size: 0.825rem;
    }

    .form-control {
      border: 1px solid #cfd1d8;
      -webkit-border-radius: 2px;
      -moz-border-radius: 2px;
      border-radius: 2px;
      font-size: .825rem;
      background: #ffffff;
      color: #2e323c;
    }

    .card {
      background: #ffffff;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
      border-radius: 5px;
      border: 0;
      margin-bottom: 1rem;
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
        <!-- Edit Student Profile -->
        <div class="student-profile py-4">
          <div class="container">
            <div class="card-header text-center">
              <h3>Edit Profile Pelajar</h3>
            </div>
            <br>
            <div class="container">
              <div class="row gutters">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                  <div class="card h-100">
                    <div class="card-body">
                      <div class="account-settings">
                        <div class="user-profile">
                          <img class="rounded-circle" src="https://shorturl.at/s0379" alt="Profile">
                          <h5 class="user-name">
                            <?php echo $student_data['studentname']; ?>
                          </h5>
                          <div class="card-body" style="text-align: left">
                            <p class="mb-0">
                              <strong class="pr-1">Username: </strong>
                              <?php echo $student_data['studentusername']; ?>
                            </p>
                            <p class="mb-0">
                              <strong class="pr-1">ID Pelajar: </strong>
                              <?php echo $student_data['studentid']; ?>
                            </p>
                            <p class="mb-0">
                              <strong class="pr-1">Kelas: </strong>
                              <?php echo $student_data['studentclass']; ?>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                  <div class="card h-100">
                    <div class="card-body">
                      <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                          <h6 class="mb-2 text-primary">Maklumat Pelajar</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <label for="studentname">Nama Penuh</label>
                            <input type="text" class="form-control" id="studentname"
                              value="<?php echo $student_data['studentname']; ?>">
                          </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <label for="birthdate">Tarikh Lahir</label>
                            <input type="date" class="form-control" id="birthdate"
                              value="<?php echo $student_data['studentbirth']; ?>">
                          </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <label for="gender">Jantina</label>
                            <input type="text" class="form-control" id="gender"
                              value="<?php echo $student_data['studentgender']; ?>">
                          </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <label for="phone">No. Telefon</label>
                            <input type="tel" class="form-control" id="phone"
                              value="<?php echo $student_data['studentnum']; ?>">
                          </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <label for="studentemail">studentemail</label>
                            <input type="studentemail" class="form-control" id="studentemail"
                              value="<?php echo $student_data['studentstudentemail']; ?>">
                          </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="form-group">
                            <label for="address">Alamat Penuh </label>
                            <input type="" class="form-control" id="address"
                              value="<?php echo $student_data['studentaddress']; ?>">
                          </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <label for="poskod">Poskod</label>
                            <input type="number" class="form-control" id="poskod"
                              value="<?php echo $student_data['studentposkod']; ?>">
                          </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <label for="city">Bandar</label>
                            <input type="text" class="form-control" id="city"
                              value="<?php echo $student_data['studentcity']; ?>">
                          </div>
                        </div> <br>

                        <div class="row gutters">
                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mt-3 mb-2 text-primary">Maklumat Ibu/Bapa/Penjaga</h6>
                          </div>
                          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <label for="studentname">Nama Penuh</label>
                              <input type="text" class="form-control" id="studentname" placeholder=""
                                value="<?php echo $student_data['parentsname'] ?>">
                            </div>
                          </div>
                          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <label for="phone">No. Telefon</label>
                              <input type="tel" class="form-control" id="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                                value="<?php echo $student_data['parentsnum'] ?>">
                            </div>
                          </div>
                        </div> <br>

                        <div class="row gutters">
                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mt-3 mb-2 text-primary">Update New Password</h6>
                          </div>
                          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <label for="newPassword">New Password</label>
                              <input type="password" class="form-control" id="newPassword"
                                placeholder="Enter new password">
                            </div>
                          </div>
                          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <label for="confirmPassword">Confirm Password</label>
                              <input type="password" class="form-control" id="confirmPassword"
                                placeholder="Confirm new password">
                            </div>
                          </div>
                        </div> <br>

                        <div class="row gutters">
                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="text-right">
                              <a href="edit_student_profile.php" class="btn btn-secondary">Cancel</a>
                              <form id="updateStudentForm" class="btn">
                                <input type="hidden" id="student_id" value="<?php echo $student_data['studentid']; ?>">
                                <button type="submit" class="btn btn-primary">Update</button>
                              </form>
                              <button type="button" class="btn btn-warning" id="updatePassword">Update Password</button>
                            </div>
                          </div>
                        </div>
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