<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            $title="Profile Admin";
            require '../global/header.php';
        ?>

        <style>
            .pagetitle {
                margin-bottom: 10px;
            }

            .pagetitle h1 {
                font-size: 24px;
                margin-bottom: 0;
                font-weight: 600;
                color: #012970;
            }
        </style>
    </head>

    <body>
    <?php
        require '../global/navigation_header.php';
    ?>

    <div id="layoutSidenav">
        <?php
            require '../global/sidebar.php';
        ?>

      <div id="layoutSidenav_content">
        <main>
            <!-- Admin Profile -->
            <div class="pagetitle">
            <h1>Profile</h1>
                <nav>
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </nav>
            </div>
            <!-- End Page Title -->


        </main>
      </div>
    </div>
    </body>
</html>