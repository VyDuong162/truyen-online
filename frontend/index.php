<?php
// hàm `session_id()` sẽ trả về giá trị SESSION_ID (tên file session do Web Server tự động tạo)
// - Nếu trả về Rỗng hoặc NULL => chưa có file Session tồn tại
if (session_id() === '') {
    // Yêu cầu Web Server tạo file Session để lưu trữ giá trị tương ứng với CLIENT (Web Browser đang gởi Request)
    session_start();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctruyen.vn</title>

    <!-- Nhúng file Quản lý các Liên kết CSS dùng chung cho toàn bộ trang web -->
    <?php include_once(__DIR__ . '/layouts/styles.php'); ?>
</head>
<body >
    <?php include_once(__DIR__ . '/../dbconnect.php');
        $sqlSelectTruyen = <<<EOT
        SELECT * FROM truyen
        WHERE truyen_loai=1;
EOT;
        $result = mysqli_query($conn, $sqlSelectTruyen);
        $dataDanhSachTruyenTranh = [];
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $dataDanhSachTruyenTranh[] = array(
                'truyen_id' => $row['truyen_id'],
                'truyen_ma' => $row['truyen_ma'],
                'truyen_ten' => $row['truyen_ten'],
                'truyen_hinhdaidien' => $row['truyen_hinhdaidien'],
                'truyen_loai' => $row['truyen_loai'],
                'truyen_theloai' => $row['truyen_theloai'],
                'truyen_tacgia' => $row['truyen_tacgia'],
                'truyen_mota_ngan' => $row['truyen_mota_ngan'],
                'truyen_ngaydang' => $row['truyen_ngaydang'],
            );
        } 
?>
<?php
        $sqlSelectTruyenTrinhTham = <<<EOT
        SELECT * FROM truyen
        WHERE truyen_loai=2;
EOT;
        $result = mysqli_query($conn, $sqlSelectTruyenTrinhTham);
        $dataDanhSachTruyenTrinhTham = [];
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $dataDanhSachTruyenTrinhTham[] = array(
                'truyen_id' => $row['truyen_id'],
                'truyen_ma' => $row['truyen_ma'],
                'truyen_ten' => $row['truyen_ten'],
                'truyen_hinhdaidien' => $row['truyen_hinhdaidien'],
                'truyen_loai' => $row['truyen_loai'],
                'truyen_theloai' => $row['truyen_theloai'],
                'truyen_tacgia' => $row['truyen_tacgia'],
                'truyen_mota_ngan' => $row['truyen_mota_ngan'],
                'truyen_ngaydang' => $row['truyen_ngaydang'],
            );
        } 
?>
   <div class="container">
       
    </div>
    <div class="alert alert-primary" role="alert">
           <h1 class="text-md-center">Web Tổng hợp Truyện tranh và Tiểu Thuyết Online 24/7</h1>
       </div>
    <div class="container">
        <h3>Danh sách truyện tranh</h3>
    </div> <br>
    <div class="container">
            <div class="row  row-cols-md-3 ">
                    <?php foreach($dataDanhSachTruyenTranh as $truyentranh) :?>
                    <div class="col md-2">
                        <div class="card" style="width: 18rem;">
                            <img src="\truyen-online\assets\shared\img/default-image_600.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h2 class="card-title"><?= $truyentranh['truyen_ten']; ?></h2>
                                <p class="card-text"><?= $truyentranh['truyen_mota_ngan']; ?></p>
                            </div>
                            <div class="card-body">
                                <button class="btn btn-primary" type="submit">Button</button>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
            </div>
    </div><br>
    <div class="container">
        <h3>Danh sách truyện trinh thám</h3>
    </div> <br>
    <div class="container">
            <div class="row row-cols-md-3">
                <?php foreach($dataDanhSachTruyenTrinhTham as $ttt) :?>
                    <div class="col md-2">
                        <div class="card " style="width: 18rem;">
                            <img src="\truyen-online\assets\shared\img/default-image_600.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h2 class="card-title"><?= $ttt['truyen_ten']; ?></h2>
                                <p class="card-text"><?= $ttt['truyen_mota_ngan']; ?></p>
                            </div>
                            <div class="card-body">
                                <button class="btn btn-primary" type="submit">Button</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
    </div>
    <!-- Nhúng file quản lý phần SCRIPT JAVASCRIPT -->
    <?php include_once(__DIR__ . '/layouts/scripts.php'); ?>
   
    <!-- Các file Javascript sử dụng riêng cho trang này, liên kết tại đây -->
</body>

</html>