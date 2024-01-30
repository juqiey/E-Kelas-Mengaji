<!-- Session start here -->
<?php
session_start();
require '../global/session_check.php';
require '../model/user_function.php';
?>

<html lang="en">
<head>
    <?
    $title="Senarai Pengguna (Pengajar)";
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
                            Senarai Pengajar
                            <a href="../view/teacher_add.php" class="btn btn-md btn-success" style="color:#ebedef" >
                                Tambah Pengajar
                            </a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Tarikh Lahir</th>
                                <th>Jantina</th>
                                <th>Nombor Telefon</th>
                                <th>Emel</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Tarikh Lahir</th>
                                <th>Jantina</th>
                                <th>Nombor Telefon</th>
                                <th>Emel</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody class="text-center">
                            <?
                            $user=getTeacherList();

                            while($row=$user->fetch_assoc()){
                                ?>
                                <tr>
                                    <td><? echo $row['teachername']; ?></td>
                                    <td><? echo $row['teacherusername'] ?></td>
                                    <td><? echo date('d/m/Y',strtotime($row['teacherdob'])) ?></td>
                                    <td><? echo $row['teachersex'] ?></td>
                                    <td><? echo $row['teacherphoneno'] ?></td>
                                    <td><? echo $row['teacheremail'] ?></td>
                                    <td>
                                        <div class="row text-center">
                                            <div class="col-md-6">
                                                <a href="../view/teacher_view.php?id=<? echo $row['teacherid'];?>" class="btn btn-primary" id="card-btn">Lihat</a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="" class="btn btn-danger delete" data-name="<? echo $row['teachername'] ?>" data-id="<? echo $row['teacherid'] ?> id="card-btn">Padam</a>
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
<script>
    // Delete data
    $(document).on('click', '.delete', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var name = $(this).data('name')

        Swal.fire({
            title: "Padam Akaun Ini?",
            text: "Akaun "+name+" akan dipadam secara kekal",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: 'Yes!',
            confirmButtonColor: '#E71C1C',
        })
            .then((value) => {
                if (value.isConfirmed) {
                    location.href = "../controller/teacher_delete_exec.php?id="+id;
                }
            });
    });
</script>
</body >
</html>