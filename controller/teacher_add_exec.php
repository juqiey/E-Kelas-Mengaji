<?
    require '../model/teacher_function.php';
    require '../global/script.php';

    $name=$_POST['teachername'];
    $sex=$_POST['teachersex'];
    $dob=$_POST['teacherdob'];
    $phoneno=$_POST['teacherphoneno'];
    $email=clean($_POST['teacheremail']);
    $bank=clean($_POST['bank']);
    $accountno=clean($_POST['accountno']);
    $username=clean($_POST['username']);

    $profileurl="";

    //If user upload image, store the data
    if(!empty($_FILES['profileurl']) &&  $_FILES['profileurl']['name'] != null){
        $errors= array();
        $file_name = $_FILES['profileurl']['name'];
        $file_size =$_FILES['profileurl']['size'];
        $file_tmp =$_FILES['profileurl']['tmp_name'];
        $ext_name = explode('.', $file_name);
        $file_ext=strtolower(end($ext_name));
        $profileurl = "profile_".$username;
        $target_dir = "../img/";
        $target_file = $target_dir . $profileurl;

        $extensions= array("jpeg","jpg","png","gif");

        if(in_array($file_ext,$extensions)=== false){
            $errors[]="Extension not allowed, please choose a JPEG or PNG file.";
        }
        if($file_size > 4194304){
            $errors[]='File size must be below 4 MB';
        }

        if(empty($errors) == true){
            $filepath = "../img/".$profileurl;
            move_uploaded_file($file_tmp,$target_file);
        }else{
            $err_text = '';
            foreach($errors as $error){
                $err_text .= "- " . $error . "<br>";
            }
        }
    }

    $result=addTeacher($name,$sex,$dob,$phoneno,$email,$bank,$accountno,$username,$profileurl);
?>
<script>
    $(document).ready(function(){
        <?if($result!="" && $result>0){?>
        Swal.fire('Berjaya','Berjaya Daftar Pengajar Baharu!','success')
        <? }else{ ?>
        Swal.fire('Gagal','Gagal Daftar Pengajar Baharu!','error')
        <? } ?>

            .then((value)=>{
                if(value.isConfirmed){
                    window.location.href='../view/teacher_list.php';
                }
            });
    });
</script>
