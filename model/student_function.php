<?
    include '../db/config.php';

    //this function to clean data that passed
    function clean($str) {
        $conn=db();
        $str = @trim($str);
        if(get_magic_quotes_gpc()) {
            $str = stripslashes($str);
        }
        return mysqli_real_escape_string($conn,$str);
    }

    function viewStudent($id){
        $conn=db();
        $sql="SELECT * FROM student WHERE studentid='$id'";

        return $conn->query($sql);
    }

    function updateStudent($id,$name,$dob,$sex,$email,$phoneno,$parentsname,$parentsphone,$postcode,$city,$address){
        $conn=db();
        $sql="UPDATE student SET studentname='$name',studentdob='$dob',studentsex='$sex',studentemail='$email',
                   studentphoneno='$phoneno',parentsname='$parentsname',parentsphoneno='$parentsphone',studentpostcode='$postcode',
                   studentcity='$city',studentaddress='$address' WHERE studentid='$id'";

        return $conn->query($sql);
    }
?>