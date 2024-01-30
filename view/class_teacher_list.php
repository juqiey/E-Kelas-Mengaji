<!-- Session start here -->
<?php
session_start();
require '../global/session_check.php';
require '../model/class_function.php';
$year = ($_GET['year']) ?: date('Y');
$month=($_GET['month']?:date('n'));
?>

<html lang="en">
<head>
    <?
    $title="Senarai Kelas Mengaji (Pengajar)";
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
                    <li class="breadcrumb-item active"><? echo $title; ?></li>
                </ol>
                <!-- Content start here -->
                <div class="card mb-4">
                    <div class="card-header text-center">
                        <h3>
                            <i class="fas fa-table me-1"></i>
                            Senarai Kelas Saya
                            <a href="../view/pdf_monthly_report.php?month=<? echo $month ?>&year=<? echo $year ?>" target="_blank" class="btn btn-md btn-success" style="color:#ebedef">
                                Cetak
                            </a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <!-- Filter year here -->
                        <form action="" method="get">
                            <div class="row justify-content-md-center">
                                <div class="col-md-2">
                                    <select type="select" class="form-select" name="month" id="month">
                                        <?
                                        $month_option=["Januari","Februari","Mac","April","Mei","Jun","Julai",
                                            "Ogos","September","Oktober","November","Disember"];

                                        for($n=1;$n<=12;$n++){
                                            ?>
                                            <option <? if ($month == $n) echo 'selected' ?> value="<? echo $n; ?>"><? echo $month_option[$n-1];?></option>
                                        <? } ?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select type="select" class="form-select" name="year" id="year">
                                        <? for($i=0; $i<4; $i++){
                                            $option_year = date('Y') - $i;?>
                                            <option <? if ($year == $option_year) echo 'selected' ?>><? echo $option_year?></option>
                                        <? } ?>
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-info" style="color:#ebedef">Filter</button>
                                </div>
                            </div>
                        </form>
                        <table id="datatablesSimple">
                            <thead>
                            <tr>
                                <th>Tarikh</th>
                                <th>Tajuk Kuliah</th>
                                <th>Quota</th>
                                <th>Yuran(RM)</th>
                                <th>Lokasi</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Tarikh</th>
                                <th>Tajuk Kuliah</th>
                                <th>Quota</th>
                                <th>Yuran(RM)</th>
                                <th>Lokasi</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody class="text-center">
                            <?

                            //Nanti ubah ke session id
                            $class=getClassTeacherList(1,$month,$year);

                            while($row=$class->fetch_assoc()){
                                ?>
                                <tr>
                                    <td><? echo date('d F Y, h:i A',strtotime($row['classdate'])) ?></td>
                                    <td><? echo $row['classsubject']; ?></td>
                                    <td><? echo $row['classquota'] ?></td>
                                    <td><? echo $row['classfee'] ?></td>
                                    <td><? echo $row['mosquename'] ?></td>
                                    <td>
                                        <div class="row text-center">
                                            <div class="col-md-6">
                                                <a href="../view/class_admin_view.php?id=<? echo $row['classid'];?>" class="btn btn-primary" id="card-btn">Lihat</a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="" class="btn btn-danger" id="card-btn">Padam</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<!-- modal to export ucua excel -->
<div class="modal fade" id="printReport" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exportExcel">Export UCUA Reports</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row text-center mt-1">
                <h5><b><u>Please select month & year</u></b></h5>
            </div>
            <form method="post" action="../controller/ucua_excel_export_exec.php" enctype="multipart/form-data">
                <div class="modal-body" id="view">
                    <!-- Modal content goes here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" style="color:#ebedef">Export</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?
require '../global/script.php';
?>
<script>
    // Delete data
    $(document).on('click', '.delete', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var name = $(this).data('name')

        Swal.fire({
            title: "Padam Tempahan Ini?",
            text: "Tempahan ini akan dipadam secara kekal",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: 'Yes!',
            confirmButtonColor: '#E71C1C',
        })
            .then((value) => {
                if (value.isConfirmed) {
                    location.href = "../controller/booking_delete_exec.php?id="+id;
                }
            });
    });
</script>
</body >
</html>