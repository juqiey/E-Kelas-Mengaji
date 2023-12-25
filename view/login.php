<!DOCTYPE html>
<html lang="en">
  <head>
    <?
        $title="Login";
        require '../global/header.php';
    ?>
    <link href="../resources/styles.css" rel="stylesheet" />
  </head>
  <body class="bg-primary">
    <div id="layoutAuthentication">
      <div id="layoutAuthentication_content">
        <main>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                  <ul class="nav nav-pills navtab-bg nav-justified">
                    <li class="nav-item">
                      <a href="#student" data-toggle="tab" aria-expanded="false" class="nav-link active"> STUDENT </a>
                    </li>
                    <li class="nav-item">
                      <a href="#staff" data-toggle="tab" aria-expanded="true" class="nav-link"> STAFF </a>
                    </li>
                  </ul>
                  <br>
                  <div class="tab-content">
                    <form action="/login" class="form-horizontal" id="StaffForm" autocomplete="off" method="post" accept-charset="utf-8">
                      
                        <div class="form-group text-center">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="data[User][role]" id="adminCheckbox" value="2" required="required" checked>
                            <label class="form-check-label"> Admin </label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="data[User][role]" id="teacherCheckbox" value="1" required="required">
                            <label class="form-check-label"> Teacher </label>
                          </div>
                        </div>

                    </form>
                  </div>
                  <!-- <form action="/login" class="form-horizontal" id="uitmUserForm" autocomplete="off" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST" /></div><div class="form-group text-center"><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="data[User][role]" id="staffCheckbox" value="2" required="required" checked><label class="form-check-label"> Staff </label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="data[User][role]" id="studCheckbox" value="1" required="required"><label class="form-check-label"> Student </label></div></div> -->
                  <br>
                  <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Login</h3>
                  </div>
                  <div class="card-body">
                    <form method="post" action="login.php">
                      <div class="form-floating mb-3">
                        <input class="form-control" id="inputEmail" name="inputEmail" type="email" placeholder="name@example.com" />
                        <label for="inputEmail">Email address</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input class="form-control" id="inputPassword" name="inputPassword" type="password" placeholder="Password" />
                        <label for="inputPassword">Password</label>
                      </div>
                      <div class="form-check mb-3">
                        <input class="form-check-input" id="inputRememberPassword" name="inputRememberPassword" type="checkbox" value="" />
                        <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                      </div>
                      <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <a class="small" href="password.php">Forgot Password?</a>
                        <button type="submit" class="btn btn-primary">Login</button>
                      </div>
                    </form>
                  </div>
                  <div class="card-footer text-center py-3">
                    <div class="small">
                      <a href="register.php">Need an account? Sign up!</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
      <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
          <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
              <div class="text-muted">Copyright &copy; Your Website <?php echo date("Y"); ?> </div>
              <div>
                <a href="#">Privacy Policy</a> &middot; <a href="#">Terms &amp; Conditions</a>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <?
        require '../global/script.php';
    ?>
  </body>
</html>