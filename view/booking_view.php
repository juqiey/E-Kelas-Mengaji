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
                    <div class="card-header text-center">
                        <h3>
                            <? echo $booking['classsubject'];?>
                        </h3>
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