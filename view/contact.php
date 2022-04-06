<?php session_start();
include './config.php' ?>
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
                <li><a href="index.php">DANH MỤC SẢN PHẨM</a></li>
                <li><a href="">SẢN PHẨM BÁN CHẠY</a></li>
                <li><a href="introduce.php">GIỚI THIỆU</a></li>
                <li><a href="news.php">TIN TỨC</a></li>
                <li><a href="contact.php">LIÊN HỆ</a></li>
                <li><a href="">GIỎ HÀNG</a></li>
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
        <div class="content">
            <div class="content_text">
                <h3>Liên hệ</h3>
            </div>
            <div id="google_map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.863981044336!2d105.7445984148835!3d21.038127785993215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b991d80fd5%3A0x53cefc99d6b0bf6f!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1647703975342!5m2!1svi!2s" width="1200" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="contacts">
                <div class="contacts_row">
                    <div class="contacts_row_col">
                        <h4>Chúng tôi trân trọng ý kiến của quý khách</h4>
                        <p>Nếu bạn có gì thắc mắc hãy liên hệ với chúng tôi qua địa chỉ</p>
                        <div class="phone">
                            <p>Điện thoại</p>
                            <span id="contacts">0976890027</span>
                        </div>
                        <div class="address">
                            <p>Địa chỉ</p>
                            <span id="contacts">Tòa nhà FPT Polytechnic, P. Trịnh Văn Bô, Xuân Phương, Nam Từ
                                Liêm, Hà Nội</span>
                        </div>
                        <div class="email">
                            <p>Email</p>
                            <span id="contacts">baileyshop@gmail.com</span>
                        </div>
                        <div class="time">
                            <p>Thời gian</p>
                            <span id="contacts">Tất cả các ngày trong tuần</span>
                        </div>
                        <div class="internet">
                            <p>Mạng xã hội</p>
                            <div class="internet_icon">
                                <a href="#">
                                    <img src="../view/img/fb-icon.png" alt="">
                                </a>
                                <a href="#">
                                    <img src="../view/img/yt-icon.png" alt="">
                                </a>
                                <a href="#">
                                    <img src="../view/img/ig-icon.png" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="contacts_row_col">
                        <h4>Gửi thắc mắc cho chúng tôi</h4>
                        <p>Nếu bạn có thắc mắc gì, có thể gửi yêu cầu cho chúng tôi, và chúng
                            tôi sẽ liên lạc lại với bạn sớm nhất có thể</p>
                        <?php
                        if (isset($_POST['submit'])) {
                            $name = $_POST['name'];
                            $phone = $_POST['phone'];
                            $email = $_POST['email'];
                            $content = $_POST['content'];
                            if (isset($_SESSION['khach_hang'])) {
                                $id_pro = $_GET['id'];
                                $id_user = mysqli_fetch_array($con->query("select * from users where email = '" . $_SESSION['khach_hang']['email'] . "'"));
                                $id_user = $id_user['id'];
                                if (strlen($content) > 400) {
                                    echo "<script>alert('Nội dung bình luận không quá 400 từ!')</script>";
                                } else {
                                    $con->query("insert into contacts(name,email,phone,content)values('$name','$phone','$email','$content')");
                                }
                            } else if (isset($_SESSION['admin'])) {
                                $id_pro = $_GET['id'];
                                $id_user = mysqli_fetch_array($con->query("select * from users where email = '" . $_SESSION['admin']['email'] . "'"));
                                $id_user = $id_user['id'];
                                if (strlen($content) > 400) {
                                    echo "<script>alert('Nội dung bình luận không quá 400 từ!')</script>";
                                } else {
                                    $con->query("insert into contacts(name,email,phone,content)values('$name','$phone','$email','$content')");
                                }
                            } else {
                                echo "<script>alert('Vui lòng đăng nhập để bình luận')</script>";
                            }
                        }
                        ?>
                        <form action="" method="POST">
                            <div class="name">
                                <p>Họ và tên</p>
                                <input type="text" onblur="checkName()" id="username" name="name" placeholder="  Họ và tên của bạn" autocomplete="off">
                                <span id="errorName"></span>
                            </div>
                            <div class="phone_email">
                                <div class="phone">
                                    <p>Số điện thoại</p>
                                    <input type="text" onblur="checkPhone()" id="phone" name="phone" placeholder="  Số điện thoại của bạn" autocomplete="off">
                                    <span id="errorPhone"></span>
                                </div>
                                <div class="email">
                                    <p>Email</p>
                                    <input type="email" onblur="checkEmail()" id="email" name="email" placeholder="  Email của bạn" autocomplete="off">
                                    <span id="errorEmail"></span>
                                </div>
                            </div>
                            <div class="form_content">
                                <p>Nội dung</p>
                                <input type="text" onblur="checkContent()" id="contents" name="content" placeholder="  Nội dung" autocomplete="off">
                                <span id="errorContents"></span>
                            </div>
                            <div class="button">
                                <button type="submit" id="submit" name="submit">GỬI THÔNG TIN</button>
                            </div>
                        </form>
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
    <script src="../view/js/validate-form.js"></script>
</body>

</html>