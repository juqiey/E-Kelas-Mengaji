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

    function getDropdownBank($selected){
        $banks = [
            'Maybank' => 'Maybank',
            'CIMB' => 'CIMB Bank',
            'Public' => 'Public Bank',
            'Hong Leong' => 'Hong Leong Bank',
            'RHB' => 'RHB Bank',
            'AmBank' => 'AmBank',
            'UOB' => 'United Overseas Bank (UOB)',
            'HSBC' => 'HSBC Bank',
            'Standard Chartered' => 'Standard Chartered Bank',
            'Bank Islam' => 'Bank Islam Malaysia',
            // Add more banks as needed
        ];

        $txt_result = "";

        foreach ($banks as $index => $bank) {
            $selected_txt = ($index == $selected) ? 'selected' : '';

            $txt_result .= "<option " . $selected_txt . " value=\"" . $index . "\">" . $bank . "</option>";
        }

        return $txt_result;

    }

    function viewTeacher($id){
        $conn=db();
        $sql="SELECT * FROM teacher WHERE teacherid='$id'";

        return $conn->query($sql);
    }

    function viewStudent($id){
        $conn=db();
        $sql="SELECT * FROM student WHERE studentid='$id'";

        return $conn->query($sql);
    }
?>