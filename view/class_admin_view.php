<?
require '../model/class_function.php';

$id=$_GET['id'];
$class=viewClass($id)->fetch_assoc();
?>

<html lang="en">
<head>
    <?
    $title="Butiran Kelas (Kegunaan Pengajar/Admin)";
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
                    <li class="breadcrumb-item"><a class="visit" href="class_avail_list.php">Tempahan Kelas</a></li>
                    <li class="breadcrumb-item active"><? echo $title; ?></li>
                </ol>
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <h2 class="card-title mb-4"><? echo $class['classsubject']; ?></h2>
                            <h6 class="card-text"><i><i><? echo ($class['classdescription']!=null)?$class['classdescription']:"Tiada Maklumat Lanjut"; ?></i></i></h6>
                        </div>
                        <div class="row">
                            <div class="text-center">
                                <hr>
                                <p style="font-size:16px;font-style: italic">Butiran Kelas</p>
                                <hr>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6 text-center">
                                    <p class="text">Tarikh: <b><? echo date('d F Y, h:i A', strtotime($class['classdate'])); ?></b></p>
                                    <p class="text">Lokasi: <b><? echo $class['mosquename'] ?></b></p>
                                </div>
                                <div class="col-md-6 text-center">
                                    <p class="text">Yuran (RM): <b><? echo $class['classfee'] ?></b></p>
                                    <p class="text">Quota Tersedia: <b><? echo $class['classquota']!=null?$class['classquota']:"Terbuka" ?></b></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-center">
                                <hr>
                                <p style="font-size:16px;font-style: italic">Butiran Pengajar</p>
                                <hr>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-12 text-center">
                                    <p class="text">Nama: <b><? echo $class['teachername']; ?></b></p>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6 text-center">
                                    <p class="text">Nombor Telefon: <b><? echo $class['teacherphoneno']; ?></b></p>
                                </div>
                                <div class="col-md-6 text-center">
                                    <p class="text">Emel: <b><? echo $class['teacheremail']; ?></b></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-center">
                                <hr>
                                <p style="font-size:16px;font-style: italic">Senarai Pelajar</p>
                                <hr>
                            </div>
                            <table id="datatablesSimple">
                                <thead>
                                <tr>
                                    <th>Nama Pelajar</th>
                                    <th>Tarikh Lahir</th>
                                    <th>Jantina</th>
                                    <th>Emel</th>
                                    <th>Nombor Telefon</th>
                                    <th>Status Pembayaran</th>
                                    <th>Tarikh Tempahan</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Nama Pelajar</th>
                                    <th>Tarikh Lahir</th>
                                    <th>Jantina</th>
                                    <th>Emel</th>
                                    <th>Nombor Telefon</th>
                                    <th>Status Pembayaran</th>
                                    <th>Tarikh Tempahan</th>
                                </tr>
                                </tfoot>
                                <tbody class="text-center">
                                <?

                                //Nanti ubah ke session id
                                $user=getStudentClassList($id);

                                while($row=$user->fetch_assoc()){
                                    ?>
                                    <tr>
                                        <td><? echo $row['studentname'] ?></td>
                                        <td><? echo date('d F Y',strtotime($row['studentdob'])) ?></td>
                                        <td><? echo $row['studentsex'] ?></td>
                                        <td><? echo $row['studentemail'] ?></td>
                                        <td><? echo $row['studentphoneno'] ?></td>
                                        <td>
                                            <?
                                            if($row['bookingstatus']==1){
                                                echo "Sudah Dibayar";
                                            }else if($row['bookingstatus']==0){
                                                echo "Belum Dibayar";
                                            }else{
                                                echo "Tidak Diketahui";
                                            }
                                            ?>
                                        </td>
                                        <td><? echo date('d F Y',strtotime($row['bookingdate'])) ?></td>
                                    </tr>
                                    <?
                                }
                                ?>
                                </tbody>
                            </table>
                            <div class="text-center justify-content-center">
                                <button class="btn btn-success">Cetak Laporan</button>
                            </div>
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