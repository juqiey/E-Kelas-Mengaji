<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'ekelasmengaji');

require "../global/controller_header.php";
$auth_id = $_SESSION['id'];
// to check user logged in or not(navigate to login.php)
if(!isset($_SESSION["auth"]) || $_SESSION["auth"] !== true){ ?>
    <script>
        $(document).ready(function() {
            Swal.fire(
                'Access Failed',
                'Please login to access the system.',
                'warning'
            ).then((value) => {
                if (value.isConfirmed) {
                    window.location.href='../view/login.php';
                }
            });
        });
    </script>
    <?
    exit;
}

function getAuthInfo($id){
    /* Attempt to connect to MySQL database */
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

// Check connection
    if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    static $conn;
    if ($conn===NULL) {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    }

    if($_SESSION["role"]==3){
        $sql="SELECT * FROM student WHERE studentid='$id'";
    } else if($_SESSION["role"]==1){
        $sql="SELECT * FROM teacher WHERE teacherid='$id'";
    }

    return $conn->query($sql)->fetch_object();
}

function blockAccess($role_list){
    if(in_array($_SESSION['role'], $role_list)){
        echo 'asd';
        echo "<script>
    $(document).ready(function() {
      Swal.fire(
        'Request Declined!', //Title text
        'You are not authorized to access this page', //Subtitle text
        'warning' //icon animation type -> [error,success,warning,info,question]
      ).then((value) => { // return user to previous/any page
        if (value.isConfirmed) {
          window.history.back();
        }
      });
    });
  </script>";
        exit();
    }
}

?>
