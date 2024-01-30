<!DOCTYPE html>
<?
    session_start();
    require '../global/session_check.php';
    require '../model/user_function.php';

    $teacher_id = $_SESSION['id'];
    $teacher_data = viewTeacher($teacher_id)->fetch_assoc();
?>
<html lang="en">
  <head> <?php
            $title="Edit Profile Pengajar";
            require '../global/header.php';
        ?>
    <link href="../resources/main.css" rel="stylesheet" />
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

      .account-settings .user-profile h6.user-email {
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
  <body class="sb-nav-fixed"> <?php
        require '../global/navigation_header.php';
    ?> <div id="layoutSidenav"> <?php
            require '../global/sidebar.php';
        ?> <div id="layoutSidenav_content">
        <main>
          <!-- Edit Teacher Profile -->
          <div class="teacher-profile py-4">
            <div class="container">
              <div class="card-header text-center">
                <h3>Edit Profile Pengajar</h3>
              </div>
              <br>
              <div class="container">
              <form action="../controller/update_teacher_exec.php" method="post" enctype="multipart/form-data">
                <div class="row gutters">
                  <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                      <div class="card-body">
                        <div class="account-settings">
                          <div class="user-profile">
                            <?
                              $profileurl=$teacher_data['teacherurl'];
                              if($teacher_data['teacherurl']==null){
                              $profileurl="default.jpg";
                              }
                            ?>
                            <img class="image-cover" src="../img/<? echo $profileurl ?>" alt="Profile">
                            <h5 class="user-name">
                              <?php echo $teacher_data['teachername']; ?>
                            </h5>
                            <div class="card-body" style="text-align: left">
                              <p class="mb-0">
                                <strong class="pr-1">Username: </strong>
                                <?php echo $teacher_data['teacherusername']; ?>
                              </p>
                              <p class="mb-0">
                                <strong class="pr-1">Email: </strong>
                                <?php echo $teacher_data['teacheremail']; ?>
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
                            <h6 class="mb-2 text-primary">Maklumat Pengajar</h6>
                          </div>
                          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <label for="fullName">Nama Penuh</label>
                              <input type="text" class="form-control" id="teachername" name="teachername"
                              value="<?php echo $teacher_data['teachername']; ?>">
                            </div>
                          </div>
                          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                              <label for="gender">Jantina</label>
                              <div>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="teachergender" id="teachergender-lelaki" value="Lelaki"
                                          <?php if ($teacher_data['teachergender'] == 'Lelaki') echo 'checked'; ?>>
                                      <label class="form-check-label" for="teachergender-lelaki">Lelaki</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="teachergender" id="teachergender-perempuan" value="Perempuan"
                                          <?php if ($teacher_data['teachergender'] == 'Perempuan') echo 'checked'; ?>>
                                      <label class="form-check-label" for="teachergender-perempuan">Perempuan</label>
                                  </div>
                              </div>
                          </div>
                          </div>
                          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <label for="phone">No. Telefon</label>
                              <input type="text" class="form-control" id="phone" name="teacherphoneno"
                              value="<?php echo $teacher_data['teacherphoneno']; ?>">
                            </div>
                          </div>
                          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <label for="teacheremail">Email</label>
                              <input type="text" name="teacheremail" class="form-control" id="teacheremail"
                              value="<?php echo $teacher_data['teacheremail']; ?>">
                            </div>
                          </div>
                        </div> <br>

                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-6 col-12">
                                <h6 class="mt-3 mb-2 text-primary">Alamat Tempat Tinggal</h6>
                                
                            </div>
                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                <label for="address">Alamat Penuh </label>
                                <input type="text" class="form-control" id="address" name="teacheraddress"
                                value="<?php echo $teacher_data['teacheraddress']; ?>">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                <label for="poskod">Poskod</label>
                                <input type="number" class="form-control" id="poskod" name="teacherposkod"
                                value="<?php echo $teacher_data['teacherposkod']; ?>">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                <label for="city">Bandar</label>
                                <input type="text" class="form-control" id="city"
                                value="<?php echo $teacher_data['teachercity']; ?>">
                                </div>
                            </div>
                        </div> <br>

                        <div class="row gutters">
                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mt-3 mb-2 text-primary">Maklumat Bank</h6>
                          </div>
                          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                            <label for="bank">Nama Bank</label>
                                <select id="bank" name="teacherbank" class="form-control">
                                    <? echo getDropdownBank($teacher['teacherbank']) ?>
                                </select>
                            </div>
                          </div>
                          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <label for="noacc">No. Akaun Bank</label>
                              <input type="text" name="teacheraccountno" class="form-control" id="accountno"
                              value="<?php echo $teacher_data['teacheraccountno']; ?>">
                            </div>
                          </div>
                        </div> <br>

                        <div class="row gutters">
                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="text-right">
                              <a href="edit_teacher_profile.php" class="btn btn-secondary">Cancel</a>
                              <input type="hidden" name="teacherid" id="teacher_id" value="<?php echo $teacher_data['teacherid']; ?>">
                              <button type="submit" class="btn btn-primary">Update</button>                            </div>
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
    </div> <?php
            require '../global/script.php'
        ?> </body>
</html>