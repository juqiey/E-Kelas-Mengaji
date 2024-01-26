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
        $sql="SELECT class.*, teacher.*,mosque.* FROM class
            JOIN teacher ON class.teacherid=teacher.teacherid
            JOIN mosque ON class.mosqueid=mosque.mosqueid
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

    function getDropdownMosque($selected){
        $conn=db();
        $sql="SELECT mosqueid,mosquename FROM mosque";

        $result = $conn->query($sql);

        $txt_result="";
        while ($row  = $result -> fetch_array()){
            $txt_result .= "<option ".($row[0] == $selected ? 'selected':'')." value=\"".$row[0]."\">".$row[1]."</option>";
        }

        return $txt_result;
    }

    function addClass($subject,$desc,$date,$quota,$fee,$mosque,$teacherid){
        $conn=db();
        $sql="INSERT INTO class(classsubject,classdescription,classdate,classquota,classfee,mosqueid,teacherid)
            VALUES('$subject','$desc','$date','$quota','$fee','$mosque','$teacherid')";

        return $conn->query($sql);
    }

    function searchClass($query){
        $conn=db();
        $sql="SELECT * FROM class WHERE classsubject LIKE '%$query%'";

        return $conn->query($sql);
    }
?>