<!-- Session start here -->
<?
    require '../model/user_function.php';

    $id=$_GET['id'];

    $teacher=viewTeacher($id)->fetch_assoc();
?>

<html lang="en">
<head>
    <?
    $title="Maklumat Guru";
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
        .image-cover {
            width: 200px;
            height: 200px;
            border-radius: 60%;
            margin: 20px;

            object-fit: cover;
            object-position: center right;
        }
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
                    <li class="breadcrumb-item active"><? echo $title; ?></li>
                </ol>
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <h2>Maklumat Peribadi</h2>
                            <hr>
                        </div>
                        <div class="text-center">
                            <?
                            $profile=$teacher['teacherurl'];
                            if($profile==null)
                                $profile="default.jpg";
                            ?>
                            <img src="../img/<? echo $profile ?>" class="image-cover">
                        </div>
                        <div class="text-center">
                            <div class="table-responsive">
                                <table class="table table-bordered text" style="width:100%">
                                    <tr>
                                        <td><b>Nama:</b></td>
                                        <td><? echo $teacher['teachername'] ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Jantina</b></td>
                                        <td><? echo $teacher['teachersex'] ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Tarikh Lahir:</b></td>
                                        <td><? echo date('d F Y',strtotime($teacher['teacherdob'])) ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Nombor Telefon</b></td>
                                        <td><? echo $teacher['teacherphoneno'] ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Emel</b></td>
                                        <td><? echo $teacher['teacheremail'] ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Bank & Nombor Akaun</b></td>
                                        <td><? echo $teacher['teacherbank'].' ('.$teacher['teacheraccountno'].')' ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="" class="btn btn-success">Kemaskini Maklumat</a>
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