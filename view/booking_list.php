<!-- Session start here -->
<?php
    require '../model/booking_function.php';
?>

<html lang="en">
<head>
    <?
    $title="Tempahan Slot Kelas";
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
                            My Class
                        </h3>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Tarikh</th>
                                    <th>Masa</th>
                                    <th>Lokasi</th>
                                    <th>Pengajar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Tarikh</th>
                                    <th>Masa</th>
                                    <th>Lokasi</th>
                                    <th>Pengajar</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody class="text-center">
                                <?
                                    $user=getBookingList(1);

                                    while($row=$user->fetch_assoc()){
                                ?>
                                <tr>
                                    <td><? echo date('d F Y', strtotime($row['bookingdate'])); ?></td>
                                    <td><? echo date('h:i A', strtotime($row['bookingdate'])); ?></td>
                                    <td><? echo $row['classlocation'] ?></td>
                                    <td><? echo $row['teachername'] ?></td>
                                    <td>
                                        <div class="row text-center">
                                            <div class="col-md-6">
                                                <a href="" class="btn btn-success" id="card-btn">View</a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="" class="btn btn-danger" id="card-btn">Delete</a>
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

<?
require '../global/script.php';
?>
</body >
</html>