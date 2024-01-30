<?
    require '../db/config.php';

    //this function to clean data that passed
    function clean($str) {
        $conn=db();
        $str = @trim($str);
        if(get_magic_quotes_gpc()) {
            $str = stripslashes($str);
        }
        return mysqli_real_escape_string($conn,$str);
    }

    function getMosqueList(){
        $conn=db();
        $sql="SELECT * FROM mosque";

        return $conn->query($sql);
    }
?>