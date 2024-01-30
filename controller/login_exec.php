<?
session_start();
require "../model/function.php";

$username = ($_POST['username']);
$password = ($_POST['password']);

//call function
$login = login($username);

if(mysqli_num_rows($login)>0){
  $login = $login->fetch_assoc();

  if (password_verify($password, $login['password'])) {
    session_regenerate_id(true);
    // Store data in session variables
    $_SESSION["auth"] = true;
    $_SESSION["id"] = $login['id'];
    $_SESSION["username"] = $login['username'];
    $_SESSION["name"] = $login['name'];
    $_SESSION["ic"] = $login['ic'];
    $_SESSION["phone_no"] = $login['phone_no'];
    $_SESSION["email"] = $login['email'];
    $_SESSION["company_id"] = $login['company_id'];
    $_SESSION["role"]=$login['role'];
    /*echo $_SESSION['role'];
    exit();*/

    echo "<script>window.location.href = '../view/dashboard.php';</script>";
  }else{
    $fail = 'Failed to login.\Invalid Username or Password.';
  }
}
else{
  $fail = "Username not found!";
}
require "../global/controller-header.php";

if($fail != ""){?>
  <script>
    $(document).ready(function() {
      Swal.fire(
        'Login Failed', //Title text
        '<? echo $fail; ?>', //Subtitle text
        'error' //icon animation type
      )
        .then((value) => { // return user to previous/any page
          if (value.isConfirmed) {
            window.history.back();
          }
        });
    });
  </script>
<? }?>
