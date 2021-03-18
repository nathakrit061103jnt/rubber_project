<?php require_once "connectdb.php";

$stmt = $conn->prepare("select * from inform,farmer where inform.FM_id = farmer.FM_id");
$stmt->execute();
$result = $stmt->get_result();
if (isset($_GET['id'])) {
    $userid = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM inform WHERE InformID=?");
    $stmt->bind_param("d", $userid);
    $stmt->execute();
    header("Location:table-dataInform.php");
}


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

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">ตารางการแจ้งน้ำหนักยางพารา</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>รหัสการแจ้ง</th>
                                                <th>ชื่อ</th>
                                                <th>น้ำหนักยางพารา</th>
                                                <th>จำนวนกระสอบ</th>
                                                <th>เบอร์โทร</th>
                                                <th>วันที่แจ้ง</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $index = 1;
                                            if ($result->num_rows > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $datespilt = explode("-", $row['date']);
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
                                                    $date = $datespilt[2] . " - " . $datespilt[1] . " - " . $datespilt[0];
                                            ?>
                                            <tr>
                                                <td><?php echo $index ?></td>
                                                <td><?php echo $row['InformID'] ?></td>
                                                <td><?php echo $row['FM_name'] ?></td>
                                                <td><?php echo $row['weightItem'] ?></td>
                                                <td><?php echo $row['Num_item'] ?></td>
                                                <td><?php echo $row['tel'] ?></td>
                                                <td><?php echo $date ?></td>
                                                <td><button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModal<?php echo $row['InformID'] ?>">แก้ไข</button>
                                                    <a href="table-dataPR.php?id=<?php echo $row['PR_id'] ?>"
                                                        type="button"
                                                        onclick="return confirm('ต้องการลบข้อมูลใช่หรือไม่ ?')"
                                                        class="btn btn-danger">ลบ</a>
                                                    <a href="report/reportInform.php?id=<?php echo $row['InformID'] ?>"
                                                        type="button" class="btn btn-success" target="_blank">พิมพ์</a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="exampleModal<?php echo $row['InformID'] ?>"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <form method="post">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    แก้ไขข้อมูล
                                                                    <?php echo $row['InformID'] ?>
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="InformID"
                                                                        value="<?php echo $row['InformID'] ?>"
                                                                        class="form-control" id="recipient-name">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text"
                                                                        class="col-form-label">น้ำหนักโดยประมาณ</label>
                                                                    <input value="<?php echo $row['weightItem'] ?>"
                                                                        type="text" class="form-control"
                                                                        id="message-text" name="weightItem">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text"
                                                                        class="col-form-label">จำนวนกระสอบ</label>
                                                                    <input value="<?php echo $row['Num_item'] ?>"
                                                                        type="text" class="form-control"
                                                                        id="message-text" name="Num_item">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text"
                                                                        class="col-form-label">วันที่</label>
                                                                    <input value="<?php echo $row['date'] ?>"
                                                                        type="date" class="form-control"
                                                                        id="message-text" name="date">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input value="<?php echo $row['FM_id'] ?>"
                                                                        type="hidden" class="form-control"
                                                                        id="message-text" name="FM_id">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text"
                                                                        class="col-form-label">เลขการแจ้ง</label>
                                                                    <input value="<?php echo $row['weightnum'] ?>"
                                                                        type="text" class="form-control"
                                                                        id="message-text" name="weightnum">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">ปิด</button>
                                                                <button type="submit" name="SubmitUpdate"
                                                                    class="btn btn-primary">เเก้ไข
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <?php
                                                    $index++;
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
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
        <?php

        if (isset($_POST["SubmitUpdate"])) {
            //นำเข้าไฟล์ การเชื่อมต่อฐานข้อมูล
            include_once("connectdb.php");

            //คำสั่ง SQL บันทึกข้อมูลลงฐานข้อมูล
            $sqlUp = "UPDATE inform i SET i.weightItem = '{$_POST["weightItem"]}', i.Num_item = '{$_POST["Num_item"]}' , i.date = '{$_POST["date"]}', i.FM_id = '{$_POST["FM_id"]}', i.weightnum = '{$_POST["weightnum"]}'
                      WHERE i.InformID = '{$_POST["InformID"]}';";

            if (mysqli_query($conn, $sqlUp)) {
                echo
                "<script> 
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'เเก้ไขข้อมูลสำเร็จ',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(()=> location = 'table-dataInform.php')
                </script>";
            } else {
                echo
                "<script> 
                    Swal.fire({
                        icon: 'error',
                        title: 'เเก้ไขข้อมูลไม่สำเร็จ', 
                        text: 'โปรดตรวจสอบความถูกต้องของข้อมูล!',
                    }) 
                </script>";
            }
            mysqli_close($conn);
        }

        ?>


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a>
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

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>

    <script src="./plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

</body>

</html>