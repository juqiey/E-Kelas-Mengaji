<?
    require '../model/booking_function.php';

    $id=$_GET['id'];
    $booking=viewBooking($id)->fetch_assoc();
?>

<html lang="en">
<head>
    <?
    $title="Butiran Tempahan Kelas";
    require '../global/header.php';
    ?>
    <style>
        #card-btn{
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            cursor: pointer;
            box-shadow: -1px 3px 3px 0 rgba(80, 80, 80, .2);
        }
        #card-btn:hover{
            position: relative;
            top: -3px;
            box-shadow: -6px 14px 12px 2px rgba(90, 90, 90, .12);
        }
        a:link{
            text-decoration: none;
        }
        a:visited  {
            text-decoration: none;
        }

        .visit:hover {
            text-decoration: underline;
        }
        /*.divider-body>*{
            display: inline-block;
            vertical-align: middle;
        }
        .divider-body{
            text-align: center;
            border: 0;
            white-space: nowrap;
            display: block;
            overflow: hidden;
            padding: 0;
            margin: 0;
        }
        .divider-body:before, .divider-body:after {
            content: "";
            height: 0.5px;
            width: 50%;
            background-color: #D3D3D3;
            margin: 0 5px 0 5px;
            display: inline-block;
            vertical-align: middle;
        }
        .divider-body:before {
            margin-left: -100%;
        }
        .divider-body:after {
            margin-right: -95%;
        }*/
        .text{
            font-size: 18px;
        }
    </style>
</head>
<body class="sb-nav-fixed">
<?
require '../global/navigation_header.php';
?>
<div id="layoutSidenav">
    <?
    require '../global/sidebar.php';
    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4"><? echo $title; ?></h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a class="visit" href="booking_list.php">Senarai Kelas Saya</a></li>
                    <li class="breadcrumb-item active"><? echo $title; ?></li>
                </ol>
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <h2 class="card-title mb-4"><? echo $booking['classsubject']; ?></h2>
                            <h6 class="card-text"><i><? echo ($booking['classdescription']!=null)?$booking['classdescription']:"Tiada Maklumat Lanjut"; ?></i></h6>
                        </div>
                        <div class="row">
                            <div class="text-center">
                                <hr>
                                <p style="font-size:16px;font-style: italic">Butiran Kelas</p>
                                <hr>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6 text-center">
                                    <p class="text">Tarikh: <b><? echo date('d F Y, h:i A', strtotime($booking['classdate'])); ?></b></p>
                                    <p class="text">Lokasi: <b><? echo $booking['classlocation']; ?></b></p>
                                </div>
                                <div class="col-md-6 text-center">
                                    <p class="text">Yuran (RM): <b>RM<? echo $booking['classfee'];?></b></p>
                                    <p class="text">Status Bayaran: <b><? echo ($booking['bookingstatus']==1)?"Sudah Dibayar":"Belum Dibayar"; ?></b></p>
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="text">Pengajar: <b><? echo $booking['teachername']; ?></b></p>
                            </div>
                            <? if($booking['bookingstatus']==0){ ?>
                            <div class="row justify-content-center mt-4 mb-4">
                                <div class="col-md-3">
                                    <a href="" class="btn btn-success" id="card-btn">Bayar</a>
                                </div>
                            </div>
                            <? }?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<?
require '../global/script.php';
?>
</body >
</html>