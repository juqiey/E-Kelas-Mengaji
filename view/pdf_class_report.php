<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
require_once '../dompdf/autoload.inc.php';
require "../model/class_function.php";
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$id=$_GET['id'];

$report = viewClass($id)->fetch_assoc();


$profile = $report['teacherurl'];

if ($report['teacherurl'] == null){
    $profile = "default.jpg";
}

$student=getStudentClassList($id);
$i=1;
$trow = "";
if (mysqli_num_rows($student) == 0){
    $trow = '<tr><td colspan="7" class="text-center">No data available</td></tr>';
}
while ($row = $student->fetch_assoc()) {
    if($row['bookingstatus']==0){
        $status="Belum Dibayar";
    }else{
        $status="Sudah Dibayar";
    }

    $trow .= '
    <tr>
        <td>'.$i++.'</td>
        <td class="text-capitalize">'.$row['studentname'].'</td>
        <td>'.$row['studentsex'].'</td>
        <td>'.$row['studentemail'].'</td>
        <td>'.$row['studentphoneno'].'</td>
        <td>'.$status.'</td>
        <td>'.date('d/m/y h:i:s',strtotime($row['bookingdate'])).'</td>
    </tr>';
}

$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Laporan Kelas</title>
    <style>
        body{
            font-family: Arial, sans-serif;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 12px;
        }
        th {
            color: #ffffff;
            padding-left: 0.25rem;
        }
        td {
            padding-left: 0.25rem;
        }
        .text-capitalize{
            text-transform: capitalize;
        }
        .text-center{
            text-align: center !important;
        }
        .text-dark{
            color: #282f3a !important;
        }
        .text-white{
            color: #ffffff !important;
        }
        .text-muted{
            color: #737F8B !important;
        }
        img{
            margin: 0.5rem 0;
            height: 100px;
            width: 100px;
            border-radius: 60%;

            object-fit: cover;
            object-position: center right;
        }
    </style>
</head>
<body>
<table class="" style="width: 100%;" role="grid" id="rentalReport">
    <thead>
    <tr class="text-dark">
        <th colspan="3" class="text-center" style="border-right-color: #ffffff">
            <img src="../img/'.$profile.'">
        </th>
        <th colspan="4" style="line-height: 1.5">
                <h2>Kuliah: '.$report['classsubject'].' ('.date('d F Y h:i',strtotime($report['classdate'])).')'.'</h2>
                Pengajar: '.$report['teachername'].'<br>
                Lokasi: '.$report['mosquename'].'<br>
                Alamat: '.$report['mosqueaddress'].'
        </th>
    </tr>
    <tr class="text-dark">
        <th colspan="3" style="padding-left: 1rem">Senarai Pelajar Berdaftar</th>
        <th colspan="4" style="padding-left: 1rem" class="text-center">Dicetak pada: '.date('d/m/Y h:i:sa', time()).'</th>
    </tr>
    <tr class="" style="background-color: #3b3b3b">
        <th style="width: 2%">#</th>
        <th style="width: 10%">Nama</th>
        <th style="width: 10%">Jantina</th>
        <th style="width: 14%">Emel</th>
        <th style="width: 15%">Nombor Telefon</th>
        <th style="width: 14%">Status Pembayaran</th>
        <th style="width: 23%">Tarikh Tempahan</th>
    </tr>
    </thead>
    <tbody>
    '.$trow.'
    </tbody>
</table>
';

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
ob_end_clean();
$dompdf->stream("Laporan Kelas",array("Attachment"=>0));
?>