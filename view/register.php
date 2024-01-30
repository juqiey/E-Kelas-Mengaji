<!DOCTYPE html>
<html lang="en">
    <head>
    <?php
        $title="Register";
        require '../global/header.php';
    ?>
    <script>
    document.getElementById('registerForm').addEventListener('submit', function(event) {
      // get the values of the new password and confirm password fields
      var newPassword = document.getElementById('newPassword').value;
      var confirmPassword = document.getElementById('confirmPassword').value;

      // check if the new password and confirm password match
      if (newPassword !== confirmPassword) {
        // display an error message
        alert('The new password and confirm password do not match.');
        event.preventDefault(); // prevent the form from being submitted
      }
    });
    </script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Cipta Akaun Baru</h3></div>
                                    <div class="card-body">
                                        <form>
                                            <div class="row mb-3">
                                            <h3 class="text-left font-weight-light mb-3">Maklumat Pelajar</h3>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Nama Penuh</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" type="date" placeholder="" />
                                                        <label for="birthdate">Tarikh Lahir</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputgender" type="text" placeholder="" />
                                                        <label for="inputgender">Jantina</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="phone" type="tel" placeholder="" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"/>
                                                        <label for="phone">No. Telefon</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputAddress" type="text" placeholder="" />
                                                <label for="inputAddress">Alamat Penuh</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="poskod" type="number" placeholder="" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"/>
                                                        <label for="poskod">Poskod</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="city" type="text" placeholder="" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"/>
                                                        <label for="city">Bandar</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" type="password" placeholder="Create a password" />
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm password" required>
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                            <h3 class="text-left font-weight-light my-4">Maklumat Ibu/Bapa/Penjaga</h3>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Nama Penuh</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="phone" type="tel" placeholder="" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"/>
                                                        <label for="phone">No. Telefon</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><a class="btn btn-primary btn-block" href="login.php">Daftar</a></div>
                                            </div>
                                        </form>
                                        <form id="registerForm" method="post" action="register_exec.php"></form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">Mempunyai akaun? Pergi ke login</a></div>
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
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
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
