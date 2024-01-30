<?php
require '../model/admin_function.php';

$admin_id = 2;
$admin_data = viewAdmin($admin_id)->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $title = "Profile Admin";
  require '../global/header.php';
  ?>
  <style>
    #main {
      /* margin-top: 60px; */
      padding: 20px 30px;
      transition: all 0.3s;
    }

    @media (max-width: 1199px) {
      #main {
        padding: 20px;
      }
    }

    .pagetitle {
      margin-bottom: 10px;
    }

    .pagetitle h1 {
      font-size: 24px;
      margin-bottom: 0;
      font-weight: 600;
      color: #012970;
    }

    .profile .profile-card img {
      max-width: 120px;
    }

    .profile .profile-card h2 {
      font-size: 24px;
      font-weight: 700;
      color: #2c384e;
      margin: 10px 0 0 0;
    }

    .profile .profile-card h3 {
      font-size: 18px;
    }

    .profile .profile-card .social-links a {
      font-size: 20px;
      display: inline-block;
      color: rgba(1, 41, 112, 0.5);
      line-height: 0;
      margin-right: 10px;
      transition: 0.3s;
    }

    .profile .profile-card .social-links a:hover {
      color: #012970;
    }

    .profile .profile-overview .row {
      margin-bottom: 20px;
      font-size: 15px;
    }

    .profile .profile-overview .card-title {
      color: #012970;
    }

    .profile .profile-overview .label {
      font-weight: 600;
      color: rgba(1, 41, 112, 0.6);
    }

    .profile .profile-edit label {
      font-weight: 600;
      color: rgba(1, 41, 112, 0.6);
    }

    .profile .profile-edit img {
      max-width: 120px;
    }
  </style>
</head>

<body>
  <?php
  require '../global/navigation_header.php';
  ?>
  <div id="layoutSidenav">
    <?php
    require '../global/sidebar.php';
    ?>
    <div id="layoutSidenav_content">
      <main id="main" class="main">
        <!-- Admin Profile -->
        <div class="pagetitle">
        <h1>Profile Admin</h1>
        </div>
        <section class="section profile">
          <div class="row">
            <div class="col-xl-4">
              <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                  <?
                  $profileurl = $admin_data['adminurl'];
                  if ($admin_data['adminurl'] == null) {
                    $profileurl = "default.jpg";
                  }
                  ?>
                  <img class="image-cover" src="../img/<? echo $profileurl ?>" alt="Profile">
                  <h2>  <?php echo $admin_data['adminusername']; ?> </h2>
                  <h3>Admin</h3> <br>
                </div>
              </div>
            </div>
            <div class="col-xl-8">
              <div class="card">
                <div class="card-body pt3">

                  <!-- Bordered Tabs -->
                  <ul class="nav nav-tabs nav-tabs-bordered">
                    <li class="nav-item">
                      <button class="nav-link active" data-bs-toggle="tab"
                        data-bs-target="#profile-overview">Overview</button>
                    </li>
                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile Admin</button>
                    </li>
                  </ul>

                  <div class="tab-content pt2">
                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                      <br>
                      <h5 class="card-title">Maklumat Admin</h5>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Nama Penuh</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $admin_data['adminname']; ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Alamat</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $admin_data['adminaddress']; ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Poskod</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $admin_data['adminposkod']; ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Bandar</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $admin_data['admincity']; ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">No. Telefon</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $admin_data['adminphone']; ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Emel</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $admin_data['adminemail']; ?>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade profile-edit pt3" id="profile-edit">
                      <br>
                      <!-- Profile Edit Form -->
                      <form>
                        <div class="row mb-3">
                          <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Nama Penuh</label>
                          <div class="col-md-8 col-lg-9">
                          <input type="text" class="form-control" id="adminname" name="adminname"
                          value="<?php echo $admin_data['adminname']; ?>">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label for="Address" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                          <div class="col-md-8 col-lg-9">
                            <input type="text" class="form-control" id="address" name="adminaddress"
                            value="<?php echo $admin_data['adminaddress']; ?>">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label for="Address" class="col-md-4 col-lg-3 col-form-label">Poskod</label>
                          <div class="col-md-8 col-lg-9">
                            <input type="text" class="form-control" id="poskod" name="adminposkod"
                            value="<?php echo $admin_data['adminaddress']; ?>">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label for="Address" class="col-md-4 col-lg-3 col-form-label">Bandar</label>
                          <div class="col-md-8 col-lg-9">
                            <input type="text" class="form-control" id="city" name="admincity"
                            value="<?php echo $admin_data['admincity']; ?>">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                          <div class="col-md-8 col-lg-9">
                          <input type="text" class="form-control" id="adminemail" name="adminemail"
                            value="<?php echo $admin_data['adminemail']; ?>">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label for="Email" class="col-md-4 col-lg-3 col-form-label">No. Telefon</label>
                          <div class="col-md-8 col-lg-9">
                            <input type="text" class="form-control" id="phone" name="adminphone"
                            value="<?php echo $admin_data['adminphone']; ?>">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label for="profileurl" class="col-md-4 col-lg-3 col-form-label">Gambar Profile</label>
                          <div class="col-md-8 col-lg-9">
                            <input type="file" name="profileurl" id="img" class="form-control" accept=".jpg,.jpeg,.png,.gif">
                          </div>
                        </div>
                        <div class="text-center">
                          <input type="hidden" name="adminid" id="admin_id" value="<?php echo $admin_data['adminid']; ?>">
                          <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                      </form>
                    </div>
                    <!-- End Profile Edit Form -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
    </div>
  </div>
  <?php
  require '../global/script.php'
    ?>
</body>

</html>