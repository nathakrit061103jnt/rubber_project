<?php
include("connectdb.php");
if (isset($_POST['add'])) {

    $password = md5($_POST['password']);

    if ($_POST['FM_name'] != '' && $_POST['ID_code'] != '') {
        $stmt = $conn->prepare("insert into farmer (FM_name,ID_code,address,tel,email,Total_rubber,username,password) values (?,?,?,?,?,?,?,?)");
        $stmt->bind_param(
            "sssssdss",
            $_POST['FM_name'],
            $_POST['ID_code'],
            $_POST['address'],
            $_POST['tel'],
            $_POST['email'],
            $_POST['Total_rubber'],
            $_POST['username'],
            $password
        );
        $stmt->execute();
        $message = "บันทึกข้อมูลสำเร็จ";
        echo "<script type='text/javascript'>alert('$message');</script>";
    } else {
        $message = "บันทึกไม่สำเร็จ";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Register</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins" style="background: rgb(186, 233, 222);">
        <center>
            <h1 style="font-family: 'Sarabun', sans-serif; color:rgb(12, 12, 11)">การสมัครสมาชิกลานประมูลยางพารา</h1>
        </center>
        <br>
        <br>
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h4 style="font-family: 'Sarabun', sans-serif; color:rgb(255, 255, 0)">สมัครสมาชิกลานประมูลยางพารา
                    </h4><br>
                    <form method="POST">
                        <div class="input-group">
                            <input class="input--style-3" id="FM_name" type="text" placeholder="ชื่อ - นามสกุล"
                                name="FM_name">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" id="ID_code" type="text" placeholder="รหัสประจำตัวประชาชน"
                                name="ID_code">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="ที่อยู่" id="address" name="address">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="เบอร์โทร" id="tel" name="tel">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="email" placeholder="อีเมลล์" id="email" name="email">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="จำนวนสวนยางพารา" id="Total_rubber"
                                name="Total_rubber">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Username" id="username"
                                name="username">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Password" id="password"
                                name="password">
                        </div>
                        <center>
                            <div class="p-t-10">
                                <button class="btn btn--pill btn--green"
                                    onclick="return confirm('ยืนยันการสมัครสมาชิก')" name="add"
                                    type="submit">สมัครสมาชิก</button>
                            </div>
                            <div class="p-t-10">
                                <a class="btn btn--pill btn--green" href="Regis.php">ยกเลิก</a>
                            </div>
                            <div class="p-t-10">
                                <a class="btn btn--pill btn--green" href="../rubber/index.php">กลับสู่หน้าหลัก</a>
                            </div>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->