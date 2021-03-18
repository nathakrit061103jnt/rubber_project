<?php
session_start();
if ($_SESSION['id'] == null) {
    header("Location:../rubber/login/stafflogin.php");
}
include_once("./connectdb.php");
$stmt = $conn->prepare("SELECT COUNT(FM_id) AS total FROM farmer");
$stmt->execute();
$result = $stmt->get_result();
$row = mysqli_fetch_assoc($result);
$stmt = $conn->prepare("SELECT COUNT(MD_id) AS total FROM middleman");
$stmt->execute();
$result1 = $stmt->get_result();
$row1 = mysqli_fetch_assoc($result1);
$stmt = $conn->prepare("SELECT SUM(weightItem) AS total FROM inform WHERE weightnum");
$stmt->execute();
$result2 = $stmt->get_result();
$row2 = mysqli_fetch_assoc($result2);
$stmt = $conn->prepare("select * from price_rubber");
$stmt->execute();
$result3 = $stmt->get_result();
$row3 = mysqli_fetch_assoc($result3);
$datespilt = explode("-", $row3['date']);
if ($datespilt[1] == "01") {
    $datespilt[1] = "มกราคม";
} elseif ($datespilt[1] == "02") {
    $datespilt[1] = "กุมภาพันธ์";
} elseif ($datespilt[1] == "03") {
    $datespilt[1] = "มีนาคม";
} elseif ($datespilt[1] == "04") {
    $datespilt[1] = "เมษายน";
} elseif ($datespilt[1] == "05") {
    $datespilt[1] = "พฤษภาคม";
} elseif ($datespilt[1] == "06") {
    $datespilt[1] = "มิถุนายน";
} elseif ($datespilt[1] == "07") {
    $datespilt[1] = "กรกฎาคม";
} elseif ($datespilt[1] == "08") {
    $datespilt[1] = "กันยายน";
} elseif ($datespilt[1] == "09") {
    $datespilt[1] = "สิงหาคม";
} elseif ($datespilt[1] == "10") {
    $datespilt[1] = "ตุลาคม";
} elseif ($datespilt[1] == "11") {
    $datespilt[1] = "พฤษจิกายน";
} elseif ($datespilt[1] == "12") {
    $datespilt[1] = "ธันวาคม";
}
$date = $datespilt[2] . ' ' . $datespilt[1] . ' ' . $datespilt[0];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>ระบบบริหารจัดการข้อมูลยางพารา</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.ico">
    <!-- Pignose Calender -->
    <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <!-- การลิ้ง sweetalert2 เเบบ cdn  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.php">
                    <b class="logo-abbr"><img src="images/lanlogo1.png" alt=""> </b>
                    <span class="logo-compact"><img src="./images/lanlogo.png" alt=""></span>
                    <span class="brand-title">
                        <img src="images/lanlogo.png" style="position: absolute;top: 4%;" width="190" height="80"
                            alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i
                                    class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard"
                            aria-label="Search Dashboard">
                        <div class="drop-down animated flipInX d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">แดชบอร์ด</li>
                    <a href="./index.php" class="icon-graph menu-icon" href="javascript:void()" aria-expanded="false">
                        <i></i><span class="nav-text">หน้าหลัก</span>
                    </a>
                    <li class="nav-label">ฟอร์มต่างๆ</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-note menu-icon"></i><span class="nav-text">ฟอร์ม</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./form-sale.php">บันทึกการขายยางพารา</a></li>
                            <li><a href="./form-purchase.php">บันทึกการรับซื้อยางพารา</a></li>
                            <li><a href="./form-pricerubber.php">บันทึกข้อมูลราคายางพารา</a></li>
                            <li><a href="./form-inform.php">บันทึกการแจ้งน้ำหนัก</a></li>
                            <li><a href="./form-farmer.php">เพิ่มข้อมูลเกษตรกร</a></li>
                            <li><a href="./form-middleman.php">เพิ่มข้อมูลพ่อค้าลานประมูล</a></li>
                            <li><a href="./form-employee.php">เพิ่มข้อมูลพนักงาน</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">ตารางข้อมูล</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">ตารางแสดงข้อมูล</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./table-dataPR.php" aria-expanded="false">ข้อมูลราคายางพารา</a></li>
                            <li><a href="./table-dataFM.php" aria-expanded="false">ข้อมูลสมาชิกเกษตรกร</a></li>
                            <li><a href="./table-dataMD.php" aria-expanded="false">ข้อมูลสมาชิกพ่อค้า</a></li>
                            <li><a href="./table-dataPRMD.php" aria-expanded="false">ข้อมูลการส่งราคายางพารา</a></li>
                            <li><a href="./table-dataPurchase.php" aria-expanded="false">ข้อมูลการรับซื้อยางพารา</a>
                            </li>
                            <li><a href="./table-dataIncome.php" aria-expanded="false">ข้อมูลบัญชีรายรับ-รายจ่าย</a>
                            </li>
                            <li><a href="./table-dataInform.php" aria-expanded="false">ข้อมูลการแจ้งน้ำหนัก</a></li>
                            <li><a href="./table-dataSale.php" aria-expanded="false">ข้อมูลการขายยางพารา</a></li>
                            <li><a href="./table-dataEM.php" aria-expanded="false">ข้อมูลพนักงานลานประมูล</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="../rubber/login/logout.php" class="" href="javascript:void()" aria-expanded="false">
                            <i></i><span class="nav-text">ออกจากระบบ</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">น้ำหนักยางพาราโดยรวม</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $row2['total'] ?> กิโลกรัม</h2>
                                    <p class="text-white mb-0"><?php echo $date ?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">ยอดรวม</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $row2['total'] * $row3['price'] ?> บาท</h2>
                                    <p class="text-white mb-0"><?php echo $date ?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">จำนวนเกษตกร</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $row['total'] ?> คน</h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">จำนวนพ่อค้า</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $row1['total'] ?> คน</h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">ราคายาง (รายปี)</h3>
                                <div>
                                    <canvas id="myChart" width="400" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">น้ำหนักยางพาราแต่ละรอบ(รายปี)</h3>
                                <div>
                                    <canvas id="myChart1" width="400" height="400"></canvas>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <!-- #/ container -->
            </div>
            <!--**********************************
            Content body end
        ***********************************-->


            <!--**********************************
            Footer start
        ***********************************-->
            <div class="footer">
                <div class="copyright">
                    <p>Copyright &copy; Designed & Developed by <a
                            href="https://themeforest.net/user/quixlab">Quixlab</a>
                        2018</p>
                </div>
            </div>
            <!--**********************************
            Footer end
        ***********************************-->
        </div>
        <!--**********************************
        Main wrapper end
    ***********************************-->

        <?php
        include_once("./function.php");
        include_once("./connectdb.php");
        $price_rubber_1_1 = price_rubber($conn, "01-01");
        $price_rubber_1_16 = price_rubber($conn, "01-16");
        $price_rubber_2_1 = price_rubber($conn, "02-01");
        $price_rubber_2_16 = price_rubber($conn, "02-16");
        $price_rubber_3_1 = price_rubber($conn, "03-01");
        $price_rubber_3_16 = price_rubber($conn, "03-16");
        $price_rubber_4_1 = price_rubber($conn, "04-01");
        $price_rubber_4_16 = price_rubber($conn, "04-16");
        $price_rubber_5_1 = price_rubber($conn, "05-01");
        $price_rubber_5_16 = price_rubber($conn, "05-16");
        $price_rubber_6_1 = price_rubber($conn, "06-01");
        $price_rubber_6_16 = price_rubber($conn, "06-16");
        $price_rubber_7_1 = price_rubber($conn, "07-01");
        $price_rubber_7_16 = price_rubber($conn, "07-16");
        $price_rubber_8_1 = price_rubber($conn, "08-01");
        $price_rubber_8_16 = price_rubber($conn, "08-16");
        $price_rubber_9_1 = price_rubber($conn, "09-01");
        $price_rubber_9_16 = price_rubber($conn, "09-16");
        $price_rubber_10_1 = price_rubber($conn, "10-01");
        $price_rubber_10_16 = price_rubber($conn, "10-16");
        $price_rubber_11_1 = price_rubber($conn, "11-01");
        $price_rubber_11_16 = price_rubber($conn, "11-16");
        $price_rubber_12_1 = price_rubber($conn, "12-01");
        $price_rubber_12_16 = price_rubber($conn, "12-16");

        $weight_rubber_1_1 = weight_rubber($conn, "01-01");
        $weight_rubber_1_16 = weight_rubber($conn, "01-16");
        $weight_rubber_2_1 = weight_rubber($conn, "02-01");
        $weight_rubber_2_16 = weight_rubber($conn, "02-16");
        $weight_rubber_3_1 = weight_rubber($conn, "03-01");
        $weight_rubber_3_16 = weight_rubber($conn, "03-16");
        $weight_rubber_4_1 = weight_rubber($conn, "04-01");
        $weight_rubber_4_16 = weight_rubber($conn, "04-16");
        $weight_rubber_5_1 = weight_rubber($conn, "05-01");
        $weight_rubber_5_16 = weight_rubber($conn, "05-16");
        $weight_rubber_6_1 = weight_rubber($conn, "06-01");
        $weight_rubber_6_16 = weight_rubber($conn, "06-16");
        $weight_rubber_7_1 = weight_rubber($conn, "07-01");
        $weight_rubber_7_16 = weight_rubber($conn, "07-16");
        $weight_rubber_8_1 = weight_rubber($conn, "08-01");
        $weight_rubber_8_16 = weight_rubber($conn, "08-16");
        $weight_rubber_9_1 = weight_rubber($conn, "09-01");
        $weight_rubber_9_16 = weight_rubber($conn, "09-16");
        $weight_rubber_10_1 = weight_rubber($conn, "10-01");
        $weight_rubber_10_16 = weight_rubber($conn, "10-16");
        $weight_rubber_11_1 = weight_rubber($conn, "11-01");
        $weight_rubber_11_16 = weight_rubber($conn, "11-16");
        $weight_rubber_12_1 = weight_rubber($conn, "12-01");
        $weight_rubber_12_16 = weight_rubber($conn, "12-16");



        ?>

        <!--**********************************
        Scripts
    ***********************************-->
        <script src="plugins/common/common.min.js"></script>
        <script src="js/custom.min.js"></script>
        <script src="js/settings.js"></script>
        <script src="js/gleek.js"></script>
        <script src="js/styleSwitcher.js"></script>

        <!-- Chartjs -->
        <script src="./plugins/chart.js/Chart.bundle.min.js"></script>
        <!-- Circle progress -->
        <script src="./plugins/circle-progress/circle-progress.min.js"></script>
        <!-- Datamap -->
        <script src="./plugins/d3v3/index.js"></script>
        <script src="./plugins/topojson/topojson.min.js"></script>
        <script src="./plugins/datamaps/datamaps.world.min.js"></script>
        <!-- Morrisjs -->
        <script src="./plugins/raphael/raphael.min.js"></script>
        <script src="./plugins/morris/morris.min.js"></script>
        <!-- Pignose Calender -->
        <script src="./plugins/moment/moment.min.js"></script>
        <script src="./plugins/pg-calendar/js/pignose.calendar.min.js"></script>
        <!-- ChartistJS -->
        <script src="./plugins/chartist/js/chartist.min.js"></script>
        <script src="./plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



        <script src="./js/dashboard/dashboard-1.js"></script>


        <script>
        "use strict";

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม",
                    "สิงหาคม", "กันยายน", "ตุลาคม",
                    "พฤศจิกายน", "ธันวาคม"
                ],
                datasets: [

                    {
                        data: [<?= $price_rubber_1_1 ?>, <?= $price_rubber_2_1 ?>, <?= $price_rubber_3_1 ?>,
                            <?= $price_rubber_4_1 ?>, <?= $price_rubber_5_1 ?>,
                            <?= $price_rubber_6_1 ?>,
                            <?= $price_rubber_7_1 ?>, <?= $price_rubber_8_1 ?>,
                            <?= $price_rubber_9_1 ?>,
                            <?= $price_rubber_10_1 ?>, <?= $price_rubber_11_1 ?>,
                            <?= $price_rubber_12_1 ?>
                        ],
                        backgroundColor: [
                            "#ff4081", "#ff4081", "#ff4081",
                            "#ff4081", "#ff4081", "#ff4081",
                            "#ff4081", "#ff4081", "#ff4081",
                            "#ff4081", "#ff4081", "#ff4081"
                        ],
                        hoverBorderColor: [
                            "#ff4000", "#ff4000", "#ff4000",
                            "#ff4000", "#ff4000", "#ff4000",
                            "#ff4000", "#ff4000", "#ff4000",
                            "#ff4000", "#ff4000", "#ff4000"
                        ],
                        borderWidth: 1
                    },

                    {
                        data: [<?= $price_rubber_1_16 ?>, <?= $price_rubber_2_16 ?>,
                            <?= $price_rubber_3_16 ?>,
                            <?= $price_rubber_4_16 ?>, <?= $price_rubber_5_16 ?>,
                            <?= $price_rubber_6_16 ?>,
                            <?= $price_rubber_7_16 ?>, <?= $price_rubber_8_16 ?>,
                            <?= $price_rubber_9_16 ?>,
                            <?= $price_rubber_10_16 ?>, <?= $price_rubber_11_16 ?>,
                            <?= $price_rubber_12_16 ?>
                        ],
                        backgroundColor: [
                            "#6200ea", "#6200ea", "#6200ea",
                            "#6200ea", "#6200ea", "#6200ea",
                            "#6200ea", "#6200ea", "#6200ea",
                            "#6200ea", "#6200ea", "#6200ea"
                        ],
                        hoverBorderColor: [
                            "#620000", "#620000", "#620000",
                            "#620000", "#620000", "#620000",
                            "#620000", "#620000", "#620000",
                            "#620000", "#620000", "#620000",
                        ],
                        borderWidth: 1
                    },


                ],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: "#dddfeb",
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false,
                },
                cutoutPercentage: 80,
            },
        });
        </script>
        <script>
        "use strict";

        var ctx1 = document.getElementById('myChart1').getContext('2d');
        var myChart1 = new Chart(ctx1, {
            type: "bar",
            data: {
                labels: ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม",
                    "สิงหาคม", "กันยายน", "ตุลาคม",
                    "พฤศจิกายน", "ธันวาคม"
                ],
                datasets: [

                    {
                        data: [<?= $weight_rubber_1_1 ?>, <?= $weight_rubber_2_1 ?>,
                            <?= $weight_rubber_3_1 ?>,
                            <?= $weight_rubber_4_1 ?>, <?= $weight_rubber_5_1 ?>,
                            <?= $weight_rubber_6_1 ?>,
                            <?= $weight_rubber_7_1 ?>, <?= $weight_rubber_8_1 ?>,
                            <?= $weight_rubber_9_1 ?>,
                            <?= $weight_rubber_10_1 ?>, <?= $weight_rubber_11_1 ?>,
                            <?= $weight_rubber_12_1 ?>
                        ],
                        backgroundColor: [
                            "#ff4081", "#ff4081", "#ff4081",
                            "#ff4081", "#ff4081", "#ff4081",
                            "#ff4081", "#ff4081", "#ff4081",
                            "#ff4081", "#ff4081", "#ff4081"
                        ],
                        hoverBorderColor: [
                            "#ff4000", "#ff4000", "#ff4000",
                            "#ff4000", "#ff4000", "#ff4000",
                            "#ff4000", "#ff4000", "#ff4000",
                            "#ff4000", "#ff4000", "#ff4000"
                        ],
                        borderWidth: 1
                    },

                    {
                        data: [<?= $weight_rubber_1_16 ?>, <?= $weight_rubber_2_16 ?>,
                            <?= $weight_rubber_3_16 ?>,
                            <?= $weight_rubber_4_16 ?>, <?= $weight_rubber_5_16 ?>,
                            <?= $weight_rubber_6_16 ?>,
                            <?= $weight_rubber_7_16 ?>, <?= $weight_rubber_8_16 ?>,
                            <?= $weight_rubber_9_16 ?>,
                            <?= $weight_rubber_10_16 ?>, <?= $weight_rubber_11_16 ?>,
                            <?= $weight_rubber_12_16 ?>
                        ],
                        backgroundColor: [
                            "#6200ea", "#6200ea", "#6200ea",
                            "#6200ea", "#6200ea", "#6200ea",
                            "#6200ea", "#6200ea", "#6200ea",
                            "#6200ea", "#6200ea", "#6200ea"
                        ],
                        hoverBorderColor: [
                            "#620000", "#620000", "#620000",
                            "#620000", "#620000", "#620000",
                            "#620000", "#620000", "#620000",
                            "#620000", "#620000", "#620000",
                        ],
                        borderWidth: 1
                    },


                ],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: "#dddfeb",
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false,
                },
                cutoutPercentage: 80,
            },
        });
        </script>



</body>

</html>