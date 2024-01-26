<?
    require '../model/booking_function.php';
    require '../global/script.php';

    $classid=clean($_POST['classid']);
    $userid=3; //Session id here

    $result=addBooking($classid,$userid);

    if($result!="" && $result>0){
        updateClassQuota($classid);
    }

    $booking=viewBooking($result)->fetch_assoc();


    /*//Import phpmailer classes
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

        //Load composer's autoloader
        require "../lib/autoload.php";

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        //Email content
        $output='<p>Kepada '.$booking['studentname'].',</p>';
        $output.='<p>Terima kasih kerana melakukan tempahan slot.</p>';
        $output.='<p>----------------------------------------------</p>';


        //Email content
        $output.='<p><strong>Tarikh: </strong>'.date("d-m-Y H:i:s",strtotime($booking['classdate'])).'</p>';
        $output.='<p><strong>Tajuk Kuliah: </strong>'.$booking['classname'].'</p>';
        $output.='<p><strong>Nama Pengajar: </strong>'.$booking['teachername'].'</p>';
        $output.='<p><strong>Yuran: </strong>RM'.$booking['classfee'].'</p>';
        $output.='<p>----------------------------------------------</p>';


        $output.='<p>Terima Kasih,</p>';
//        $output.='<p>System Developers of IT Department, Aims-Global Holdings Sdn. Bhd.</p>';
        $body = $output;
        $subject = "Tempahan Slot Kelas Mengaji";

        try {
            //Server settings
            $email_to = $booking['studentemail'];
            $fromserver = "smtp.gmail.com";
            $mail = new PHPMailer(true);
            $mail->IsSMTP();
            $mail->Host = "smtp.gmail.com"; // Enter your host here
            $mail->SMTPAuth = true;
            $mail->Username = "marzuqi290601@gmail.com"; // Enter your email here
            $mail->Password = "juqiey18"; //Enter your password here
            $mail->Port = 587;
            $mail->IsHTML(true);
            $mail->From = "marzuqi290601@gmail.com";
            $mail->FromName = "E-Kelas Mengaji";
            $mail->Sender = $fromserver; // indicates ReturnPath header
            $mail->Subject = $subject;
            $mail->Body = $body;

            try {
                $mail->AddAddress($email_to,$booking['studentname']);
            } catch (Exception $e) {
                echo "Failed to add address ".$booking['studentname']."[".$email_to."]";
            }

            $mail->send();

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }*/
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
