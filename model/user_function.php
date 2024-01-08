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

    function getStudentList(){
        $conn=db();
        $sql="SELECT * FROM student";

        return $conn->query($sql);
    }

    function getTeacherList(){
        $conn=db();
        $sql="SELECT * FROM teacher";

        return $conn->query($sql);
    }
?>