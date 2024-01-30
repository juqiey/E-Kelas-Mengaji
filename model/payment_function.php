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

    function addPayment($total,$method,$transactionid,$bookingid){
        $conn=db();
        $sql="INSERT INTO payment(paymentdate,paymenttotal,paymentmethod,transactionid,bookingid) 
            VALUES (CURRENT_TIMESTAMP,'$total','$method','$transactionid','$bookingid')";

        $result=$conn->query($sql);

        return !$result?mysqli_error($conn):$result;
    }

    function updateStatus($id){
        $conn=db();
        $sql="UPDATE booking SET bookingstatus=1 WHERE bookingid='$id'";

        return $conn->query($sql);
    }

    function viewPayment($id){
        $conn=db();
        $sql="SELECT p.*,b.*,s.* FROM payment p
            JOIN booking b ON p.bookingid=b.bookingid
            JOIN student s ON b.studentid=s.studentid
            WHERE paymentid='$id'";

        return $conn->query($sql);
    }
?>