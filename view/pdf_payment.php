<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
require_once '../dompdf/autoload.inc.php';
require "../model/payment_function.php";
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$id=$_GET['id'];

$report = viewPayment($id)->fetch_assoc();

$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .receipt-details {
            width: 100%;
        }
        .receipt-details th, .receipt-details td {
            padding: 8px;
            text-align: left;
        }
        .receipt-details th {
            width: 30%;
        }
        .thank-you {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Resit Pembayaran</h1>
    </div>
    
    <table class="receipt-details">
        <tr>
            <th>ID Transaksi:</th>
            <td>'.$report['transactionid'].'</td>
        </tr>
        <tr>
            <th>Date:</th>
            <td>'.date('d/m/y h:i:s', strtotime($report['paymentdate'])).'</td>
        </tr>
        <tr>
            <th>Amount Paid:</th>
            <td>RM '.$report['paymenttotal'].'</td>
        </tr>
        <!-- Add more payment details as needed -->
    </table>

    <div class="thank-you">
        <p>Terima kasih!</p>
    </div>
</body>
</html>
';

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'potrait');
$dompdf->render();
ob_end_clean();
$dompdf->stream("Laporan Kelas",array("Attachment"=>0));
?>