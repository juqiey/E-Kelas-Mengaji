<?
    require '../db/config.php';

    function getUpcomingClassTeacher($id){
        $conn=db();
        $sql="SELECT * FROM class WHERE teacherid='$id'";

        return $conn->query($sql);
    }

    function getTotalStudent(){
        $conn=db();
        $sql="SELECT COUNT(studentid) AS total FROM student";

        $result=$conn->query($sql);
        return $result->fetch_object()->total;
    }

    function getTotalTeacher(){
        $conn=db();
        $sql="SELECT COUNT(teacherid) AS total FROM teacher";

        $result=$conn->query($sql);
        return $result->fetch_object()->total;
    }

    function getTotalClass(){
        $conn=db();
        $sql="SELECT COUNT(classid) AS total FROM class";

        $result=$conn->query($sql);
        return $result->fetch_object()->total;
    }

    function getTotalFee(){
        $conn=db();
        $sql="SELECT SUM(paymenttotal) AS total FROM payment;";

        $result=$conn->query($sql);
        return $result->fetch_object()->total;
    }

    function getBookingList($id){
        $conn=db();
        $sql="SELECT booking.*,student.*,class.*,teacher.*
                FROM booking
                JOIN student ON booking.studentid=student.studentid
                JOIN class ON booking.classid=class.classid
                JOIN teacher ON class.teacherid = teacher.teacherid
                WHERE booking.studentid='$id'";

        return $conn->query($sql);
    }
?>
