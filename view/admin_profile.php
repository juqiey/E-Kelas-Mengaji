<!DOCTYPE html>
<html lang="en">
  <head> 
        <?php
            $title="Profile Admin";
            require '../global/header.php';
        ?> <style>
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
  <body> <?php
        require '../global/navigation_header.php';
    ?> <div id="layoutSidenav"> <?php
            require '../global/sidebar.php';
        ?> <div id="layoutSidenav_content">
        <main id="main" class="main">
          <!-- Admin Profile -->
          <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Profile</li>
              </ol>
            </nav>
          </div>
          <!-- End Page Title -->
          <section class="section profile">
            <div class="row">
              <div class="col-xl-4">
                <div class="card">
                  <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    <img src="https://shorturl.at/s0379" class="rounded-circle" alt="Profile">
                    <h2>Kevin Anderson</h2>
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
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                      </li>
                      <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                      </li>
                      <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                      </li>
                      <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                      </li>
                    </ul>

                    <div class="tab-content pt2">
                      <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        <br>
                        <!-- <h5 class="card-title">About</h5> -->
                        <!-- <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p> -->
                        <h5 class="card-title">Profile Details</h5>
                        <div class="row">
                          <div class="col-lg-3 col-md-4 label ">Full Name</div>
                          <div class="col-lg-9 col-md-8">Kevin Anderson</div>
                        </div>
                        <div class="row">
                          <div class="col-lg-3 col-md-4 label">Job</div>
                          <div class="col-lg-9 col-md-8">Admin</div>
                        </div>
                        <div class="row">
                          <div class="col-lg-3 col-md-4 label">Address</div>
                          <div class="col-lg-9 col-md-8">A108 Adam Street, New York, NY 535022</div>
                        </div>
                        <div class="row">
                          <div class="col-lg-3 col-md-4 label">Phone</div>
                          <div class="col-lg-9 col-md-8">(436) 486-3538 x29071</div>
                        </div>
                        <div class="row">
                          <div class="col-lg-3 col-md-4 label">Email</div>
                          <div class="col-lg-9 col-md-8">k.anderson@example.com</div>
                        </div>
                      </div>
                      <div class="tab-pane fade profile-edit pt3" id="profile-edit">
                        <br>
                        <!-- Profile Edit Form -->
                        <form>
                          <div class="row mb-3">
                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="fullName" type="text" class="form-control" id="fullName" value="Kevin Anderson">
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                            <div class="col-md-8 col-lg-9">
                              <textarea name="about" class="form-control" id="about" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="company" type="text" class="form-control" id="company" value="Lueilwitz, Wisoky and Leuschke">
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="job" type="text" class="form-control" id="Job" value="Web Designer">
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="country" type="text" class="form-control" id="Country" value="USA">
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="address" type="text" class="form-control" id="Address" value="A108 Adam Street, New York, NY 535022">
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="address" type="text" class="form-control" id="Address" value="A108 Adam Street, New York, NY 535022">
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="email" type="email" class="form-control" id="Email" value="k.anderson@example.com">
                            </div>
                          </div>
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                          </div>
                        </form>
                      </div>
                      <!-- End Profile Edit Form -->
                      <div class="tab-pane fade pt-3" id="profile-settings">
                        <!-- Settings Form -->
                        <form>
                          <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                            <div class="col-md-8 col-lg-9">
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="changesMade" checked>
                                <label class="form-check-label" for="changesMade"> Changes made to your account </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="newProducts" checked>
                                <label class="form-check-label" for="newProducts"> Information on new products and services </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="proOffers">
                                <label class="form-check-label" for="proOffers"> Marketing and promo offers </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                                <label class="form-check-label" for="securityNotify"> Security alerts </label>
                              </div>
                            </div>
                          </div>
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                          </div>
                        </form>
                        <!-- End settings Form -->
                      </div>
                      <div class="tab-pane fade pt-3" id="profile-settings">
                        <!-- Settings Form -->
                        <form>
                          <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                            <div class="col-md-8 col-lg-9">
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="changesMade" checked>
                                <label class="form-check-label" for="changesMade"> Changes made to your account </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="newProducts" checked>
                                <label class="form-check-label" for="newProducts"> Information on new products and services </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="proOffers">
                                <label class="form-check-label" for="proOffers"> Marketing and promo offers </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                                <label class="form-check-label" for="securityNotify"> Security alerts </label>
                              </div>
                            </div>
                          </div>
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                          </div>
                        </form>
                        <!-- End settings Form -->
                      </div>
                      <div class="tab-pane fade pt-3" id="profile-change-password">
                        <!-- Change Password Form -->
                        <form>
                          <div class="row mb-3">
                            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="password" type="password" class="form-control" id="currentPassword">
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="newpassword" type="password" class="form-control" id="newPassword">
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                            </div>
                          </div>
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary">Change Password</button>
                          </div>
                        </form>
                        <!-- End Change Password Form -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </main>
      </div>
    </div> <?php
        require '../global/script.php'
    ?> </body>
</html>