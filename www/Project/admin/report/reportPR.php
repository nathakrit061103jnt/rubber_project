<?php
include("connectdb.php");
$date = $_GET['date'];
$stmt = $conn->prepare("select * from price_rubber where date = ? ");
$stmt->bind_param("s", $date);
$stmt->execute();
$result = $stmt->get_result();
$datespilt = explode("-", $date);
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
$datethai1 = $datespilt[2] . "  " . $datespilt[1] . "  " . $datespilt[0];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="print.css">
    <title>ใบยืนยันราคายางพารา</title>
</head>

<body onload="window.print()">


    <div class="container-fluid dashboard-content ">



        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <div class="page-breadcrumb">
                    </div>
                </div>
            </div>
        </div>



        <div class="row" id="container">
            <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header p-4">
                        <div class="float-right">
                            <h3 class="mb-0">ใบยืนยันราคายางพารา</h3>
                            วันที่ : <?php echo $datethai1 ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <div><img src="img/lanlogo.png" alt=""></div>
                                <div>บ้านโนนดินแดง ตำบลทรัพย์ไพวัลย์ อำเภอเอราวัณ จังหวัดเลย</div>
                                <div>Email: info@gerald.com.pl</div>
                                <div>เบอร์โทร : +61 3 8376 6284</div>
                            </div>
                        </div>
                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th>วันที่</th>
                                        <th>ชื่อพ่อค้า</th>
                                        <th class="right">ราคายางพารา</th>
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
                                        <td class="center"><?php echo $index ?></td>
                                        <td><?php echo $date ?></td>
                                        <td><?php echo $row['MD_name'] ?></td>
                                        <td class="right"><?php echo $row['price'] ?></td>
                                    </tr>
                                    <?php
                                            $index++;
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-5">
                            </div>
                            <div class="col-lg-4 col-sm-5 ml-auto">
                                <table class="table table-clear">
                                    <tbody>
                                        <tr>
                                            <td class="left">
                                                <strong class="text-dark">ลายเซ็น</strong>
                                            </td>
                                            <td class="right" </td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <strong class="text-dark">ลงชื่อ</strong>
                                            </td>
                                            <td class="right"></td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <strong class="text-dark">วันที่(ว/ด/ป)</strong>
                                            </td>
                                            <td class="right"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <p class="mb-0">ลานประมูลยางพารา บ้านโนนดินแดง ตำบลทรัพย์ไพวัลย์ อำเภอเอราวัณ จังหวัดเลย</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>