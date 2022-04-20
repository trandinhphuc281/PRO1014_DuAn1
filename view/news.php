<?php session_start(); ?>
<?php
$connection = new PDO("mysql:host=127.0.0.1;dbname=baileyshop;charset=utf8", "root", "");
$query = "SELECT * FROM news WHERE discription != ''";
$stmt = $connection->prepare($query);
$stmt->execute();
$news = $stmt->fetchAll();
// var_dump($news);
// die;
$query = "SELECT * FROM news WHERE 1 ORDER BY created_at DESC LIMIT 0,5";
$stmt = $connection->prepare($query);
$stmt->execute();
$newesc = $stmt->fetchAll();
// var_dump($newesc);
// die;
?>
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
                    <?php include("./header_search.php"); ?>
                </div>
            </div>
        </div>
        <div class="navbar">
            <ul class="main-menu">
                <li><a href="../index.php">DANH MỤC SẢN PHẨM</a></li>
                <li><a href="./likepro.php">SẢN PHẨM BÁN CHẠY</a></li>
                <li><a href="introduce.php">GIỚI THIỆU</a></li>
                <li><a href="news.php">TIN TỨC</a></li>
                <li><a href="contact.php">LIÊN HỆ</a></li>
                <li><a href="gio_hang.php">GIỎ HÀNG</a></li>
            </ul>
        </div>
        <div class="banner">
            <div class="banner_row">
                <div class="banner_row_col">
                    <img src="../assets/img/0.png" id="image" alt="">
                </div>
                <div class="banner_row_col">
                    <div class="banner_row_col1_row">
                        <a href="">
                            <img src="../view/img/banner-right-1.png" alt="">
                        </a>
                    </div>
                    <div class="banner_row_col1_row">
                        <a href="">
                            <img src="../view/img/banner-right-2.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <script src="../assets/js/slideshows.js"></script>
        <div class="news">
            <div class="new_text">
                <h3>TIN TỨC</h3>
            </div>
            <div class="new_content">
                <div class="new_content-col1">
                    <?php foreach ($news as $new) : ?>
                        <div class="new_content-col1-row">
                            <div class="new_content-col1-row-col">
                                <a href="./new-detail.php?id=<?php echo $new["id"] ?>">
                                    <img src="../admin/img/<?php echo $new["image"] ?>" alt="">
                                </a>
                            </div>
                            <div class="new_content-col1-row-col" id="text">
                                <h4><?php echo $new["title"] ?></h4>
                                <span><i><?php echo $new["created_at"] ?></i></span>
                                <p><?php echo $new["discription"] ?>...</p>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="new_content-col2">
                    <?php foreach ($newesc as $NEW) : ?>
                        <div class="new_content-col2-row1">
                            <div class="new_content-col1-row1-col">
                                <a href="./new-detail.php?id=<?php echo $NEW["id"] ?>">
                                    <img src="../admin/img/<?php echo $NEW["image"] ?>" alt="">
                                </a>

                            </div>
                            <div class="new_content-col2-row1-col" id="text2">
                                <h4><?php echo $NEW["title"] ?></h4>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
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
</body>

</html>