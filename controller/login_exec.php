<?php
session_start();
require "../model/function.php";

$studentemail = ($_POST['email']);
$password = $_POST['password'];
$userRole = ($_POST['userRole']);

if($userRole==3){
    $login=loginStudent($studentemail);
}else if($userRole==1){
    $login=loginTeacher($studentemail);
}else if($userRole==2){
    $login=loginAdmin($studentemail);
}


if (mysqli_num_rows($login)>0){

    $login=$login->fetch_assoc();

  if (verifyPassword($password,$login['password'])){
    session_regenerate_id(true);
    // Store data in session variables
    if($userRole==2){
        $_SESSION["auth"] = true;
        $_SESSION["id"] = $login['adminid'];
        $_SESSION["username"] = $login['adminusername'];
        $_SESSION["password"] = $login['adminpassword'];
        $_SESSION["name"] = $login['adminname'];
        $_SESSION["address"] = $login['adminaddress'];
        $_SESSION["city"] = $login['admincity'];
        $_SESSION["postcode"] = $login['adminposkod'];
        $_SESSION["phoneno"] = $login['adminphone'];
        $_SESSION["email"] = $login['adminemail'];
        $_SESSION["profileurl"] = $login['adminurl'];
    }

    if($userRole==3){
        $_SESSION["auth"] = true;
        $_SESSION["id"] = $login['studentid'];
        $_SESSION["name"] = $login['studentname'];
        $_SESSION["username"] = $login['studentusername'];
        $_SESSION["password"] = $login['password'];
        $_SESSION["dob"] = $login['studentdob'];
        $_SESSION["gender"] = $login['studentsex'];
        $_SESSION["address"] = $login['studentaddress'];
        $_SESSION["phoneno"] = $login['studentphoneno'];
        $_SESSION["email"] = $login['studentemail'];
        $_SESSION["parentsname"] = $login['parentsname'];
        $_SESSION["parentsphoneno"] = $login['parentsphoneno'];
        $_SESSION["url"] = $login['studenturl'];
        $_SESSION["poskod"] = $login['studentpostcode'];
        $_SESSION["city"] = $login['studentcity'];
    }

    if($userRole==1){
        $_SESSION["auth"] = true;
        $_SESSION["id"] = $login['teacherid'];
        $_SESSION["name"] = $login['teachername'];
        $_SESSION["phoneno"] = $login['teacherphoneno'];
        $_SESSION["email"] = $login['teacheremail'];
        $_SESSION["bank"] = $login['teacherbank'];
        $_SESSION["accountno"] = $login['teacheraccountno'];
        $_SESSION["username"] = $login['teacherusername'];
        $_SESSION["password"] = $login['teacherpassword'];
        $_SESSION["address"] = $login['teacheraddress'];
        $_SESSION["url"] = $login['teacher'];
        $_SESSION["postcode"] = $login['teacherpostcode'];
        $_SESSION["city"] = $login['teachercity'];
    }

    $_SESSION["role"] = $userRole;

    echo "<script>window.location.href = '../view/dashboard.php';</script>";
    exit();
  } else {
    $fail = 'Failed to login. Invalid Username or Password.';
  }
}else{
  $fail = "Username not found!";
}
require "../global/controller_header.php";

if($fail != ""){?>
  <script>
    $(document).ready(function() {
      Swal.fire(
        'Login Failed', //Title text
        '<?php echo $fail; ?>', //Subtitle text
        'error' //icon animation type
      ).then((value) => { // return user to previous/any page
        if (value.isConfirmed) {
          window.history.back();
        }
      });
    });
  </script>
<?php } ?>
