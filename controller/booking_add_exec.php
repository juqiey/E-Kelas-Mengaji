<?
    require '../model/booking_function.php';
    require '../global/script.php';

    $classid=clean($_POST['classid']);
    $userid=1; //Session id here

    $result=addBooking($classid,$userid);

    if($result!="" && $result>0){
        updateClassQuota($classid);
    }
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
                    window.location.href='../view/booking_list.php';
                }
            });
    });
</script>
