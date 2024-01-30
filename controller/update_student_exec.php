<?
    require '../global/script.php';
    require '../model/student_function.php';

    $studentid=$_POST['studentid'];
    $studentname=$_POST['studentname'];
    $studentdob=$_POST['studentdob'];
    $studentsex=$_POST['studentsex'];
    $studentemail=$_POST['studentemail'];
    $studentphoneno=$_POST['studentphoneno'];
    $parentsname=$_POST['parentsname'];
    $parentsphoneno=$_POST['parentsphoneno'];
    $studentpostcode=$_POST['studentpostcode'];
    $studentcity=$_POST['studentcity'];
    $studentaddress=$_POST['studentaddress'];

    $result=updateStudent($studentid,$studentname,$studentdob,$studentsex,$studentemail,$studentphoneno,$parentsname,$parentsphoneno,$studentpostcode,$studentcity,$studentaddress);
?>

<script>
    $(document).ready(function(){
        <?if($result!="" && $result>0){?>
        Swal.fire('Berjaya','Berjaya Kemaskini Profil!','success')
        <? }else{ ?>
        Swal.fire('Gagal','Kemaskini Profil Gagal!','error')
        <? } ?>

            .then((value)=>{
                if(value.isConfirmed){
                    window.location.href='../view/student_profile.php';
                }
            });
    });
</script>
