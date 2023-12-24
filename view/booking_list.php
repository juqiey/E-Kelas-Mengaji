<!-- Session start here -->

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
                            <tbody>
                                <tr>
                                    <td>1 Januari 2024</td>
                                    <td>9:00 a.m.</td>
                                    <td>Masjid Kubang Ikan</td>
                                    <td>Ustaz Marzuqi</td>
                                    <td>
                                        <a href="" class="btn btn-success">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2 Januari 2024</td>
                                    <td>9:00 a.m.</td>
                                    <td>Masjid Kubang Ikan</td>
                                    <td>Fakhrullah</td>
                                    <td>
                                        <a href="" class="btn btn-success">View</a>
                                    </td>
                                </tr>
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