<!-- Session start here -->
<?

require '../global/session_check.php';
require '../model/class_function.php';
echo $_SESSION['role'];

$query=$_GET['query']?:'';

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
                <div class="card mb-4">
                    <div class="card-header text-center">
                        <h3>Slot Kelas Mengaji</h3>
                    </div>
                    <div class="card-body">
                        <form action="../view/class_avail_search.php" name="search" method="get">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <input type="text" name="query" class="form-control" placeholder="Carian Kelas">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Cari</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <?
                            $class=searchClass($query);

                            if(mysqli_num_rows($class)==0){ ?>
                                <div class="row text-center justify-content-center">
                                    <div class="col-md-6">
                                        <h3>Harap Maaf, carian anda tidak tersedia</h3>
                                    </div>
                                </div>
                            <?}else{

                            while($row=$class->fetch_assoc()){
                                ?>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card mb-4">
                                        <div class="card-header"><h3 class="text-center"><? echo $row['classsubject'];?></h3></div>
                                        <div class="card-body">
                                            <p class="text-center">Lokasi: <b><? echo $row['mosquename']; ?></b></p>
                                            <div class="row text-center mb-2">
                                                <div class="col-md-6">
                                                    Tarikh: <b><? echo date('d M Y',strtotime($row['classdate'])); ?></b>
                                                </div>
                                                <div class="col-md-6">
                                                    Masa: <b><? echo date('g:i A',strtotime($row['classdate'])); ?></b>
                                                </div>
                                            </div>
                                            <div class="row text-center mb-2">
                                                <div class="col-md-6">
                                                    Yuran: <b><? echo $row['classfee']!=null?'RM'.$row['classfee']:'Percuma' ?></b>
                                                </div>
                                                <div class="col-md-6">
                                                    Quota: <b><? echo $row['classquota']!=null?$row['classquota']:'Terbuka'; ?></b>
                                                </div>
                                            </div>
                                            <div class="row text-center mb-2">
                                                <div class="col-md-12">
                                                    Pengajar: <b><? echo $row['teachername'] ?></b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row justify-content-center">
                                                <div class="col-md-6 mb-md-3 text-center">
                                                    <a href="../view/class_view.php?id=<? echo $row['classid'] ?>" class="btn btn-success" id="card-btn">View</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?
                            } }
                            ?>
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