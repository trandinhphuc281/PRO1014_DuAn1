<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/form.css">
    <link rel="stylesheet" href="../view/css/sub-menu.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="header_row">
                <div class="logo">
                    <img src="./img/logo.png" alt="">
                </div>
                <div class="header_search">
                    <div class="header_search_col">
                        <img id="free" src="./img/viman.png">
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
                <li><a href="./index.php">DANH MỤC SẢN PHẨM</a></li>
                <li><a href="">SẢN PHẨM BÁN CHẠY</a></li>
                <li><a href="./introduce.php">GIỚI THIỆU</a></li>
                <li><a href="./news.php">TIN TỨC</a></li>
                <li><a href="./contact.php">LIÊN HỆ</a></li>
                <li><a href="">GIỎ HÀNG</a></li>
            </ul>
        </div>
        <div class="form_login">
            <div class="text_login">
                <h2>Đăng Nhập</h2>
            </div>
            <?php
            // session_start();
            if (isset($_POST['login'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $connection = new PDO("mysql:host=127.0.0.1;dbname=baileyshop;charset=utf8", "root", "");
                $sql = "SELECT * FROM users WHERE email = '$email' AND password='$password' ";
                $stmt = $connection->prepare($sql);
                $stmt->execute();
                $add = $stmt->fetch();
                if (!empty($add)) {
                    if ($add['role'] != 0) {
                        $_SESSION['khach_hang'] = $add;
                        header("location:./index.php");
                    } else {
                        $_SESSION['admin'] = $add;
                        header("location:../admin/index.php");
                    }
                } else {
                    echo "Email hoặc mật khẩu chưa đúng, vui lòng nhập lại!";
                }
            }
            ?>
            <form action="" method="POST">
                <div class="mb-3">
                    <p>Email</p>
                    <input type="email" onblur="checkEmail()" id="email" name="email" placeholder="  VD:abc@gmail.com" autocomplete="off">
                    <span id="errorEmail"></span>
                    <p>Password</p>
                    <input type="password" onblur="checkPassword()" id="password" name="password" autocomplete="off">
                    <span id="errorPassword"></span>
                </div>
                <div class="forget_pass">
                    <a href="./form/forget_password.php" style="color: rgba(11, 165, 236, 0.8);">
                        Quên mật khẩu?
                    </a>
                </div>
                <div class="submit">
                    <button type="submit" name="login" id="submit">ĐĂNG NHẬP</button>
                </div>
                <div class="text1">
                    <p>Bạn chưa có tài khoản? Đăng kí <a href="./form/register.php" style="color: rgba(32, 172, 236, 0.8);">Tại đây</a></p>
                </div>
            </form>
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
    <script src="../js/validate-form.js"></script>
</body>

</html>