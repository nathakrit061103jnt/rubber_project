<?php
session_start();
include("connectdb.php");
$stmt = $conn->prepare("SELECT * FROM price_rubber ORDER BY date DESC");
$stmt->execute();
$result3 = $stmt->get_result();
$row3 = mysqli_fetch_assoc($result3);
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
                    <a class="navbar-brand" href="Home-sell.php"><img src="images/logos/lanlogo.png" alt="image"
                            width="200" height="100"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <!--ul class="nav navbar-nav navbar-right hidden-md hidden-sm hidden-xs">
                        <li><a class="btn-light btn-radius btn-brd top-btn" href="#"><i
                                    class="fa fa-angle-double-right"></i>สำหรับเจ้าหน้าที่</a></li>
                    </ul-->
                    <ul class="nav navbar-nav navbar-right menu-top">
                        <li><a class="active" href="Home-sell.php">หน้าแรก</a></li>
                        <li><a href="rubber_price.php">ยื่นราคาประมูล </a></li>
                        <li><a href="cencel_price.php">ข้อมูลการยื่นราคา</a></li>
                        <li><a href="weight_detail.php">น้ำหนักยางรอบนี้</a></li>
                        <li><a href="price_detail.php">ข้อมูลราคายางย้อนหลัง</a></li>
                        <!--li><a href="case-study.html">Case Study</a></li>
                        <li><a href="pricing.html">Pricing</a></li-->
                        <li><a class="out" href="../rubber/login/logout.php">ออกจากระบบ</a></li>
                    </ul>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div id="home" class="parallax first-section" data-stellar-background-ratio="0.4"
        style="background-image:url('uploads/bg-01.jpg');">
        <div class="container">
            <div class="row">
                <center>
                    <div class="big-tagline">
                        <h2 style="font-family: 'Sarabun', sans-serif; color:rgb(61, 61, 61)">ยินดีต้อนรับ
                            <?php echo $_SESSION['name'] ?></h2>
                    </div>
                </center>
            </div>
            <center>
                <div class="big-tagline">
                    <h2 style="font-family: 'Sarabun', sans-serif;">รอบประมูลวันที่</h2>
                    <h2 style="font-family: 'Sarabun', sans-serif; color:rgb(255, 255, 0)">
                        <?php echo DateThai($strDate) ?></h2>
                </div>
            </center>
            <center>
                <a href="rubber_price.php" class="btn btn-light btn-radius btn-brd ban-btn background-image"><img
                        src="images/icons/kisspng-online-auction-computer-icons-gavel-auto-auction-auction-5ac1d967158474.9165404415226535430882.png"
                        width="50" height="50">ยื่นราคาประมูล</a>
                <a href="cencel_price.php" class="btn btn-light btn-radius btn-brd ban-btn background-image"><img
                        src="images/icons/cancel.png" width="50" height="50">ยกเลิกการยื่นราคาประมูล</a>
                <a href="weight_detail.php" class="btn btn-light btn-radius btn-brd ban-btn background-image"><img
                        src="images/icons/Farmer-icon.png" width="50" height="50">น้ำหนักยางพารารวม</a>
                <a href="price_detail.php" class="btn btn-light btn-radius btn-brd ban-btn background-image"><img
                        src="images/icons/sale.png" width="50" height="50">ราคายางย้อนหลัง</a>
                <br>
                <br>
                <br>
            </center>
            <!-- end row -->
        </div>
        <!-- end container -->
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
    <div id="services" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3>ร้านค้า</h3>
                <!--<p class="lead">We offer unlimited solutions to all your business needs. in the installation package we prepare search engine optimization, social media support, we provide corporate identity and graphic design services.</p>-->
            </div>
            <!-- end title -->
            <div class="row text-center">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="service-widget">
                        <div class="post-media wow fadeIn">
                            <img src="images/img/รุ่งเรืองยางพารา สาขาเมืองเลย.jpg" alt=""
                                class="img-responsive img-rounded">
                        </div>
                        <h3>รุ่งเรืองยางพารา สาขาเมืองเลย</h3>
                        <p>เบอร์โทร 098-858-0098</p>
                    </div>
                    <!-- end service -->
                </div>
                <!-- end col -->

                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="service-widget">
                        <div class="post-media wow fadeIn">
                            <img src="images/img/ร้าน อ.ยางรุ่งเรือง.jpg" alt="" class="img-responsive img-rounded">
                        </div>
                        <h3>ร้าน อ.ยางรุ่งเรือง</h3>
                        <p>เบอร์โทร 094-514-1687 </p>
                    </div>
                    <!-- end service -->
                </div>
                <!-- end col -->

                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="service-widget">
                        <div class="post-media wow fadeIn">
                            <img src="images/img/ร้านยางกันเองง.jpg" alt="" class="img-responsive img-rounded">
                        </div>
                        <h3>ร้านยางกันเองง</h3>
                        <p>เบอร์โทร 081-374-9558</p>
                    </div>
                    <!-- end service -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            <hr class="invis">

            <div class="row text-center">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="service-widget">
                        <div class="post-media wow fadeIn">
                            <img src="images/img/ร้านเปิ้ลการเกษตร.jpg" alt="" class="img-responsive img-rounded">
                        </div>
                        <h3>ร้านเปิ้ลการเกษตร</h3>
                        <p>เบอร์โทร 084-849-8258</p>
                    </div>
                    <!-- end service -->
                </div>
                <!-- end col -->

                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="service-widget">
                        <div class="post-media wow fadeIn">
                            <img src="images/img/สุวรรณภัณฑ์ (เลย) 960-640.jpg" alt=""
                                class="img-responsive img-rounded">
                        </div>
                        <h3>สุวรรณภัณฑ์ (เลย)</h3>
                        <p>เบอร์โทร 089-449-4944 </p>
                    </div>
                    <!-- end service -->
                </div>
                <!-- end col -->

                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="service-widget">
                        <div class="post-media wow fadeIn">
                            <img src="images/img/หจก ทำดี การเกษตร.jpg" alt="" class="img-responsive img-rounded">
                        </div>
                        <h3>หจก ทำดี การเกษตร</h3>
                        <p>เบอร์โทร 082-677-6777</p>
                    </div>
                    <!-- end service -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end section -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>

</body>

</html>