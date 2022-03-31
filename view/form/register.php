<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/form.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="header_row">
                <div class="logo">
                    <img src="../img/logo.png" alt="">
                </div>
                <div class="header_search">
                    <div class="header_search_col">
                        <img id="free" src="../img/viman.png">
                        <div class="header_search_col-text">
                            <h3>GIAO HÀNG MIỄN PHÍ</h3>
                            <p>FREESHIP MỌI ĐƠN HÀNG TỪ 80K, ÁP DỤNG CHO TẤT CẢ TỪ HÀ NỘI, HCM, VÀ CÁC TỈNH THÀNH.</p>
                        </div>
                    </div>
                    <div class="header_search_bot">
                        <form action="">
                            <input type="text" placeholder="  Tìm kiếm sản phẩm">
                            <button type="submit">Tìm kiếm</button>
                            <a href="../view/form/log_in.php">
                                <p id="login">Đăng nhập</p>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar">
            <ul class="main-menu">
                <li><a href="../index.php">DANH MỤC SẢN PHẨM</a></li>
                <li><a href="">SẢN PHẨM BÁN CHẠY</a></li>
                <li><a href="../introduce.php">GIỚI THIỆU</a></li>
                <li><a href="../news.php">TIN TỨC</a></li>
                <li><a href="../contact.php">LIÊN HỆ</a></li>
                <li><a href="">GIỎ HÀNG</a></li>
            </ul>
        </div>
        <div class="form_login">
            <div class="text_login">
                <h2>Đăng Kí Thành Viên</h2>
            </div>
            <form action="" method="">
                <div class="mb-3">
                    <p>Họ và tên:</p>
                    <input type="text" onblur="checkName()" id="username" name="" placeholder="  VD:Trần Văn A" autocomplete="off">
                    <span id="errorName"></span>
                    <p>Email:</p>
                    <input type="email" onblur="checkEmail()" id="email" name="" placeholder="  VD:abc@gmail.com" autocomplete="off">
                    <span id="errorEmail"></span>
                    <p>Số điện thoại:</p>
                    <input type="text" onblur="checkPhone()" id="phone" name="" placeholder=" VD:0123456789" autocomplete="off">
                    <span id="errorPhone"></span>
                    <p>Mật khẩu:</p>
                    <input type="password" onblur="checkPassword()" id="password" name="" placeholder="  VD:123456" autocomplete="off">
                    <span id="errorPassword"></span>
                    <p>Địa chỉ:</p>
                    <input type="text" onblur="chekAddress()" id="address" name="" placeholder=" VD:Nam Từ Liêm, Hà Nội" autocomplete="off">
                    <span id="errorAddress"></span>
                </div>
                <div class="submit_register">
                    <button type="submit" name="" id="submit">ĐĂNG KÍ</button>
                </div>
                <div class="text1">
                    <a href="../form/log_in.php" style="color: rgba(32, 172, 236, 0.8);">Bạn đã có tài khoản?</a>
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