<?
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["auth"]) && $_SESSION["auth"] === true) {
    header("location: test.php");
    exit;
}
session_destroy();
$navname = "login";
?>

<?php
require_once 'C:\Users\softphea\E-Kelas-Mengaji\db\config.php';

// Check if the user has submitted the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user's input
    $email = $_POST['inputEmail'];
    $password = $_POST['inputPassword'];
    $userRole = $_POST['userRole'];

    // Determine the table based on the user role
    $tableName = '';
    switch ($userRole) {
        case 'student':
            $tableName = 'student';
            break;
        case 'admin':
            $tableName = 'admin';
            break;
        case 'teacher':
            $tableName = 'teacher';
            break;
        default:
            // Handle invalid role
            break;
    }

    // Prepare a SQL query to select the user from the respective table
    $sql = "SELECT * FROM $tableName WHERE email = ?";
    $stmt = db()->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the user exists
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Password is correct, log the user in
                session_start();
                $_SESSION['user'] = $user;
                header("Location: C:\Users\softphea\E-Kelas-Mengaji\view\student_profile.php");
                exit;
            } else {
                // Incorrect password
                $error = "Incorrect password";
            }
        } else {
            // User not found
            $error = "User not found";
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . db()->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Login";
    require '../global/header.php';
    ?>
    <link href="../resources/styles.css" rel="stylesheet" />
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
                userRoleInput.value = 'student';
            } else if (role === 'staff') {
                roleDiv.style.display = 'block'; // Or 'inline-block' as needed
                staffTab.classList.add('active');
                studentTab.classList.remove('active');
                userRoleInput.value = 'teacher'; // Assuming 'teacher' corresponds to staff
            }
        }
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
                                <br>
                                <div class="tab-content">
                                    <form action="/login" class="form-horizontal" id="StaffForm" autocomplete="off"
                                        method="post" accept-charset="utf-8">
                                        <div id="roleDiv" class="form-group text-center">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="data[User][role]"
                                                    id="adminCheckbox" value="2" required="required" checked>
                                                <label class="form-check-label"> Admin </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="data[User][role]"
                                                    id="teacherCheckbox" value="1" required="required">
                                                <label class="form-check-label"> Pengajar </label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="../controller/login_exec.php">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="username" class="form-control" id="username"
                                                placeholder="Username" required autofocus>
                                            <label for="inputEmail">Alamat Emel</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" name="password" class="form-control" id="password"
                                                placeholder="Password" required autofocus>
                                            <label for="inputPassword">Kata Laluan</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="inputRememberPassword"
                                                name="inputRememberPassword" type="checkbox" value="" />
                                            <label class="form-check-label" for="inputRememberPassword">Ingat Kata
                                                Laluan</label>
                                        </div>
                                        <input type="hidden" name="userRole" id="userRole" value="student" />
                                        <script>
                                            // Updated script to dynamically set userRole based on the selected radio button
                                            $(document).ready(function () {
                                                $('input[name="data[User][role]"]').on('change', function () {
                                                    $('#userRole').val($('input[name="data[User][role]"]:checked').val());
                                                });
                                            });
                                        </script>
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
<script>
    $(document).ready(function () {
        $('#show_password').on('change', function () {
            $('#password').attr('type', $('#show_password').prop('checked') === true ? "text" : "password");
        });
    });
</script>