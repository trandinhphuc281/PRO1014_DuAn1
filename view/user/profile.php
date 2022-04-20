<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../css/sub-menu.css">
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
                        <div class="header_search_bot">
                            <form action="./search.php" method="POST">
                                <input type="text" name="searchpro" placeholder="  Tìm kiếm sản phẩm" require>
                                <button type="submit" name="search">Tìm kiếm</button>
                            </form>

                            <?php
                            if (isset($_SESSION['admin'])) { ?>
                                <nav id="navbar1">
                                    <ul id="main-menu">
                                        <li>
                                            <a href="#"><?= $_SESSION['admin']['name'] ?></a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="./profile.php?id=<?php echo $_SESSION['admin']['id'] ?>">Thông tin</a>
                                                </li>
                                                <li>
                                                    <?php
                                                    if (isset($_SESSION['admin'])) { ?>
                                                        <a href="../admin/index.php">Quản trị</a>
                                                    <?php } ?>
                                                </li>
                                                <li>
                                                    <a href="./logout.php?id=<?php echo $_SESSION['admin']['id'] ?>" onclick="return alert('Bạn chắc chắn muốn đăng xuất chứ ?')">Đăng xuất</a>
                                                </li>
                                            </ul>
                                        </li>

                                    </ul>
                                </nav>
                            <?php
                            } elseif (isset($_SESSION['khach_hang'])) { ?>
                                <nav id="navbar1">
                                    <ul id="main-menu">
                                        <li>
                                            <a href="#"><?= $_SESSION['khach_hang']['name'] ?></a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="./profile.php?id=<?php echo $_SESSION['khach_hang']['id'] ?>">Thông tin</a>
                                                </li>
                                                <li>
                                                    <a href="./logout.php?id=<?php echo $_SESSION['khach_hang']['id'] ?>" onclick="return alert('Bạn chắc chắn muốn đăng xuất chứ ?')">Đăng xuất</a>
                                                </li>
                                            </ul>
                                        </li>

                                    </ul>
                                </nav>
                            <?php
                            } else { ?>
                                <nav id="navbar1">
                                    <ul id="main-menu">
                                        <li>
                                            <a href="../log_in.php">Đăng nhập</a>
                                            <ul class="sub-menu">
                                                <li><a href=".register.php">Đăng Kí</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar">
            <ul class="main-menu">
                <li><a href="../index.php">DANH MỤC SẢN PHẨM</a></li>
                <li><a href="../likepro.php">SẢN PHẨM BÁN CHẠY</a></li>
                <li><a href="../introduce.php">GIỚI THIỆU</a></li>
                <li><a href="../news.php">TIN TỨC</a></li>
                <li><a href="../contact.php">LIÊN HỆ</a></li>
                <li><a href="../gio_hang.php">GIỎ HÀNG</a></li>
            </ul>
        </div>
        <div class="form_login">
            <div class="text_login">
                <h2>Thông Tin Tài Khoản</h2>
            </div>
            <?php
            // Lấy thông tin tài khoản
            $id = $_GET['id'];
            $connection = new PDO("mysql:host=127.0.0.1;dbname=baileyshop;charset=utf8", "root", "");
            $query = "SELECT * FROM users WHERE id= '$id'";
            $stmt = $connection->prepare($query);
            $stmt->execute();
            $taikhoan = $stmt->fetch();
            // echo "<pre>";
            // var_dump($taikhoan);
            // die;

            // Cập nhật lại tài khoản
            if (isset($_POST["login"])) {
                $name = $_POST["name"];
                $phone = $_POST["phone"];
                $password = $_POST["password"];
                $passwords = $_POST["passwords"];
                $address = $_POST["address"];
                if ($name != "" && $phone != "" && $password != "" && $passwords != "" && $address != "") {
                    $query = "UPDATE users SET name ='$name', password='$passwords', phone='$phone', address='$address' WHERE id='$id'";
                    $stmt = $connection->prepare($query);
                    $stmt->execute();
                    echo "<script>alert('Cập nhật thành công')</script>";
                } else {
                    echo "<script>alert('Vui lòng nhập đầy đủ thông tin cá nhân')</script>";
                }
            }
            ?>
            <form action="" method="POST">
                <div class="mb-3">
                    <p>Họ và tên:</p>
                    <input type="text" onblur="checkName()" id="username" name="name" placeholder="  VD:Trần Văn A" value="<?php echo $taikhoan["name"] ?>" autocomplete="off">
                    <span id="errorName"></span>
                    <p>Email:</p>
                    <input type="email" onblur="checkEmail()" id="email" name="email" placeholder="  VD:abc@gmail.com" value="<?php echo $taikhoan["email"] ?>" autocomplete="off" disabled>
                    <span id="errorEmail"></span>
                    <p>Số điện thoại:</p>
                    <input type="text" onblur="checkPhone()" id="phone" name="phone" placeholder=" VD:0123456789" value="<?php echo $taikhoan["phone"] ?>" autocomplete="off">
                    <span id="errorPhone"></span>
                    <p>Mật khẩu mới:</p>
                    <input type="password" onblur="checkPassword()" id="password" name="password" placeholder="  VD:123456" autocomplete="off">
                    <span id="errorPassword"></span>
                    <p>Xác nhận lại mật khẩu:</p>
                    <input type="password" onblur="checkPasswords()" id="passwords" name="passwords" placeholder="  VD:123456" autocomplete="off">
                    <span id="errorPasswords"></span>
                    <p>Địa chỉ:</p>
                    <input type="text" onblur="chekAddress()" id="address" name="address" placeholder=" VD:Nam Từ Liêm, Hà Nội" value="<?php echo $taikhoan["address"] ?>" autocomplete="off">
                    <span id="errorAddress"></span>
                </div>
                <div class="submit_register">
                    <button type="submit" name="login" id="submit">Cập nhật tài khoản</button>
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
    <script>
        function checkPasswords() {
            var password = document.getElementById("password").value;
            var passwords = document.getElementById("passwords").value;
            if (password === passwords) {
                document.getElementById('errorPasswords').innerHTML = "";
                document.getElementById('passwords').style.border = "1px solid green";
                document.getElementById("submit").disabled = false;
            } else {
                document.getElementById('errorPasswords').innerHTML = "Mật khẩu không trùng khớp";
                document.getElementById('passwords').style.border = "1px solid red";
                document.getElementById("submit").disabled = true;
            }
        }
    </script>
</body>

</html>