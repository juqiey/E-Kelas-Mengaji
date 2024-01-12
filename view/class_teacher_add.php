<?
require '../model/class_function.php';

?>

<html lang="en">
<head>
    <?
    $title="Borang Sesi Kelas Baharu (Kegunaan Pengajar)";
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
                    <div class="card-header text-center">
                        <h3>
                            <i class="fas fa-table me-1"></i>
                            Borang Sesi Kelas Baharu
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="../controller/class_add_exec.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-9">
                                            <label for="subject">Tajuk Kuliah</label>
                                            <input type="text" class="form-control" name="subject" id="subject" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="date">Tarikh & Masa Kuliah<span class="text-danger">*</span></label>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <input type="date" class="form-control" name="date" id="date" value="2024-01-10">
                                                </div>
                                                <div class="d-none">
                                                    <label for="time">Masa</label><code>*</code>
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="time" class="form-control" name="time" id="time" value="00:00">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-10">
                                            <label for="desc">Maklumat Kelas</label>
                                            <textarea id="desc" class="form-control" name="desc" rows="3" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <label for="quota">Quota Kelas</label>
                                                    <input type="number" class="form-control" name="quota" min="0">
                                                </div>
                                                <div class="col-md-5">
                                                    <label for="fee">Yuran (RM)</label>
                                                    <input type="number" class="form-control" name="fee" min="0">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-10">
                                            <label for="mosque">Lokasi (Masjid)</label>
                                            <select name="mosque" id="mosque" class="form-control">
                                                <? echo getDropdownMosque(''); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end mt-4 mb-4">
                                <div class="col-md-3 text-center">
                                    <button type="submit" class="btn btn-success" id="card-btn">Simpan</button>
                                </div>
                            </div>
                        </form>
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