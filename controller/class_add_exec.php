<?
    require '../model/class_function.php';
    require '../global/script.php';

    $subject=clean($_POST['subject']);
    $desc=clean($_POST['desc']);
    $date=clean($_POST['date'].' '.$_POST['time']);
    $quota=clean($_POST['quota']);
    $fee=clean($_POST['fee']);
    $mosque=clean($_POST['mosque']);
    $teacherid=$_POST['teacherid'];

    $result=addClass($subject,$desc,$date,$quota,$fee,$mosque,$teacherid);
?>
<script>
    $(document).ready(function(){
        <?if($result!="" && $result>0){?>
        Swal.fire('Berjaya','Tempahan Slot Berjaya!','success')
        <? }else{ ?>
        Swal.fire('Gagal','Tempahan Slot Gagal!','error')
        <? } ?>

            .then((value)=>{
                if(value.isConfirmed){
                    window.location.href='../view/class_teacher_list.php';
                }
            });
    });
</script>
