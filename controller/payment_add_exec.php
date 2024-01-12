<?
    require '../model/payment_function.php';
    require '../global/script.php';

    $total=clean($_POST['classfee']);
    $method="Online Banking";
    $transactionid=clean($_POST['transactionid']);
    $bookingid=clean($_POST['bookingid']);

    $result=addPayment($total,$method,$transactionid,$bookingid);


    if($result!="" && $result>0){
        $updatestatus=updateStatus($bookingid);
    }
?>
<script>
    $(document).ready(function(){
        <?if($result!="" && $result>0){?>
        Swal.fire('Berjaya','Pembayaran Berjaya!','success')
        <? }else{ ?>
        Swal.fire('Gagal','Pembayaran Gagal!','error')
        <? } ?>

            .then((value)=>{
                if(value.isConfirmed){
                    window.location.href='../view/class_avail_list.php';
                }
            });
    });
</script>
