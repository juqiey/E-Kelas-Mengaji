<?
    include '../global/script.php';
    include '../model/teacher_function.php';

    $id=clean($_GET['id']);

    $result=deleteTeacher($id);
?>
<script>
    $(document).ready(function(){
        <?if($result!="" && $result>0){?>
        Swal.fire('Berjaya','Akaun Berjaya Dipadam!','success')
        <? }else{ ?>
        Swal.fire('Gagal','Akaun Gagal Dipadam!','error')
        <? } ?>

            .then((value)=>{
                if(value.isConfirmed){
                    window.location.href='../view/teacher_list.php';
                }
            });
    });
</script>
