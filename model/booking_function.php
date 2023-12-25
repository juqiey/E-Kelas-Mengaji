<?php
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

    function getBookingList($id){
        $conn=db();
        $sql="SELECT booking.*,student.*,class.*,teacher.*
            FROM booking
            JOIN student ON booking.studid=student.studid
            JOIN class ON booking.classid=class.classid
            JOIN teacher ON class.teacherid = teacher.teacherid
            WHERE booking.studid='$id'";

        return $conn->query($sql);
    }
?>