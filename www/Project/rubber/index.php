<?php
session_start();
include("connectdb.php");
$stmt = $conn->prepare("SELECT * FROM price_rubber ORDER BY date DESC");
$stmt->execute();
$result3 = $stmt->get_result();
$row3 = mysqli_fetch_assoc($result3);
$price = $row3["price"];
$date = $row3["date"];
function DateThai($strDate)
{
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
}

$strDate = "$date";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Site Metas -->
    <title>ระบบประมูลยางพารา</title>
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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,200;1,300&display=swap" rel="stylesheet">
    <!--===============================================================================================-->

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
                    <a class="navbar-brand" href="index.php"><img src="images/logos/lanlogo.png" alt="image" width="200"
                            height="100"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right hidden-md hidden-sm hidden-xs">
                        <li><a class="btn-light btn-radius btn-brd top-btn" href="login/stafflogin.php"><i
                                    class="fa fa-angle-double-right"></i>สำหรับเจ้าหน้าที่</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right menu-top">
                        <li><a class="active" href="index.php">หน้าแรก</a></li>
                        <li><a href="about.html">ข้อมูลลานประมูล </a></li>
                        <li><a href="services.html">ร้านขายอุปกรณ์ยางพารา</a></li>
                        <li><a href="Regis.php">สมัครสมาชิก</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div id="home" class="parallax first-section" data-stellar-background-ratio="0.4"
        style="background-image:url('uploads/bg-01.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="big-tagline">
                        <h2 style="font-family: 'Sarabun', sans-serif;">ราคายาง</h2>
                        <h2 style="font-family: 'Sarabun', sans-serif; color:rgb(255, 255, 0)">
                            <?php echo $price - 0.5 ?> บาท</h2>
                        <h2 style="font-family: 'Sarabun', sans-serif;">วันที่ประมูล</h2>
                        <h2 style="font-family: 'Sarabun', sans-serif; color:rgb(255, 255, 0)">
                            <?php echo DateThai($strDate) ?></h2>
                        <a style="font-family: 'Sarabun', sans-serif;" href="login/login_FM.php"
                            class="btn btn-light btn-radius btn-brd ban-btn background-image"><img
                                src="images/icons/icon เกษตรกร.png" width="50" height="50">สำหรับเกษตรกร</a>
                        <a href="login/login_MD.php" class="btn btn-light btn-radius btn-brd ban-btn background-image"
                            style="font-family: 'Sarabun', sans-serif;"><img src="images/icons/icon พ่อค้า.png"
                                width="50" height="50">สำหรับพ่อค้าลานประมูล</a>
                    </div>
                </div>

                <div class="app_iphone_02 wow slideInUp hidden-xs hidden-sm" data-wow-duration="1s"
                    data-wow-delay="0.5s">
                    <img src="uploads/loy.png" alt="" class="img-responsive">
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

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
    <div id="services" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3>ร้านค้า</h3>
                <!--<p class="lead">We offer unlimited solutions to all your business needs. in the installation package we prepare search engine optimization, social media support, we provide corporate identity and graphic design services.</p>-->
            </div><!-- end title -->
            <div class="row text-center">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="service-widget">
                        <div class="post-media wow fadeIn">
                            <img src="images/img/รุ่งเรืองยางพารา สาขาเมืองเลย.jpg" alt=""
                                class="img-responsive img-rounded">
                        </div>
                        <h3>รุ่งเรืองยางพารา สาขาเมืองเลย</h3>
                        <p>เบอร์โทร 098-858-0098</p>
                    </div><!-- end service -->
                </div><!-- end col -->

                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="service-widget">
                        <div class="post-media wow fadeIn">
                            <img src="images/img/ร้าน อ.ยางรุ่งเรือง.jpg" alt="" class="img-responsive img-rounded">
                        </div>
                        <h3>ร้าน อ.ยางรุ่งเรือง</h3>
                        <p>เบอร์โทร 094-514-1687 </p>
                    </div><!-- end service -->
                </div><!-- end col -->

                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="service-widget">
                        <div class="post-media wow fadeIn">
                            <img src="images/img/ร้านยางกันเองง.jpg" alt="" class="img-responsive img-rounded">
                        </div>
                        <h3>ร้านยางกันเองง</h3>
                        <p>เบอร์โทร 081-374-9558</p>
                    </div><!-- end service -->
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="invis">

            <div class="row text-center">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="service-widget">
                        <div class="post-media wow fadeIn">
                            <img src="images/img/ร้านเปิ้ลการเกษตร.jpg" alt="" class="img-responsive img-rounded">
                        </div>
                        <h3>ร้านเปิ้ลการเกษตร</h3>
                        <p>เบอร์โทร 084-849-8258</p>
                    </div><!-- end service -->
                </div><!-- end col -->

                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="service-widget">
                        <div class="post-media wow fadeIn">
                            <img src="images/img/สุวรรณภัณฑ์ (เลย) 960-640.jpg" alt=""
                                class="img-responsive img-rounded">
                        </div>
                        <h3>สุวรรณภัณฑ์ (เลย)</h3>
                        <p>เบอร์โทร 089-449-4944 </p>
                    </div><!-- end service -->
                </div><!-- end col -->

                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="service-widget">
                        <div class="post-media wow fadeIn">
                            <img src="images/img/หจก ทำดี การเกษตร.jpg" alt="" class="img-responsive img-rounded">
                        </div>
                        <h3>หจก ทำดี การเกษตร</h3>
                        <p>เบอร์โทร 082-677-6777</p>
                    </div><!-- end service -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    <br>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="testi-carousel owl-carousel owl-theme">
                <div class="testimonial clearfix">
                    <div class="desc">
                        <h3><i class="fa fa-quote-left"></i>เจ้าหน้าที่ลานประมูลยางพารา</h3>
                        <p class="lead">ลานประมูลยางพารา บ้านโนนดินแดง ตำบลทรัพย์ไพวัลย์ อำเภอเอราวัณ จังหวัดเลย</p>
                    </div>
                    <div class="testi-meta">
                        <img src="images/icons/icon เกษตรกร.png" alt="" class="img-responsive alignleft">
                        <h4>นายแสง จ่าบาล<small>ประธานเจ้าหน้าที่</small></h4>
                    </div>
                    <!-- end testi-meta -->
                </div>
                <!-- end testimonial -->

                <div class="testimonial clearfix">
                    <div class="desc">
                        <h3><i class="fa fa-quote-left"></i>เจ้าหน้าที่ลานประมูลยางพารา</h3>
                        <p class="lead">ลานประมูลยางพารา บ้านโนนดินแดง ตำบลทรัพย์ไพวัลย์ อำเภอเอราวัณ จังหวัดเลย</p>
                    </div>
                    <div class="testi-meta">
                        <img src="images/icons/Farmer-icon.png" alt="" class="img-responsive alignleft">
                        <h4>นายสุบิน เทศตะวงศ์ <small>รองประธานเจ้าหน้าที่</small></h4>
                    </div>
                    <!-- end testi-meta -->
                </div>
                <!-- end testimonial -->

                <div class="testimonial clearfix">
                    <div class="desc">
                        <h3><i class="fa fa-quote-left"></i>เจ้าหน้าที่ลานประมูลยางพารา</h3>
                        <p class="lead">ลานประมูลยางพารา บ้านโนนดินแดง ตำบลทรัพย์ไพวัลย์ อำเภอเอราวัณ จังหวัดเลย</p>
                    </div>
                    <div class="testi-meta">
                        <img src="images/icons/icon เกษตรกร.png" alt="" class="img-responsive alignleft">
                        <h4>นางมะณี กิ่งเพชร<small>เจ้าหน้าที่ฝ่ายบัญชี</small></h4>
                    </div>
                    <!-- end testi-meta -->
                </div>
                <!-- end testimonial -->
                <div class="testimonial clearfix">
                    <div class="desc">
                        <h3><i class="fa fa-quote-left"></i>เจ้าหน้าที่ลานประมูลยางพารา</h3>
                        <p class="lead">ลานประมูลยางพารา บ้านโนนดินแดง ตำบลทรัพย์ไพวัลย์ อำเภอเอราวัณ จังหวัดเลย</p>
                    </div>
                    <div class="testi-meta">
                        <img src="images/icons/Farmer-icon.png" alt="" class="img-responsive alignleft">
                        <h4>นายสมโภชน์ มาราช<small>เจ้าหน้าที่ชั่งน้ำหนัก</small></h4>
                    </div>
                    <!-- end testi-meta -->
                </div>
                <!-- end testimonial -->

                <div class="testimonial clearfix">
                    <div class="desc">
                        <h3><i class="fa fa-quote-left"></i>เจ้าหน้าที่ลานประมูลยางพารา</h3>
                        <p class="lead">ลานประมูลยางพารา บ้านโนนดินแดง ตำบลทรัพย์ไพวัลย์ อำเภอเอราวัณ จังหวัดเลย</p>
                    </div>
                    <div class="testi-meta">
                        <img src="images/icons/icon เกษตรกร.png" alt="" class="img-responsive alignleft">
                        <h4>นายชัยยา ทองอ่อน<small>เจ้าหน้าที่ลานประมูลยางพารา</small></h4>
                    </div>
                    <!-- end testi-meta -->
                </div>
                <!-- end testimonial -->

                <div class="testimonial clearfix">
                    <div class="desc">
                        <h3><i class="fa fa-quote-left"></i>เจ้าหน้าที่ลานประมูลยางพารา</h3>
                        <p class="lead">ลานประมูลยางพารา บ้านโนนดินแดง ตำบลทรัพย์ไพวัลย์ อำเภอเอราวัณ จังหวัดเลย</p>
                    </div>
                    <div class="testi-meta">
                        <img src="images/icons/Farmer-icon.png" alt="" class="img-responsive alignleft">
                        <h4>นายสมพงษ์ นามวิเศษ<small>เจ้าหน้าที่ลานประมูลยางพารา</small></h4>
                    </div>
                    <!-- end testi-meta -->
                </div>
                <!-- end testimonial -->
            </div>
            <!-- end carousel -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
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