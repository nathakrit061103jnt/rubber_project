<?php
include("connectdb.php");

$stmt = $conn->prepare("SELECT price FROM price_rubber ORDER BY price DESC");
$stmt->execute();
$result4 = $stmt->get_result();
$row4 = mysqli_fetch_assoc($result4);
$price = $row4["price"];

$stmt = $conn->prepare("select * from farmer");
$stmt->execute();
$result = $stmt->get_result();
$stmt = $conn->prepare("select * from inform");
$stmt->execute();
$result2 = $stmt->get_result();
$row2 = mysqli_fetch_assoc($result2);
$stmt = $conn->prepare("select * from employee");
$stmt->execute();
$result1 = $stmt->get_result();
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
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h1>บันทึกการรับซื้อยางพารา</h1>
                                <div class="form-validation">
                                    <form class="form-valide" action="form-purchase.php" method="post">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">วันที่ <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="date" class="form-control" id="PurchaseDate"
                                                    name="PurchaseDate">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">น้ำหนักยางพารา<span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="weightItem"
                                                    name="weightItem">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">ราคายาง/หน่วย<span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="price" name="price"
                                                    value="<?php echo $price ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">ชื่อเกษตรกร <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" name="cus">
                                                    <option value="">
                                                        <-- เลือกรายชื่อเกษตรกร -->
                                                    </option>
                                                    <?php
                                                    if ($result->num_rows > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                    <option value="<?php echo $row["FM_id"] ?>">
                                                        <?php echo $row["FM_name"] ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">พนักงานที่บันทึก<span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" name="emp">
                                                    <option value="">
                                                        <-- เลือกรายชื่อเจ้าหน้าที่ -->
                                                    </option>
                                                    <?php
                                                    if ($result1->num_rows > 0) {
                                                        while ($row = mysqli_fetch_assoc($result1)) {
                                                    ?>
                                                    <option value="<?php echo $row["EM_id"] ?>">
                                                        <?php echo $row["EM_name"] ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <input type="hidden" class="form-control" id="InformID" name="InformID"
                                                    value="<?php echo $row2["InformID"]; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" name="add" class="btn btn-primary">Submit</button>
                                            </div>
                                            </d>
                                    </form>
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
        if (isset($_POST['add'])) {
            include_once("connectdb.php");

            $TotalPrice = (intval($_POST['weightItem']) * intval($_POST['price']));
            $sqlUp = "INSERT INTO purchase (PurchaseID, PurchaseDate, weightItem, TotalPrice, InformID, FM_id, EM_id, price) 
            VALUES (NULL, '{$_POST["PurchaseDate"]}', '{$_POST["weightItem"]}', '{$TotalPrice}', '{$_POST["InformID"]}', '{$_POST["cus"]}', '{$_POST["emp"]}', '{$_POST["price"]}');";
            if (mysqli_query($conn, $sqlUp)) {
                echo
                "<script> 
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'เพิ่มข้อมูลสำเร็จ',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(()=> windows.location = 'form-purchase.php')
                </script>";
            } else {
                echo
                "<script> 
                    Swal.fire({
                        icon: 'error',
                        title: 'เพิ่มข้อมูลไม่สำเร็จ', 
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

    <script src="./plugins/validation/jquery.validate.min.js"></script>
    <script src="./plugins/validation/jquery.validate-init.js"></script>

</body>

</html>