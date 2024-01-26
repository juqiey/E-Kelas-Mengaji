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

    function viewBooking($id){
        $conn=db();
        $sql="SELECT booking.*,student.*,class.*,teacher.*,mosque.*
            FROM booking
            JOIN student ON booking.studentid=student.studentid
            JOIN class ON booking.classid=class.classid
            JOIN teacher ON class.teacherid = teacher.teacherid
            JOIN mosque ON class.mosqueid = mosque.mosqueid
            WHERE booking.bookingid='$id'";

        return $conn->query($sql);
    }

    function getDropdownBank($selected){
        $banks = [
            'maybank' => 'Maybank',
            'cimb' => 'CIMB Bank',
            'public' => 'Public Bank',
            'hongleong' => 'Hong Leong Bank',
            'rhb' => 'RHB Bank',
            'ambank' => 'AmBank',
            'uob' => 'United Overseas Bank (UOB)',
            'hsbc' => 'HSBC Bank',
            'standardchartered' => 'Standard Chartered Bank',
            'bankislam' => 'Bank Islam Malaysia',
            // Add more banks as needed
        ];

        $txt_result = "";

        foreach ($banks as $index => $bank) {
            $selected_txt = ($index == $selected) ? 'selected' : '';

            $txt_result .= "<option " . $selected_txt . " value=\"" . $index . "\">" . $bank . "</option>";
        }

        return $txt_result;

    }

    function generateBankTransactionId($length = 12) {
        // Define characters that can be used in the transaction ID
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // Get the current timestamp
        $timestamp = time();

        // Generate a random string of the specified length
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        // Combine timestamp and random string to create a unique ID
        $transactionId = 'TXN' . $timestamp . $randomString;

        return $transactionId;
    }

    function addBooking($classid,$userid){
        $conn=db();
        $sql="INSERT INTO booking(bookingdate,bookingstatus,studentid,classid) VALUES(CURRENT_TIMESTAMP,'0','$userid','$classid')";

        $conn->query($sql);

        return $conn->insert_id;
    }

    function updateClassQuota($classid){
        $conn=db();
        $sql="UPDATE class SET classquota=classquota-1 WHERE classid='$classid'";

        return $conn->query($sql);
    }

    function deleteBooking($id){
        $conn=db();
        $sql="DELETE FROM booking WHERE bookingid='$id'";

        return $conn->query($sql);
    }
?>