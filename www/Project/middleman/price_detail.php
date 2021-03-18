<?php require_once "connectdb.php";

$stmt = $conn->prepare("select * from price_rubber");
$stmt->execute();
$result = $stmt->get_result();
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Site Metas -->
<title>ข้อมูลราคายางย้อนหลัง</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<!-- Site Icons -->
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="images/apple-touch-icon.png">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Site CSS -->
<link rel="stylesheet" href="style.css">
<!-- Colors CSS -->
<link rel="stylesheet" href="css/colors.css">
<!-- ALL VERSION CSS -->
<link rel="stylesheet" href="css/versions.css">
<!-- Responsive CSS -->
<link rel="stylesheet" href="css/responsive.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="css/custom.css">
<!-- Custom Font -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@500&display=swap" rel="stylesheet">
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="seo_version">

    <!-- LOADER -->
    <div id="preloader">
        <div id="cupcake" class="box">
            <span class="letter">ร</span>
            <div class="cupcakeCircle box">
                <div class="cupcakeInner box">
                    <div class="cupcakeCore box"></div>
                </div>
            </div>
            <span class="letter box">สั</span>
            <span class="letter box">ก</span>
            <span class="letter box">ค</span>
            <span class="letter box">รู่</span>
        </div>
    </div>
    <!-- END LOADER -->

    <header class="header header_style_01">
        <nav class="megamenu navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="Home-sell.php"><img src="images/logos/lanlogo.png" alt="image"
                            width="200" height="100"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right menu-top">
                        <li><a href="Home-sell.php">หน้าแรก</a></li>
                        <li><a href="rubber_price.php">ยื่นราคาประมูล </a></li>
                        <li><a href="cencel_price.php">ข้อมูลการยื่นราคา</a></li>
                        <li><a href="weight_detail.php">น้ำหนักยางรอบนี้</a></li>
                        <li><a class="active" href="price_detail.php">ข้อมูลราคายางย้อนหลัง</a></li>
                        <!--li><a href="case-study.html">Case Study</a></li>
                        <li><a href="pricing.html">Pricing</a></li-->
                        <li><a class="out" href="../rubber/login/logout.php">ออกจากระบบ</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="all-page-title" style="background-image:url(images/pattern-4.png);">
        <div class="container text-center">
            <h1 style="font-family: 'Sarabun', sans-serif; color:rgb(12, 12, 11)">ข้อมูลราคายางย้อนหลัง</h1>

        </div>
        <!--Page -->
        <div class="page-info">
            <div class="container">
                <div class="inner-container">
                    <ul class="bread-crumb">
                    </ul>
                </div>
            </div>
        </div>
        <!--End Page-->
    </div>
    <!-- end section -->

    <svg id="clouds" class="hidden-xs" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100"
        viewBox="0 0 85 100" preserveAspectRatio="none">
        <path d="M-5 100 Q 0 20 5 100 Z
            M0 100 Q 5 0 10 100
            M5 100 Q 10 30 15 100
            M10 100 Q 15 10 20 100
            M15 100 Q 20 30 25 100
            M20 100 Q 25 -10 30 100
            M25 100 Q 30 10 35 100
            M30 100 Q 35 30 40 100
            M35 100 Q 40 10 45 100
            M40 100 Q 45 50 50 100
            M45 100 Q 50 20 55 100
            M50 100 Q 55 40 60 100
            M55 100 Q 60 60 65 100
            M60 100 Q 65 50 70 100
            M65 100 Q 70 20 75 100
            M70 100 Q 75 45 80 100
            M75 100 Q 80 30 85 100
            M80 100 Q 85 20 90 100
            M85 100 Q 90 50 95 100
            M90 100 Q 95 25 100 100
            M95 100 Q 100 15 105 100 Z">
        </path>
    </svg>

    <div class="container">
        <table class="table">
            <thead class="thead-light">
                <tr style="text-align: center;">
                    <th>ลำดับ</th>
                    <th>ราคายางพารา</th>
                    <th>วันที่</th>
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
                    <td style="width: 100px;background-color: #FF756D;color: white;"><?php echo $index ?></td>
                    <td><?php echo $row['price'] ?></td>
                    <td><?php echo $date ?></td>
                </tr>
                <?php
                        $index++;
                    }
                }
                ?>
            </tbody>
        </table>

    </div>
    <!-- end title -->
    <br>

    </div>
    <!-- end container -->
    </div>
    <!-- end section -->

    <div id="support" class="section db">
        <div class="container">
            <div class="section-title text-center">
                <h1 style="font-family: 'Sarabun', sans-serif; color:rgb(255, 255, 0)">ร้านขายอุปกรณ์ยางพารา</h1>

            </div>
            <!-- end title -->

            <div class="row">
                <div id="logo-carousel" class="owl-carousel">
                    <div> <img src="images/img/รุ่งเรืองยางพารา สาขาเมืองเลย.jpg" alt=""> </div>
                    <div> <img src="images/img/ร้าน อ.ยางรุ่งเรือง.jpg" alt=""> </div>
                    <div> <img src="images/img/ร้านยางกันเองง.jpg" alt=""> </div>
                    <div> <img src="images/img/ร้านเปิ้ลการเกษตร.jpg" alt=""> </div>
                    <div> <img src="images/img/หจก ทำดี การเกษตร.jpg" alt=""> </div>
                    <div> <img src="images/img/รุ่งเรืองยางพารา สาขาเมืองเลย.jpg" alt=""> </div>
                    <div> <img src="images/img/ร้าน อ.ยางรุ่งเรือง.jpg" alt=""> </div>
                    <div> <img src="images/img/ร้านยางกันเองง.jpg" alt=""> </div>
                    <div> <img src="images/img/ร้านเปิ้ลการเกษตร.jpg" alt=""> </div>
                    <div> <img src="images/img/หจก ทำดี การเกษตร.jpg" alt=""> </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end section -->

    <svg id="clouds1" class="hidden-xs" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100"
        viewBox="0 0 85 100" preserveAspectRatio="none">
        <path d="M-5 100 Q 0 20 5 100 Z
            M0 100 Q 5 0 10 100
            M5 100 Q 10 30 15 100
            M10 100 Q 15 10 20 100
            M15 100 Q 20 30 25 100
            M20 100 Q 25 -10 30 100
            M25 100 Q 30 10 35 100
            M30 100 Q 35 30 40 100
            M35 100 Q 40 10 45 100
            M40 100 Q 45 50 50 100
            M45 100 Q 50 20 55 100
            M50 100 Q 55 40 60 100
            M55 100 Q 60 60 65 100
            M60 100 Q 65 50 70 100
            M65 100 Q 70 20 75 100
            M70 100 Q 75 45 80 100
            M75 100 Q 80 30 85 100
            M80 100 Q 85 20 90 100
            M85 100 Q 90 50 95 100
            M90 100 Q 95 25 100 100
            M95 100 Q 100 15 105 100 Z">
        </path>
    </svg>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <a class="navbar-brand" href="index.html"><img src="images/logos/lanlogo.png" alt="image"
                                    width="200" height="100"></a>
                        </div>
                        <br>
                        <br> <br> <br>

                    </div>
                    <!-- end clearfix -->
                </div>
                <!-- end col -->

                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>ข้อมูลการติดต่อลานประมูล</h3>
                        </div>

                        <ul class="footer-links">
                            <li><a href="mailto:#">ลานประมูลยางพารา</a></li>
                            <li><a href="#">www.lanpramoon.com</a></li>
                            <li>บ้านโนนดินแดง ตำบลทรัพย์ไพวัลย์ อำเภอเอราวัณ จังหวัดเลย</li>
                            <li>+61 3 8376 6284</li>
                        </ul>
                        <!-- end links -->
                    </div>
                    <!-- end clearfix -->
                </div>
                <!-- end col -->

                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>แผนที่</h3>
                            <br>

                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1791.1701904074307!2d101.9842116580041!3d17.239242997041874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTfCsDE0JzIxLjMiTiAxMDHCsDU5JzA3LjEiRQ!5e1!3m2!1sth!2sth!4v1605718068580!5m2!1sth!2sth"
                                width="400" height="400" frameborder="0" style="border:0;" allowfullscreen=""
                                aria-hidden="false" tabindex="0"></iframe>


                        </div>
                    </div>
                    <!-- end clearfix -->
                </div>
                <!-- end col -->
            </div>
            <!-- end clearfix -->
        </div>
        <!-- end col -->
        </div>
        <!-- end row -->
        </div>
        <!-- end container -->
    </footer>
    <!-- end footer -->

    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-left">

                </div>

                <div class="footer-right">
                </div>
            </div>
        </div>
        <!-- end container -->
    </div>
    <!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>

</body>

</html>