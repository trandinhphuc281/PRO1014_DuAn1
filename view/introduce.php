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
        <div class="introduce">
            <div class="introduce_row">
                <h3>Bailey Shop</h3>
                <p>Sứ mệnh của Baiily Shop là giúp chi em phụ nữ Việt Nam có được vẻ ngoài xinh đẹp, rạng rỡ, tinh thần
                    sảng khoái thu hút phái mạnh. Với kinh nghiệm phục vụ hàng triệu nữ giới Việt thông qua việc chuyên
                    cung cấp các sản phẩm chăm sóc tóc, da mặt, dầu gội…của chuỗi cửa hàng salon tóc Bailey. Bailey Shop
                    khẳng định được vị thế là nhà phân phối mỹ phẩm chính hãng giá tốt nhất thị trường. Song song với sự
                    phát triển của xã hội và nhu cầu chăm sóc tăng cao của nữ giới vì chính ngoại hình giúp phái nữ trở
                    nên tự tin hơn, có nhiều cơ hội trong cuộc sống. Hiểu được điều này Bailey Shop đem đến cho bạn
                    những dòng sản phẩm dẫn đầu thị trường với giá cực tốt:</p>
            </div>
            <div class="introduce_row1">
                <div class="introduce_row1_col">
                    <img src="../view/img/intro1.png" alt="">
                    <h4>Chất lượng thật - Giá trị thật</h4>
                    <p>Bailey Shop đa dạng hoá tất cả các sản phẩm giúp nữ giới tự tin hơn và bứt phá trong cuộc sống.
                        Hơn 200 mặt hàng tiêu dùng và hơn 100 sản phẩm chuyên dụng chăm sóc tóc, chăm sóc da, sản phẩm
                        underwear đồ lót, tất nữ…</p>
                </div>
                <div class="introduce_row1_col">
                    <img src="../view/img/intro2.png" alt="">
                    <h4>Chính sách cho khách hàng</h4>
                    <p>Hàng ngàn khách hàng đã sử dụng sản phẩm của Bailey Shop. Tất cả khách hàng của Bailey đều sử
                        dụng sản phẩm Bailey Shop cung cấp. Chính sách đổi trả hàng không cần lý do trên tất cả hệ thống
                        cửa hàng Bailey trên toàn quốc. Bailey Shop làm tất cả vì sự hài lòng của khách hàng.</p>
                </div>
                <div class="introduce_row1_col">
                    <img src="../view/img/intro3.png" alt="">
                    <h4>Hỗ trợ giao hàng toàn quốc</h4>
                    <p>Vận chuyển nhanh chóng, giao hàng tận nơi. Gọi điện đặt hàng là có hàng luôn.
                        Thanh toán ship COD an toàn tiện lợi, phù hợp với mọi khách hàng.</p>
                </div>
            </div>
            <div class="introduce_row2">
                <div class="introduce_row2_col">
                    <h3>Các sản phẩm của chúng tôi</h3>
                    <p>Bailey Shop mang đến những sản phẩm của những thương hiệu hàng đầu thế giới được nhiều người ưa
                        dùng.</p>
                </div>
                <div class="introduce_row2_colum">
                    <img src="../view/img/intro4.png" alt="">
                </div>
            </div>
            <div class="introduce_row2">
                <div class="introduce_row2_colum">
                    <img src="../view/img/intro5.png" alt="">
                </div>
                <div class="introduce_row2_col">
                    <h3>Chi tiết sản phẩm</h3>
                    <p>Bất cứ sản phẩm nào không đạt được tiêu chuẩn sẽ được loại bỏ và tiêu hủy lập tức. Sản phẩm hoàn
                        thiện đồng nhất đảm bảo chất lượng đưa tới tay người tiêu dùng.</p>
                </div>
            </div>
            <div class="introduce_row2">
                <div class="introduce_row2_col">
                    <h3>Đảm bảo chất lượng</h3>
                    <p>Tất cả sản phẩm của chúng tôi đều được đảm bảo thích ứng tốt với người Việt Nam, không gây các
                        tác dụng phụ hay ảnh hưởng đến sức khỏe khi sử dụng lâu dài. Mọi tác động đến sức khỏe có nguyên
                        nhân từ sản phẩm của chúng tôi đều được công ty chịu hoàn toàn trách nhiệm.</p>
                </div>
                <div class="introduce_row2_colum">
                    <img src="../view/img/intro6.png" alt="">
                </div>
            </div>
            <div class="introduce_row2">
                <div class="introduce_row2_colum">
                    <img src="../view/img/intro7.png" alt="">
                </div>
                <div class="introduce_row2_col">
                    <h3>Chúng tôi luôn lắng nghe</h3>
                    <p>Bailey Shop luôn lắng nghe phản hồi, góp ý từ phía khách hàng nhằm ngày càng cải thiện chất lượng
                        dịch vụ, sản phẩm tốt hơn tới tay khách hàng</p>
                </div>
            </div>
        </div>
        <div class="introduce_row3">
            <h3>Tại sao chọn chúng tôi</h3>
            <p>Vì sứ mệnh tạo nên những giá trị thương hiệu, chúng tôi đã, đang và sẽ luôn nỗ lực hết mình vì sự phát
                triển – khẳng định thương hiệu Việt, mang lại những giá trị lâu dài cho doanh nghiệp.
            </p>
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