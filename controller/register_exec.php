<?php
require_once '../model/function.php';
require '../global/script.php';

$studentname = clean($_POST['name']);
$studentbirth = clean($_POST['dob']);
$studentgender = clean($_POST['sex']);
$studentnum = clean($_POST['phone']);

$studentaddress= clean($_POST['address']);
$studentposkod = clean($_POST['postcode']);
$studentcity = clean($_POST['city']);

$studentemail = clean($_POST['email']);
$studentpassword = clean($_POST['password']);
$parentsname = clean($_POST['parentsname']);
$parentsnum = clean($_POST['parentsphoneno']);

$result=registerStudent($studentname,$studentbirth,$studentgender,$studentnum,$studentaddress,$studentposkod,$studentcity,$studentemail,$studentpassword,$parentsname,$parentsnum);


?>
<script>
    $(document).ready(function(){
        <?if($result!="" && $result>0){?>
        Swal.fire('Berjaya','Berjaya Daftar Akaun Baharu!','success')
        <? }else{ ?>
        Swal.fire('Gagal','Gagal Daftar Akaun Baharu!','error')
        <? } ?>

            .then((value)=>{
                if(value.isConfirmed){
                    window.location.href='../view/login.php';
                }
            });
    });
</script>