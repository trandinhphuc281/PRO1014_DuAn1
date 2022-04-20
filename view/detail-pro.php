<?php
session_start();
include "./config.php";
?>
<?php
// chi tiết sản phẩm
$id = $_GET["id"];
$connection = new PDO("mysql:host=127.0.0.1;dbname=baileyshop;charset=utf8", "root", "");
$query = "SELECT * FROM products WHERE id=$id";
$stmt = $connection->prepare($query);
$stmt->execute();
$sanpham = $stmt->fetch();
// echo "<pre>";
// var_dump($sanpham);
// die;
?>
<?php
// sản phẩm khác
$connection = new PDO("mysql:host=127.0.0.1;dbname=baileyshop;charset=utf8", "root", "");
$queryOther = "SELECT * FROM products WHERE id_cate = $sanpham[8] ORDER BY RAND() LIMIT 4;";
$stmt = $connection->prepare($queryOther);
$stmt->execute();
$productOther = $stmt->fetchAll();
// var_dump($productOther);
// die;
?>
<?php
//Lượt xem 
$connection = new PDO("mysql:host=127.0.0.1;dbname=baileyshop;charset=utf8", "root", "");
$queryup = "UPDATE products SET view = view + 1 WHERE id = $id";
$stmt = $connection->prepare($queryup);
$stmt->execute();
?>
<?php
// Bình luận
if (isset($_POST['guibl'])) {
    $content = $_POST['content'];
    if (isset($_SESSION['khach_hang'])) {
        $id_pro = $_GET['id'];
        $id_user = mysqli_fetch_array($con->query("select * from users where email = '" . $_SESSION['khach_hang']['email'] . "'"));
        $id_user = $id_user['id'];
        if (strlen($content) > 400) {
            echo "<script>alert('Nội dung bình luận không quá 400 từ!')</script>";
        } else {
            $con->query("insert into comments(id_user,id_pro,created_at,content)values('$id_user','$id_pro',now(),'$content')");
        }
    } else if (isset($_SESSION['admin'])) {
        $id_pro = $_GET['id'];
        $id_user = mysqli_fetch_array($con->query("select * from users where email = '" . $_SESSION['admin']['email'] . "'"));
        $id_user = $id_user['id'];
        if (strlen($content) > 400) {
            echo "<script>alert('Nội dung bình luận không quá 400 từ!')</script>";
        } else {
            $con->query("insert into comments(id_user,id_pro,created_at,content)values('$id_user','$id_pro',now(),'$content')");
        }
    } else {
        echo "<script>alert('Vui lòng đăng nhập để bình luận')</script>";
    }
}

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
        <div class="detail-pro" style="height: 1400px;">
            <div class="detail-pro-row">
                <div class="detail-pro-row-col">
                    <img src="../admin/img/<?php echo $sanpham["image"] ?>" alt="">
                </div>
                <div class="detail-pro-row-col1">
                    <h3><?php echo $sanpham["name"] ?></h3>
                    <span>Giá: <?php echo $sanpham["price"] ?> đ</span>
                    <form action="gio_hang.php?action=add" method="POST">
                        <input type="hidden" name="id" id="" value="<?php echo $sanpham['id'] ?>">
                        <input type="hidden" name="image" id="" value="<?php echo $sanpham['image'] ?>">
                        <input type="hidden" name="name" id="" value="<?php echo $sanpham['name'] ?>">
                        <input type="hidden" name="price" id="" value="<?php echo $sanpham['price'] ?>">
                        <p class="quantity">Số lượng</p>
                        <input type="text" value="1" name="quantity[<?php echo $sanpham['id'] ?>]" id="quantity">
                        <div class="but">
                            <button type="submit" name="addProduct" id="them">Thêm vào giỏ hàng</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="detail-pro-row2">
                <h3>Mô tả sản phẩm</h3>
                <p><?php echo $sanpham["content"] ?></p>
            </div>
            <div class="detail-pro-row2">
                <h3>Bình luận</h3>
                <form method="POST" style="display: flex;">
                    <input type="text" name="content" id="" placeholder="" autocomplete="off" style="width:88%;margin-right:20px;">
                    <button type="submit" name="guibl" style="background: #0093AB;border: 1px solid #0093AB;width: 10%;border-radius: 10px">Gửi</button>
                </form>
                <?php
                $query = "SELECT products.name,users.name,comments.content,comments.created_at 
                FROM comments inner join users on comments.id_user= users.id inner join products on comments.id_pro = products.id WHERE products.id= '" . $_GET['id'] . "'";
                $stmt = $connection->prepare($query);
                $stmt->execute();
                $comments = $stmt->fetchAll();
                // var_dump($comments);
                // die;
                ?>
                <div class="table">
                    <?php foreach ($comments as $comment) : ?>
                        <span style="color: black;"><?php echo $comment['name'] ?>:</span>
                        <span style="color:black;font-size:10px;"><?php echo $comment['created_at'] ?></span>
                        <p><?php echo $comment['content'] ?></p>
                    <?php endforeach ?>
                </div>
            </div>
            <section id="section">
                <h3>Sản phẩm liên quan</h3>
                <div id="main_row">
                    <?php foreach ($productOther as $sanphamkhac) : ?>
                        <div class="main_row_col">
                            <a href="./detail-pro.php?id=<?php echo $sanphamkhac["id"] ?>">
                                <img src="../admin/img/<?php echo $sanphamkhac["image"] ?>" alt="">
                            </a>
                            <span>Giá: <?php echo $sanphamkhac["price"] ?> đ</span>
                            <h4><?php echo $sanphamkhac["name"] ?></h4>
                        </div>
                    <?php endforeach ?>
                </div>
            </section>
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