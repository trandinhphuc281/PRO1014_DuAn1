<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../view/css/style.css">
    <link rel="stylesheet" href="../view/css/form.css">
    <link rel="stylesheet" href="../view/css/sub-menu.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="header_row">
                <div class="logo">
                    <img src="../view/img/logo.png" alt="">
                </div>
                <div class="header_search">
                    <div class="header_search_col">
                        <img id="free" src="../view/img/viman.png">
                        <div class="header_search_col-text">
                            <h3>GIAO HÀNG MIỄN PHÍ</h3>
                            <p>FREESHIP MỌI ĐƠN HÀNG TỪ 80K, ÁP DỤNG CHO TẤT CẢ TỪ HÀ NỘI, HCM, VÀ CÁC TỈNH THÀNH.</p>
                        </div>
                    </div>
                    <?php
                    if (isset($_POST["search"])) {
                        $tukhoa = $_POST["searchpro"];
                        if ($tukhoa != "") {
                            $connection = new PDO("mysql:host=127.0.0.1;dbname=baileyshop;charset=utf8", "root", "");
                            $query = "SELECT * FROM products WHERE name LIKE '%$tukhoa%'";
                            $stmt = $connection->prepare($query);
                            $stmt->execute();
                            $products = $stmt->fetchAll();
                            // var_dump($products);
                            // die;
                        } else {
                            echo '<script>alert("Vui lòng nhập vào thanh tìm kiếm")</script>';
                        }
                    }
                    ?>
                    <?php include("./header_search.php"); ?>
                </div>
            </div>
        </div>
        <div class="navbar">
            <ul class="main-menu">
                <li><a href="index.php">DANH MỤC SẢN PHẨM</a></li>
                <li><a href="">SẢN PHẨM BÁN CHẠY</a></li>
                <li><a href="introduce.php">GIỚI THIỆU</a></li>
                <li><a href="news.php">TIN TỨC</a></li>
                <li><a href="contact.php">LIÊN HỆ</a></li>
                <li><a href="">GIỎ HÀNG</a></li>
            </ul>
            <script>

            </script>
        </div>
        <div class="main">
            <div class="main_text">
                <h3>Kết quả tìm kiếm "<?php echo $tukhoa ?>"</h3>
            </div>
            <div id="main_row">
                <?php foreach ($products as $product) : ?>
                    <div class="main_row_col">
                        <a href="./detail-pro.php?id=<?php echo $product["id"] ?>">
                            <img src="../admin/img/<?php echo $product["image"] ?>" alt="">
                        </a>
                        <span><?php echo $product["price"] ?>đ</span>
                        <h4><?php echo $product["name"] ?></h4>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="footer">
            <div class="footer_row">
                <div class="footer_row_col">
                    <h5>VỀ CHÚNG TÔI</h5>
                    <p>Câu chuyện thương hiệu</p>
                    <p>Quy định & hình thức thanh toán</p>
                    <p>Chính sách bảo mật thông tin</p>

                </div>
                <div class="footer_row_col">
                    <h5>HỖ TRỢ</h5>
                    <p>Chính sách tích lũy điểm</p>
                    <p>Hướng dẫn mua hàng và hướng dẫn giao hàng</p>
                    <p>Chính sách đổi trả</p>
                </div>
                <div class="footer_row_col">
                    <h5>HỢP TÁC KINH DOANH</h5>
                    <p>Chính sách bán sỉ</p>
                    <p>HOTLINE</p>
                    <p>0976890027</p>
                </div>
            </div>
            <div class="footer_roW">
                <div class="footer_row_colum">
                    <h3>Công ty TNHH Bán lẻ Bailey</h3>
                    <p>Tòa nhà FPT Polytechnic, P. Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội</p>
                </div>
            </div>
        </div>
    </div>
    <script src="../view/js/validate-form.js"></script>
</body>

</html>