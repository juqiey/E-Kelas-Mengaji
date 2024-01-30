<!-- Session start here -->
<?
    session_start();
    require '../global/session_check.php';
    require '../model/dashboard_function.php';

?>

<html lang="en">
<head>
    <?
    $title="Halaman Utama";
    require '../global/header.php';
    ?>
    <style>
        .digital-clock {
            color: #3C4B64;
            font-family: 'Digital-7', sans-serif; /* You can replace 'Digital-7' with a suitable digital clock font */
            font-size: 40px;
        }

        .date {
            color: #3C4B64;
            font-size: 20px;
        }

        /* Optional: Add animation to simulate the blinking effect of a digital clock */
        @keyframes blink {
            50% {
                opacity: 0.5;
            }
        }

        .digital-clock::after {
            content: ":";
            animation: blink 1s infinite step-start;
        }
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
        .text-pink {
            color: #FF1493; /* Set color to a bright pink shade (similar to magenta) */
        }

        .text-bright-color {
            color: #FF1493; /* Set color to a bright yellow shade */
        }
        .card-3-style {
            background-color: white; /* Set background to white */
            color: #00CED1; /* Turquoise color for text */
        }

        .icon-3-color {
            color: #00CED1; /* Turquoise color for icon */
        }

        .number-3-color {
            color: #00CED1; /* Turquoise color for number */
        }

        .text-3-color {
            color: #00CED1; /* Turquoise color for text */
        }

        .link-3-color {
            color: #00CED1; /* Turquoise color for link */
        }
        .card-danger-style {
            background-color: white; /* Red color for danger */
            color: #008000; /* Green color for text */
        }

        .icon-danger-color {
            color: #008000; /* Green color for icon */
        }

        .number-danger-color {
            color: #008000; /* Green color for number */
        }

        .text-danger-color {
            color: #008000; /* Green color for text */
        }

        .link-danger-color {
            color: #008000; /* Green color for link */
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
                <div class="container-fluid px-4">
                    <h1 class="mt-4"><? echo $title ?></h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"><? echo $title ?></li>
                    </ol>
                    <div class="row justify-content-center mb-3">
                        <div class="col-md-3 mt-3 text-center">
                            <div class="row">
                                <div class="digital-clock">00:00:00</div>
                                <div class="date">day</div>
                            </div>
                        </div>
                    </div>
                    <? if($_SESSION['role']==1||$_SESSION['role']==2){ ?>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-white mb-4"> <!-- Set background to white -->
                                <div class="card-body">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <i class="fas fa-user fa-3x text-pink mr-3"></i> <!-- Set user icon color to pink and adjust margin -->
                                        <div>
                                            <h5 class="text-bright-color mb-0"><? echo getTotalStudent(); ?></h5> <!-- Add the number of students with bright color -->
                                            <p class="small text-muted mb-0">Pelajar</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-pink stretched-link" href="#">View Details</a> <!-- Set link text color to pink -->
                                    <div class="small text-pink"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card custom-card-style">
                                <div class="card-body">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <i class="fas fa-user fa-3x custom-icon-color mr-3"></i>
                                        <div>
                                            <h5 class="custom-number-color mb-0"><? echo getTotalTeacher(); ?></h5>
                                            <p class="small text-muted mb-0">Pengajar</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small custom-link-color stretched-link" href="#">View Details</a>
                                    <div class="small custom-link-color"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-3-style">
                                <div class="card-body">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <i class="fas fa-icon fa-3x icon-3-color mr-3"></i> <!-- Use a specific icon class -->
                                        <div>
                                            <h5 class="number-3-color mb-0"><? echo getTotalClass(); ?></h5>
                                            <p class="small text-muted mb-0 text-3-color">Sesi Kelas</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small link-3-color stretched-link" href="#">View Details</a>
                                    <div class="small link-3-color"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-danger-style">
                                <div class="card-body">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <i class="fas fa-money-bill fa-3x icon-danger-color mr-3"></i> <!-- Money icon with green color -->
                                        <div>
                                            <h5 class="number-danger-color mb-0">RM<? echo getTotalFee() ?></h5>
                                            <p class="small text-muted mb-0 text-danger-color">Jumlah Kutipan</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small link-danger-color stretched-link" href="#">View Details</a>
                                    <div class="small link-danger-color"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <? } ?>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="card text-center flex-grow-1 px-3">
                                    <h3 class="title">Kalendar Kelas</h3>
                                    <div class="card-body">
                                        <div id="calendar" style="margin-bottom: 12px; margin-top: 12px;"></div>
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
<script>
    //script for calendar
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            initialDate: '<? echo date("Y-m-d"); ?>',
            navLinks: true, // can click day/week names to navigate views
            selectable: true,
            selectMirror: true,
            /*select: function(arg) {
              var title = prompt('Event Title:');
              if (title) {
              calendar.addEvent({
                  title: title,
                  start: arg.start,
                  end: arg.end,
                  allDay: arg.allDay
              })

              //insert into database here
              }
              calendar.unselect()
          },*/
            editable: false,
            dayMaxEvents: true, // allow "more" link when too many events
            //display from database
            events: [
                //loop for data from database here
                <?
                    if($_SESSION['role']==1){
                        $class=getUpcomingClassTeacher($_SESSION['id']);
                    }else if($_SESSION['role']==3){
                        $class=getBookingList($_SESSION['id']);
                    }

                while($row=$class->fetch_assoc()){
                ?>
                {
                    title: '<? echo $row['classsubject'] ?>',
                    start: '<? echo date('Y-m-d',strtotime($row['classdate'])) ?>',
                    end: '<? echo date('Y-m-d',strtotime($row['classdate'])) ?>',
                    backgroundColor:'#00539CFF',
                    borderColor:'#f5f5f5'
                },
                <? } ?>
            ]
        });
        calendar.render();
    });

    //script for time and date
    $(document).ready(function() {
        clockUpdate();
        setInterval(clockUpdate, 1000);
    })

    function clockUpdate() {
        var date = new Date();
        var h = date.getHours();
        var m = date.getMinutes();
        var s = date.getSeconds();
        var session = "AM";
        var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        var d = date.toLocaleDateString(undefined, options);

        if(h == 0){
            h = 12;
        }

        if(h > 12){
            h = h - 12;
            session = "PM";
        }

        h = (h < 10) ? "0" + h : h;
        m = (m < 10) ? "0" + m : m;
        s = (s < 10) ? "0" + s : s;



        $('.digital-clock').text(h + ':' + m + ':' + s + ' ' + session);
        $('.date').text(d);
    }
</script>
</body >
</html>