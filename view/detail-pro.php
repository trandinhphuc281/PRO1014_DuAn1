<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../view/css/style.css">
    <link rel="stylesheet" href="../view/css/form.css">
    <style>
        .detail-pro {
            margin-bottom: 30px;
            width: 1200px;
            margin: 0 auto;
            height: 100%;
        }

        .detail-pro-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 8%;
            margin: 1% 10% 3% 10%;
        }

        .detail-pro-row-col1 {
            padding: 10% 0;
        }

        .detail-pro-row-col1 h3 {
            text-align: center;
            margin: 0;
            padding: 20px 0;
        }

        .detail-pro-row-col1 span {
            display: block;
            text-align: center;
            margin: 5px 0 20px 0;
        }

        .quantity {
            display: inline;
            margin-right: 20px;
        }

        #quantity {
            width: 75%;
            height: 40px;
            border: 1px solid #cccc;
            border-radius: 5px;
            margin-bottom: 30px;
        }

        .but {
            text-align: center;
        }


        #them {
            width: 150px;
            height: 40px;
            border: 1px solid #00AFC1;
            background: #00AFC1;
            color: #46244C;
            font-weight: bold;
            border-radius: 5px;
        }

        .detail-pro-row2 {
            margin-bottom: 30px;
        }

        .detail-pro-row2 h3 {
            margin: 0;
            padding: 10px 0;
        }

        .detail-pro-row2 p {
            margin: 0;
            padding: 5px 10px;
        }

        .detail-pro-row2 form {
            padding: 10px 0;
        }

        .detail-pro-row2 form input {
            width: 100%;
            height: 100px;
            border-radius: 10px;
            border: 1px solid #E45826;
        }

        .table {
            width: 1000px;
            margin-left: 200px;
        }

        .table p {
            margin-top: 15px;
            margin-left: 50px;
            border: 1px solid #cccc;
            border-radius: 10px;
        }

        section h3 {
            margin: 0;
            padding: 20px 0;
        }
    </style>
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
        <div class="detail-pro">
            <div class="detail-pro-row">
                <div class="detail-pro-row-col">
                    <img src="./img/tin6.png" alt="">
                </div>
                <div class="detail-pro-row-col1">
                    <h3>Tên sản phẩm</h3>
                    <span>Gía sản phẩm</span>
                    <form action="" method="POST">
                        <p class="quantity">Số lượng</p>
                        <input type="number" min="1" name="" id="quantity">
                        <div class="but">
                            <button type="submit" name="" id="them">Thêm vào giỏ hàng</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="detail-pro-row2">
                <h3>Mô tả sản phẩm</h3>
                <p>ghàkksjfgghkl</p>
            </div>
            <div class="detail-pro-row2">
                <h3>Bình luận</h3>
                <form action="" method="POST">
                    <input type="text" name="" id="" placeholder="" autocomplete="off">
                </form>
                <div class="table">
                    <span style="color: black;">Tên người bình luận</span>
                    <p>Nội dung bình luận</p>
                </div>
            </div>
            <section id="section">
                <h3>Sản phẩm liên quan</h3>
                <div id="main_row">
                    <div class="main_row_col">
                        <a href="#">
                            <img src="../view/img/item.png" alt="">
                        </a>
                        <span>89,000đ</span>
                        <h4>Sữa Rửa Mặt Chiết Xuất Chanh Himalaya</h4>
                    </div>
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