<!-- Session start here -->
<?php
    require '../model/booking_function.php';
?>

<html lang="en">
<head>
    <?
    $title="Senarai Kelas Mengaji";
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
                        </h3>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Tarikh & Masa</th>
                                    <th>Tajuk Kuliah</th>
                                    <th>Yuran(RM)</th>
                                    <th>Lokasi</th>
                                    <th>Pengajar</th>
                                    <th>Status Pembayaran</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Tarikh & Masa</th>
                                    <th>Tajuk Kuliah</th>
                                    <th>Yuran(RM)</th>
                                    <th>Lokasi</th>
                                    <th>Pengajar</th>
                                    <th>Status Pembayaran</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody class="text-center">
                                <?
                                    $user=getBookingList(1);

                                    while($row=$user->fetch_assoc()){
                                ?>
                                <tr>
                                    <td><? echo date('d F Y, h:i A', strtotime($row['classdate'])); ?></td>
                                    <td><? echo $row['classsubject']; ?></td>
                                    <td><? echo $row['classfee']; ?></td>
                                    <td><? echo $row['classlocation'] ?></td>
                                    <td><? echo $row['teachername'] ?></td>
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
                                    <td>
                                        <div class="row text-center">
                                            <div class="<? echo $row['bookingstatus']==0?'col-md-4':'col-md-6'; ?>">
                                                <a href="../view/booking_view.php?id=<? echo $row['bookingid'];?>" class="btn btn-primary" id="card-btn">Lihat</a>
                                            </div>
                                            <div class="<? echo $row['bookingstatus']==0?'col-md-4':'col-md-6'; ?> delete" data-id="<? echo $row['bookingid'] ?>">
                                                <a href="" class="btn btn-danger" id="card-btn">Padam</a>
                                            </div>
                                            <? if($row['bookingstatus']==0){ ?>
                                                <div class="col-md-4">
                                                    <a href="../view/booking_payment.php?id=<? echo $row['bookingid'] ?>" class="btn btn-success" id="card-btn">Bayar</a>
                                                </div>
                                            <? } ?>
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