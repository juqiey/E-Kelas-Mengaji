<?php
session_start();

/*// Check if the user is already logged in, if yes then redirect to the welcome page
if (isset($_SESSION["auth"]) && $_SESSION["auth"] === true) {
    header("location: dashboard_teacher.php");
    exit;
}*/

session_destroy();

$navname = "login";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Login";
    require '../global/header.php';
    ?>
    <link href="../resources/styles.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function toggleRoleRadio(role) {
            var roleDiv = document.getElementById('roleDiv');
            var studentTab = document.querySelector('#student');
            var staffTab = document.querySelector('#staff');
            var userRoleInput = document.querySelector('#userRole');

            if (role === 'student') {
                roleDiv.style.display = 'none';
                studentTab.classList.add('active');
                staffTab.classList.remove('active');
                userRoleInput.value = '3'; // Set to 3 for 'Admin'
            } else if (role === 'staff') {
                roleDiv.style.display = 'block';
                staffTab.classList.add('active');
                studentTab.classList.remove('active');
                userRoleInput.value = '2'; // Set to 2 for 'Pengajar'
            }
        }

        $(document).ready(function () {
            $('input[name="userRole"]').on('change', function () {
                $('#userRole').val($('input[name="userRole"]:checked').val());
            });

            $('#show_password').on('change', function () {
                $('#password').attr('type', $('#show_password').prop('checked') === true ? "text" : "password");
            });

            // Set default value if no radio button is selected
            if ($('input[name="userRole"]:checked').length === 0) {
                $('#userRole').val('1'); // Set to 1 for default value
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
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <ul class="nav nav-pills navtab-bg nav-justified">
                                <li class="nav-item">
                                    <a id="student" href="#student" data-toggle="tab" aria-expanded="false"
                                       class="nav-link active" onclick="toggleRoleRadio('student')"> PELAJAR </a>
                                </li>
                                <li class="nav-item">
                                    <a id="staff" href="#staff" data-toggle="tab" aria-expanded="true"
                                       class="nav-link" onclick="toggleRoleRadio('staff')"> PEKERJA </a>
                                </li>
                            </ul>

                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Daftar</h3>
                            </div>

                            <div class="card-body">
                                <form method="post" action="../controller/login_exec.php">
                                    <div id="roleDiv" class="form-group text-center">
                                        <!-- Radio buttons for user role -->
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="userRole" id="adminCheckbox" value="2" required="required" checked>
                                            <label class="form-check-label"> Admin </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="userRole" id="teacherCheckbox" value="1" required="required">
                                            <label class="form-check-label"> Pengajar </label>
                                        </div>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="email" class="form-control" id="username" placeholder="Emel" required autofocus>
                                        <label for="inputEmail">Alamat Emel</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required autofocus>
                                        <label for="inputPassword">Kata Laluan</label>
                                    </div>

                                    <div class="form-check mb-3">
                                        <input class="form-check-input" id="inputRememberPassword" name="inputRememberPassword" type="checkbox" value="" />
                                        <label class="form-check-label" for="inputRememberPassword">Ingat Kata Laluan</label>
                                    </div>

                                    <input type="hidden" name="userRole" id="userRole" value="3" />

                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <a class="small" href="password.php">Lupa Kata Laluan?</a>
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small">
                                    <a href="register.php">Anda tiada akaun? Daftar sekarang!</a>
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
require '../global/script.php';
?>
</body>

</html>
