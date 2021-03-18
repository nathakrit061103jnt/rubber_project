<?php require_once "connectdb.php";

$stmt = $conn->prepare("select * from farmer");
$stmt->execute();
$result = $stmt->get_result();
if (isset($_GET['id'])) {
    $userid = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM farmer WHERE FM_id=?");
    $stmt->bind_param("d", $userid);
    $stmt->execute();
    header("Location:table-dataFM.php");
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
                                <h4 class="card-title">ตารางเกษตรกร</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>รหัสเกษตรกร</th>
                                                <th>ชื่อ</th>
                                                <th>ที่อยู่</th>
                                                <th>เบอร์โทร</th>
                                                <th>อีเมลล์</th>
                                                <th>รหัสประจำตัวประชาชน</th>
                                                <th>ชื่อผู้ใช้</th>
                                                <th>รหัสผ่าน</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $index = 1;
                                            if ($result->num_rows > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $index ?></td>
                                                <td><?php echo $row['FM_id'] ?></td>
                                                <td><?php echo $row['FM_name'] ?></td>
                                                <td><?php echo $row['address'] ?></td>
                                                <td><?php echo $row['tel'] ?></td>
                                                <td><?php echo $row['email'] ?></td>
                                                <td><?php echo $row['ID_code'] ?></td>
                                                <td><?php echo $row['username'] ?></td>
                                                <td><?php echo $row['password'] ?></td>
                                                <td><button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModal<?php echo $row['FM_id'] ?>">แก้ไข</button>
                                                    <a href="table-dataFM.php?id=<?php echo $row['FM_id'] ?>"
                                                        type="button"
                                                        onclick="return confirm('ต้องการลบข้อมูลใช่หรือไม่ ?')"
                                                        class="btn btn-danger">ลบ</a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="exampleModal<?php echo $row['FM_id'] ?>"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <form method="post">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    แก้ไขข้อมูล
                                                                    <?php echo $row['FM_id'] ?>
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="FM_id"
                                                                        value="<?php echo $row['FM_id'] ?>"
                                                                        class="form-control" id="recipient-name">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text"
                                                                        class="col-form-label">ชื่อ - นามสกุล</label>
                                                                    <input value="<?php echo $row['FM_name'] ?>"
                                                                        type="text" class="form-control"
                                                                        id="message-text" name="FM_name">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text"
                                                                        class="col-form-label">รหัสประจำตัวประชาชน</label>
                                                                    <input value="<?php echo $row['ID_code'] ?>"
                                                                        type="text" class="form-control"
                                                                        id="message-text" name="ID_code">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text"
                                                                        class="col-form-label">ที่อยู่</label>
                                                                    <input value="<?php echo $row['address'] ?>"
                                                                        type="text" class="form-control"
                                                                        id="message-text" name="address">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text"
                                                                        class="col-form-label">เบอร์โทร</label>
                                                                    <input value="<?php echo $row['tel'] ?>" type="text"
                                                                        class="form-control" id="message-text"
                                                                        name="tel">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text"
                                                                        class="col-form-label">อีเมลล์</label>
                                                                    <input value="<?php echo $row['email'] ?>"
                                                                        type="test" class="form-control"
                                                                        id="message-text" name="email">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text"
                                                                        class="col-form-label">จำนวนสวนยางพารา</label>
                                                                    <input value="<?php echo $row['Total_rubber'] ?>"
                                                                        type="text" class="form-control"
                                                                        id="message-text" name="Total_rubber">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text"
                                                                        class="col-form-label">ชื่อผู้ใช้</label>
                                                                    <input value="<?php echo $row['username'] ?>"
                                                                        type="text" class="form-control"
                                                                        id="message-text" name="username">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text"
                                                                        class="col-form-label">รหัสผ่าน</label>
                                                                    <input value="<?php echo $row['password'] ?>"
                                                                        type="text" class="form-control"
                                                                        id="message-text" name="password">
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
            $sqlUp = "UPDATE farmer fm SET fm.FM_name = '{$_POST["FM_name"]}', fm.ID_code = '{$_POST["ID_code"]}', fm.address = '{$_POST["address"]}' , fm.tel = '{$_POST["tel"]}',
             fm.email = '{$_POST["email"]}', fm.Total_rubber = '{$_POST["Total_rubber"]}', fm.username = '{$_POST["username"]}', fm.password = '{$_POST["password"]}'
                      WHERE fm.FM_id = '{$_POST["FM_id"]}';";

            if (mysqli_query($conn, $sqlUp)) {
                echo
                "<script> 
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'เเก้ไขข้อมูลสำเร็จ',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(()=> location = 'table-dataFM.php')
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