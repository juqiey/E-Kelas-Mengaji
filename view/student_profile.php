<!DOCTYPE html>
<html lang="en">
  <head> 
        <?php
            $title="Profile Pelajar";
            require '../global/header.php';
        ?>
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
                        <img class="rounded-circle" src="https://shorturl.at/s0379" alt="Profile">
                        <h3>Khalil Wahid</h3>
                        <a href="edit_student_profile.php" class="btn btn-primary">Edit Profile</a>
                    </div>
                    <div class="card-body">
                      <p class="mb-0">
                        <strong class="pr-1">Username: </strong>khalilwahid
                      </p>
                      <p class="mb-0">
                        <strong class="pr-1">ID Pelajar: </strong>321000001
                      </p>
                      <p class="mb-0">
                        <strong class="pr-1">Kelas: </strong>4
                      </p>
                      <p class="mb-0">
                        <strong class="pr-1">Tahap: </strong>Al-Quran
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
                          <td>Khalil Bin Wahid</td>
                        </tr>
                        <tr>
                          <th width="30%">Tarikh Lahir</th>
                          <td width="2%">:</td>
                          <td>27/12/2009</td>
                        </tr>
                        <tr>
                          <th width="30%">Jantina</th>
                          <td width="2%">:</td>
                          <td>Lelaki</td>
                        </tr>
                        <tr>
                          <th width="30%">Alamat Rumah</th>
                          <td width="2%">:</td>
                          <td>Miami, Terengganu</td>
                        </tr>
                        <tr>
                          <th width="30%">No. Telefon</th>
                          <td width="2%">:</td>
                          <td>010-123 4567</td>
                        </tr>
                        <tr>
                          <th width="30%">Email</th>
                          <td width="2%">:</td>
                          <td>khalilwahid@gmail.com</td>
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
                          <td>Wahid Bin Md Aziz</td>
                        </tr>
                        <tr>
                          <th width="30%">No. Telefon</th>
                          <td width="2%">:</td>
                          <td>010-123 4567</td>
                        </tr>
                        <tr>
                          <th width="30%">Email</th>
                          <td width="2%">:</td>
                          <td>wahid@gmail.com</td>
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