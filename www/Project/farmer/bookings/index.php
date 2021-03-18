<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>บันทึกข้อมูลการจองคิวลานประมูลยางพารา</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/yourcode.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- การลิ้ง sweetalert2 เเบบ cdn  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>

    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins" style="background: rgb(186, 233, 222);">
        <br>
        <center>
            <h1 style="font-family: 'Sarabun', sans-serif; color:rgb(12, 12, 11)">ระบบแจ้งน้ำหนักยางพารา</h1>
        </center>
        <div class="registration-form">
            <form action="index.php" method="post">
                <div class="form-icon">
                    <i class="fas fa-weight"></i>
                </div>
                <center>
                    <h2 style="font-family: 'Sarabun', sans-serif; color:rgb(12, 12, 11)">แจ้งน้ำหนักยางพารา</h2>
                </center><br>
                <div class="form-group">
                    <h5>น้ำหนักยางพารา</h5>
                    <input type="text" class="form-control item" name="weightItem" id="weightItem">
                </div>
                <div class="form-group">
                    <h5>จำนวนกระสอบ</h5>
                    <input type="text" class="form-control item" name="Num_item" id="Num_item">
                </div>
                <div class="form-group">
                    <h5>วันที่</h5>
                    <input type="date" class="form-control item" name="date">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control item" name="FM_id" id="FM_id"
                        value="<?php echo $_SESSION["id"] ?>" </div>
                    <div class="form-group">
                        <h5>ชื่อผู้แจ้งน้ำหนัก</h5>
                        <input type="text" class="form-control item" value="<?php echo $_SESSION["name"] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <h5>รหัสการแจ้ง</h5>
                        <input type="text" class="form-control item" name="weightnum">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-block create-account" name="add" id="add"
                            value="บันทึกข้อมูล" onclick="return confirm('ยืนยันการแจ้งน้ำหนัก')">
                        <a href="../bookings/index.html" type="button" class="btn btn-block create-account">ยกเลิก</a>
                        <a href="../Home-user.php" type="button"
                            class="btn btn-block create-account">กลับสู่หน้าหลัก</a>
                    </div>
                </div>
            </form>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js">
        </script>
        <script src="assets/js/script.js"></script>
</body>
<?php
    if (isset($_POST["add"])) {
            //นำเข้าไฟล์ การเชื่อมต่อฐานข้อมูล
            include_once("connectdb.php");
         $sql = "INSERT INTO `inform` (`InformID`, `weightItem`, `Num_item`, `date`, `FM_id`, `weightnum`) 
         VALUES (NULL, '{$_POST["weightItem"]}','{$_POST["Num_item"]}','{$_POST["date"]}','{$_POST["FM_id"]}','{$_POST["weightnum"]}');";             
         if (mysqli_query($conn, $sql)) {
                    echo
                        "<script> 
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'เพิ่มข้อมูลข้อมูลสำเร็จ',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(()=> location = '../Home-user.php')
                </script>";
                } else {
                    echo
                        "<script> 
                    Swal.fire({
                        icon: 'error',
                        title: 'บันทึกข้อมูลไม่สำเร็จ', 
                        text: 'โปรดตรวจสอบความถูกต้องของข้อมูล!',
                    }) 
                </script>";
                }
                // mysqli_close($conn);
    }
?>


</html>