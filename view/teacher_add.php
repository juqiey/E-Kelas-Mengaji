<!-- Session start here -->
<?
    require '../model/teacher_function.php';
?>

<html lang="en">
<head>
    <?
    $title="Borang Pengajar Baharu";
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
            width: 300px;
            height: 300px;
            border-radius: 60%;
            margin: 20px;

            object-fit: cover;
            object-position: center right;
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
                    <li class="breadcrumb-item"><a class="visit" href="../view/teacher_list.php">Senarai Pengajar</a></li>
                    <li class="breadcrumb-item active"><? echo $title; ?></li>
                </ol>
                <div class="card">
                    <div class="card-header text-center">
                        <h3>
                            Borang Pengajar Baharu
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="../controller/teacher_add_exec.php" method="POST" enctype="multipart/form-data">
                            <div class="row text-center justify-content-center">
                                <div class="col-md-12">
                                    <h4>Maklumat Peribadi</h4>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-10">
                                            <label for="teachername">Nama Penuh</label>
                                            <input type="text" class="form-control" name="teachername" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label for="teachersex">Jantina</label>
                                            <select name="teachersex" class="form-select">
                                                <? echo getDropdownGender(""); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-9">
                                            <label for="teacherdob">Tarikh Lahir</label>
                                            <input type="date" name="teacherdob" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-9">
                                            <label for="teacherphoneno">Nombor Telefon</label>
                                            <input type="text" name="teacherphoneno" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-9">
                                            <label for="teacheremail">Emel</label>
                                            <input type="text" name="teacheremail" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-9">
                                            <label for="profileurl">Gambar Profil</label>
                                            <input type="file" name="profileurl" id="img" class="form-control" accept=".jpg,.jpeg,.png,.gif">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 text-center">
                                            <div class="gallery" id="gallery">
                                                <!-- Preview image here -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3 text-center justify-content-center">
                                <div class="col-md-12">
                                    <h4>Maklumat Bank</h4>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-9">
                                            <label for="bank">Bank</label>
                                            <select name="bank" class="form-select">
                                                <option value="" selected>Sila pilih bank</option>
                                                <? echo getDropdownBank('') ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-9">
                                            <label for="acoountno">Nombor Akaun</label>
                                            <input type="text" name="accountno" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3 text-center justify-content-center">
                                <div class="col-md-12">
                                    <h4>Maklumat Profil</h4>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-9">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mt-4 mb-4">
                                <div class="col-md-6 text-center">
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
<script>
    $(function() {
        // Multiple images preview in browser
        var imagesPreview = function(input, placeToInsertImagePreview) {

            if (input.files) {
                var filesAmount = input.files.length;
                var filename = $('input[type=file]').val().replace(/C:\\fakepath\\/i, '');

                for (var i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img alt="profile_picture" title="'+filename+'">&nbsp;')).attr({src: event.target.result, class: "image-cover"}).appendTo(placeToInsertImagePreview);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#img').on('change', function() {
            $('#gallery').empty();
            imagesPreview(this, 'div.gallery');
        });
    });
</script>
</body >
</html>