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

    function getDropdownGender($selectedGender = null) {
        // List of gender options
        $genderOptions = array('Lelaki', 'Perempuan');

        $dropdownHTML="";

        // Iterate through each gender option
        foreach ($genderOptions as $gender) {
            // Check if the current option is selected
            $isSelected = ($selectedGender == $gender) ? 'selected' : '';

            // Append the option HTML to the dropdown
            $dropdownHTML .= '<option value="' . $gender . '" ' . $isSelected . '>' . $gender . '</option>';
        }

        // Return the generated dropdown HTML
        return $dropdownHTML;
    }

    function addTeacher($name,$sex,$dob,$phoneno,$email,$bank,$accountno,$username,$profileurl,$ic){
        $conn=db();
        $sql="INSERT INTO teacher(teachername,teachersex,teacherdob,teacherphoneno,teacheremail,teacherbank,teacheraccountno,teacherusername,teacherurl,password)
            VALUES('$name','$sex','$dob','$phoneno','$email','$bank','$accountno','$username','$profileurl','$ic')";

        return $conn->query($sql);

    }

    function deleteTeacher($id){
        $conn=db();
        $sql="DELETE FROM teacher WHERE teacherid='$id'";

        return $conn->query($sql);
    }

    function updateTeacher($id,$name,$dob,$sex,$email,$phoneno,$bank,$accountno,$postcode,$city,$address,$image){
        $conn=db();
        $update_image = ($image != "") ? ", teacherurl='$image'" : "";
        $sql="UPDATE teacher SET teachername='$name',teacherdob='$dob',teachersex='$sex',teacheremail='$email',
                   teacherphoneno='$phoneno',teacherbank='$bank',teacheraccountno='$accountno',teacherpostcode='$postcode',
                   teachercity='$city',teacheraddress='$address' $update_image WHERE teacherid='$id'";

        return $conn->query($sql);
    }
?>