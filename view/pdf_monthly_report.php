<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
require_once '../dompdf/autoload.inc.php';
require "../model/class_function.php";
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$month=$_GET['month'];
$year=$_GET['year'];

$report = getClassTeacherList(1,$month,$year);

$teacher=viewTeacher(1)->fetch_assoc();

$profile = $teacher['teacherurl'];

if ($teacher['teacherurl'] == null){
    $profile = "default.jpg";
}

$i=1;
$trow = "";
if (mysqli_num_rows($report) == 0){
    $trow = '<tr><td colspan="7" class="text-center">No data available</td></tr>';
}
while ($row = $report->fetch_assoc()) {
    $count=getCountBooking($row['classid'])->fetch_object()->totalstudent;

    $trow .= '
    <tr>
        <td>'.$i++.'</td>
        <td class="text-capitalize">'.$row['classsubject'].'</td>
        <td>'.$row['classquota'].'</td>
        <td>RM'.$row['classfee'].'</td>
        <td>'.$row['mosquename'].'</td>
        <td>'.$count.'</td>
        <td>'.date('d/m/y h:i:s',strtotime($row['classdate'])).'</td>
    </tr>';
}

$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Laporan Bulanan</title>
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
                <h2>Nama Pengajar: '.$teacher['teachername'].'</h2>
                Emel: '.$teacher['teacheremail'].'<br>
                Nombor Telefon: '.$teacher['teacherphoneno'].'
        </th>
    </tr>
    <tr class="text-dark">
        <th colspan="3" style="padding-left: 1rem">Senarai Kelas '.$month.' '.$year.'</th>
        <th colspan="4" style="padding-left: 1rem" class="text-center">Dicetak pada: '.date('d/m/Y h:i:sa', time()).'</th>
    </tr>
    <tr class="" style="background-color: #3b3b3b">
        <th style="width: 2%">#</th>
        <th style="width: 15%">Tajuk</th>
        <th style="width: 5%">Quota</th>
        <th style="width: 10%">Yuran</th>
        <th style="width: 19%">Lokasi</th>
        <th style="width: 14%">Bilangan Pelajar</th>
        <th style="width: 23%">Tarikh Kuliah</th>
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