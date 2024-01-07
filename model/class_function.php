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

    function getClassAvailable(){
        $conn=db();
        $sql="SELECT class.*, teacher.* FROM class
            JOIN teacher ON class.teacherid=teacher.teacherid
            WHERE classdate>CURRENT_TIMESTAMP";

        return $conn->query($sql);
    }

    function viewClass($id){
        $conn=db();
        $sql="SELECT class.*,teacher.* FROM class
            JOIN teacher ON class.teacherid=teacher.teacherid
            WHERE class.classid=$id";

        return $conn->query($sql);
    }
?>