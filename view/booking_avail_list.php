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
                        <div class="card mb-4">
                            <div class="card-header text-center">
                                <h3>Slot Kelas Mengaji</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-4 col-md-6">
                                        <div class="card mb-4">
                                            <div class="card-header"><h3 class="text-center">Test Tajuk</h3></div>
                                            <div class="card-body">
                                                <p class="text-center">Masjid:</p>
                                                <div class="row text-center">
                                                    <div class="col-md-6">
                                                        Tarikh:
                                                    </div>
                                                    <div class="col-md-6">
                                                        Masa:
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row">
                                                    <div class="col-md-6 text-center">
                                                        <a href="" class="btn btn-primary" id="card-btn">View</a>
                                                    </div>
                                                    <div class="col-md-6 text-center">
                                                        <a href="" class="btn btn-success" id="card-btn">Tempah</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6">
                                        <div class="card mb-4">
                                            <div class="card-header"><h3 class="text-center">Test Tajuk</h3></div>
                                            <div class="card-body">
                                                <p class="text-center">Masjid:</p>
                                                <div class="row text-center">
                                                    <div class="col-md-6">
                                                        Tarikh:
                                                    </div>
                                                    <div class="col-md-6">
                                                        Masa:
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row">
                                                    <div class="col-md-6 text-center">
                                                        <a href="" class="btn btn-primary" id="card-btn">View</a>
                                                    </div>
                                                    <div class="col-md-6 text-center">
                                                        <a href="" class="btn btn-success" id="card-btn">Tempah</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6">
                                        <div class="card mb-4">
                                            <div class="card-header"><h3 class="text-center">Test Tajuk</h3></div>
                                            <div class="card-body">
                                                <p class="text-center">Masjid:</p>
                                                <div class="row text-center">
                                                    <div class="col-md-6">
                                                        Tarikh:
                                                    </div>
                                                    <div class="col-md-6">
                                                        Masa:
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row">
                                                    <div class="col-md-6 text-center">
                                                        <a href="" class="btn btn-primary" id="card-btn">View</a>
                                                    </div>
                                                    <div class="col-md-6 text-center">
                                                        <a href="" class="btn btn-success" id="card-btn">Tempah</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6">
                                        <div class="card mb-4">
                                            <div class="card-header"><h3 class="text-center">Test Tajuk</h3></div>
                                            <div class="card-body">
                                                <p class="text-center">Masjid:</p>
                                                <div class="row text-center">
                                                    <div class="col-md-6">
                                                        Tarikh:
                                                    </div>
                                                    <div class="col-md-6">
                                                        Masa:
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row">
                                                    <div class="col-md-6 text-center">
                                                        <a href="" class="btn btn-primary" id="card-btn">View</a>
                                                    </div>
                                                    <div class="col-md-6 text-center">
                                                        <a href="" class="btn btn-success" id="card-btn">Tempah</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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