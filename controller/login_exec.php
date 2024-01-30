<?php
session_start();
require "../model/function.php";

$studentemail = ($_POST['email']);
$password = $_POST['password'];
$userRole = ($_POST['userRole']);

echo $studentemail.' '.$password.' '.$userRole;

if($userRole=='student'){
    $login=loginStudent($studentemail);
}else if($userRole==2){
    $login=loginTeacher($studentemail);
} /*else if($userRole==3){
    $login=log
}*/


if (mysqli_num_rows($login)>0){

  if (verifyPassword($password,$login['password'])){
    session_regenerate_id(true);
    // Store data in session variables
    if($userRole==3){
        $_SESSION["auth"] = true;
        $_SESSION["adminid"] = $login['adminid'];
        $_SESSION["adminusername"] = $login['adminusername'];
        $_SESSION["adminpassword"] = $login['adminpassword'];
        $_SESSION["adminname"] = $login['adminname'];
        $_SESSION["adminaddress"] = $login['adminaddress'];
        $_SESSION["admincity"] = $login['admincity'];
        $_SESSION["adminposkod"] = $login['adminposkod'];
        $_SESSION["adminphone"] = $login['adminphone'];
        $_SESSION["adminemail"] = $login['adminemail'];
        $_SESSION["profileurl"] = $login['profileurl'];
    }

    if($userRole=='student'){
        $_SESSION["studentid"] = $login['studentid'];
        $_SESSION["studentname"] = $login['studentname'];
        $_SESSION["studentusername"] = $login['studentusername'];
        $_SESSION["studentpassword"] = $login['studentpassword'];
        $_SESSION["studentclass"] = $login['studentclass'];
        $_SESSION["studentbirth"] = $login['studentbirth'];
        $_SESSION["studentgender"] = $login['studentgender'];
        $_SESSION["studentaddress"] = $login['studentaddress'];
        $_SESSION["studentnum"] = $login['studentnum'];
        $_SESSION["studentemail"] = $login['studentemail'];
        $_SESSION["parentsname"] = $login['parentsname'];
        $_SESSION["parentsnum"] = $login['parentsnum'];
        $_SESSION["profileurl"] = $login['profileurl'];
        $_SESSION["studentposkod"] = $login['studentposkod'];
        $_SESSION["studentcity"] = $login['studentcity'];
    }

    if($userRole==2){
        $_SESSION["teacherid"] = $login['teacherid'];
        $_SESSION["teachername"] = $login['teachername'];
        $_SESSION["teacherphoneno"] = $login['teacherphoneno'];
        $_SESSION["teacheremail"] = $login['teacheremail'];
        $_SESSION["teacherbank"] = $login['teacherbank'];
        $_SESSION["teacheraccountno"] = $login['[teacheraccountno]'];
        $_SESSION["teacherusername"] = $login['teacherusername'];
        $_SESSION["teacherpassword"] = $login['teacherpassword'];
        $_SESSION["teacheraddress"] = $login['teacheraddress'];
        $_SESSION["profileurl"] = $login['profileurl'];
        $_SESSION["teacherposkod"] = $login['[teacherposkod]'];
        $_SESSION["teachercity"] = $login['[teachercity]'];
    }

    $_SESSION["role"] = $userRole;

    echo "<script>window.location.href = '../view/test.php';</script>";
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
