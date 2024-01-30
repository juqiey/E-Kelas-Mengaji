<?
    require '../global/script.php';
    require '../model/teacher_function.php';

    $teacherid=$_POST['teacherid'];
    $teachername=$_POST['teachername'];
    $teacherbirth=$_POST['teacherbirth'];
    $teachergender=$_POST['teachergender'];
    $teacheremail=$_POST['teacheremail'];
    $teacherphoneno=$_POST['teacherphoneno'];
    $teacherbank=$_POST['teacherbank'];
    $teacheraccountno=$_POST['teacheraccountno'];
    $teacheraddress=$_POST['teacheraddress'];
    $teachercity=$_POST['teachercity'];
    $teacherposkod=$_POST['teacherposkod'];

    $result=updateTeacher($teacherid,$teachername,$teacherbirth,$teachergender,$teacheremail,$teacherphoneno,$teacherbank,$teacheraccountno,$teacherposkod,$teachercity,$teacheraddress);
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
                    window.location.href='../view/teacher_profile.php';
                }
            });
    });
</script>
