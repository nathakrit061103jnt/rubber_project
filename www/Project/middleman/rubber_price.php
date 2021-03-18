<?php
    session_start();
    ?>
<!-- include("connectdb.php");
    if(isset($_POST['add'])){

        // $TotalPrice = $_POST['weightItem'] * $_POST['price'];
        $stmt= $conn->prepare("insert into pricemiddleman (PRMD_name,Price,tel,MD_id) values (?,?,?,?)");
        $stmt->bind_param("ssss",$_POST['PRMD_name'],$_POST['Price'],$_POST['tel'],$_POST['MD_id']);
        $stmt->execute();


        
        // header("Location:form-validation.php");
    } -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ส่งราคาประมูล</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- การลิ้ง sweetalert2 เเบบ cdn  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins" style="background: rgb(186, 233, 222);">
        <br>
        <br>
        <center>
            <h1 style="font-family: 'Sarabun', sans-serif; color:rgb(12, 12, 11)">ระบบยื่นราคาประมูลยางพารา</h1>
        </center>
        <div class="registration-form">
            <form method="post" action="rubber_price.php">
                <div class="form-icon">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <center>
                    <H1>ยื่นราคา</H1>
                </center><br>
                <div class="form-group">ชื่อพ่อค้า
                    <input type="text" class="form-control item" name="PRMD_name"
                        value="<?php echo $_SESSION['name'] ?>" readonly>
                </div>
                <div class="form-group">ราคายาง(บาท)
                    <input type="text" class="form-control item" name="Price" placeholder="ราคายาง(บาท)">
                </div>
                <div class="form-group">เบอร์โทร
                    <input type="text" class="form-control item" name="tel" placeholder="เบอร์โทร">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control item" name="MD_id" value="<?php echo $_SESSION['id'] ?>">
                </div>
                <div class="form-group">รอบวันที่ประมูล
                    <input type="date" class="form-control item" name="date">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-block create-account" name="add" value="บันทึก">
                    <a href="rubber_price.php" type="button" class="btn btn-block create-account">ยกเลิก</a>
                    <a href="Home-sell.php" type="button" class="btn btn-block create-account">กลับสู่หน้าหลัก</a>
                </div>
            </form>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
        <script src="assets/js/script.js"></script>
</body>
<?php
    if (isset($_POST["add"])) {
            //นำเข้าไฟล์ การเชื่อมต่อฐานข้อมูล
            include_once("connectdb.php");
         $sql = "INSERT INTO `pricemiddleman` (`PRMD_id`, `PRMD_name`, `Price`, `tel`, `MD_id`, `date`) 
         VALUES (NULL,'{$_POST["PRMD_name"]}','{$_POST["Price"]}','{$_POST["tel"]}','{$_POST["MD_id"]}','{$_POST["date"]}');";             
         if (mysqli_query($conn, $sql)) {
                    echo
                        "<script> 
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'เพิ่มข้อมูลข้อมูลสำเร็จ',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(()=> location = 'Home-sell.php')
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