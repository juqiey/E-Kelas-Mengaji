<?
    include '../global/script.php';
    include '../model/booking_function.php';

    $id=clean($_GET['id']);

    $result=deleteBooking($id);
?>
<script>
    $(document).ready(function(){
        <?if($result!="" && $result>0){?>
        Swal.fire('Berjaya','Tempahan Berjaya Dipadam!','success')
        <? }else{ ?>
        Swal.fire('Gagal','Tempahan Gagal Dipadam!','error')
        <? } ?>

            .then((value)=>{
                if(value.isConfirmed){
                    window.location.href='../view/booking_list.php';
                }
            });
    });
</script>
