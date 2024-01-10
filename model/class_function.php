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
        $sql="SELECT class.*,teacher.*,mosque.* FROM class
            JOIN teacher ON class.teacherid=teacher.teacherid
            JOIN mosque ON class.mosqueid=mosque.mosqueid
            WHERE class.classid=$id";

        return $conn->query($sql);
    }

    function getClassList(){
        $conn=db();
        $sql="SELECT class.*, teacher.*,mosque.* FROM class
            JOIN teacher ON class.teacherid=teacher.teacherid
            JOIN mosque ON class.mosqueid=mosque.mosqueid";

        return $conn->query($sql);
    }

    function getClassTeacherList($id){
        $conn=db();
        $sql="SELECT c.*,m.* FROM class c 
            JOIN mosque m ON c.mosqueid=m.mosqueid    
            WHERE c.teacherid='$id'";

        return $conn->query($sql);
    }

    function getStudentClassList($id){
        $conn=db();
        $sql="SELECT s.*,b.* FROM booking b
            JOIN student s ON b.studentid=s.studentid
            WHERE b.classid='$id'";

        return $conn->query($sql);
    }
?>