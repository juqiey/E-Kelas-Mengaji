<!-- Session start here -->
<?
require '../model/mosque_function.php';
?>

<html lang="en">
<head>
    <?
    $title="Senarai Masjid";
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
                <div class="card">
                    <div class="card-header text-center">
                        <h3>
                            <i class="fas fa-table me-1"></i>
                            Senarai Masjid Terengganu
                        </h3>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Nombor Telefon</th>
                                <th>Daerah</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Nombor Telefon</th>
                                <th>Daerah</th>
                                <th></th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?
                            $mosque=getMosqueList();

                            while($row=$mosque->fetch_assoc()){
                                ?>
                                <tr>
                                    <td><? echo $row['mosquename'] ?></td>
                                    <td><? echo $row['mosqueaddress'] ?></td>
                                    <td><? echo $row['mosquephoneno'] ?></td>
                                    <td><? echo $row['mosquedistrict'] ?></td>
                                    <td>
                                        <div class="row text-center">
                                            <div class="col-md-6">
                                                <a href="#" class="btn btn-primary" id="card-btn" data-toggle="modal" data-target="#viewMosque" data-id="<? echo $row['id'] ?>">Lihat</a>
                                            </div>
                                            <div class="col-md-6 delete" data-id="<? echo $row['bookingid'] ?>">
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

<?
require '../global/script.php';
?>
</body >
</html>
