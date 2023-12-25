</html>
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

            if (role === 'student') {
                roleDiv.style.display = 'none';
                studentTab.classList.add('active');
                staffTab.classList.remove('active');
            } else if (role === 'staff') {
                roleDiv.style.display = 'block'; // Or 'inline-block' as needed
                staffTab.classList.add('active');
                studentTab.classList.remove('active');
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
                                       class="nav-link active" onclick="toggleRoleRadio('student')"> STUDENT </a>
                                </li>
                                <li class="nav-item">
                                    <a id="staff" href="#staff" data-toggle="tab" aria-expanded="true"
                                       class="nav-link" onclick="toggleRoleRadio('staff')"> STAFF </a>
                                </li>
                            </ul>
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
                                            <label class="form-check-label"> Teacher </label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <br>
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Login</h3>
                            </div>
                            <div class="card-body">
                                <form method="post" action="login.php">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputEmail" name="inputEmail" type="email"
                                               placeholder="name@example.com"/>
                                        <label for="inputEmail">Email address</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputPassword" name="inputPassword"
                                               type="password" placeholder="Password"/>
                                        <label for="inputPassword">Password</label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" id="inputRememberPassword"
                                               name="inputRememberPassword" type="checkbox" value=""/>
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
</div>
<?php
require '../global/script.php';
?>
</body>
</html>
