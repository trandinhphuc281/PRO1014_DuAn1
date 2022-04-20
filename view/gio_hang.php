<?php
session_start();
include "./config.php";
?>
<?php
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
$error = false;
if (isset($_GET['action'])) {
    function update_cart()
    {
        foreach ($_POST['quantity'] as $id => $quantity) {
            $_SESSION['cart'][$id] = $quantity;
        }
    }
    // var_dump($_POST);
    // exit;
    switch ($_GET['action']) {

        case "add":
            foreach ($_POST['quantity'] as $id => $quantity) {
                $_SESSION['cart'][$id] = $quantity;
            }
            break;
        case "delete":
            // var_dump($_SESSION['cart']);
            // echo "DELETE";
            // die;
            if (isset($_GET['id'])) {
                unset($_SESSION['cart'][$_GET['id']]);
            }
            break;
        case "submit":
            if (isset($_POST['update_click'])) { //cập nhật so luong san pham
                update_cart();
            } else if (isset($_POST['order_click'])) { //dat mua san pham
                if (empty($_POST['name'])) {
                    $error = "Bạn chưa nhập tên người nhận";
                } elseif (empty($_POST['phone'])) {
                    $error = "Bạn chưa nhập số điện thoại người nhận";
                } elseif (empty($_POST['address'])) {
                    $error = "Bạn chưa nhập địa chỉ nhận hàng";
                }
                if ($error == false && !empty($_POST['quantity'])) { //xu ly gio hang
                    $products = mysqli_query($con, "SELECT * FROM `products` WHERE `id` IN (" . implode(",", array_keys($_POST['quantity'])) . ")");
                    $total = 0;
                    $orderProducts = array();
                    while ($row = mysqli_fetch_array($products)) {
                        $orderProducts[] = $row;
                        $total += $row['price'] * $_POST['quantity'][$row['id']];
                    }
                    $insertBill = mysqli_query($con, "INSERT INTO `bill` (`id`, `name`, `address`, `phone`, `total`, `created_at`, `thanh_toan`) 
                    VALUES (NULL, '" . $_POST['name'] . "', '" . $_POST['address'] . "', '" . $_POST['phone'] . "', '" . $total . "', now(), '" . $_POST['thanhtoan'] . "')");
                    $orderId = $con->insert_id;
                    $insertString = "";
                    foreach ($orderProducts as $key => $product) {
                        $insertString .= "(NULL, '" . $product['id'] . "', '" . $_POST['quantity'][$product['id']] . "', '" . $product['price'] . "', '" . $orderId . "')";
                        if ($key != count($orderProducts) - 1) {
                            $insertString .= ",";
                        }
                    }
                    $insertOrderDetail = mysqli_query($con, "INSERT INTO `order_detail` (`id`, `id_pro`, `quantity`, `price`, `order_id`) VALUES " . $insertString . ";");
                    echo "<script>alert('Đặt hàng thành công. Bạn vui lòng để ý điện thoại để nhân viên check lại đơn hàng của bạn!')</script>";
                    unset($_SESSION['cart']);
                }
                break;
            }
    }
    if (!empty($_SESSION['cart'])) {
        $products = mysqli_query($con, "SELECT * FROM products WHERE `id` IN (" . implode(",", array_keys($_SESSION['cart'])) . ")");
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
    <link rel="stylesheet" href="../view/css/giohang.css">
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
        <div class="giohang">
            <div class="giohang-text">
                <h3>GIỎ HÀNG CỦA BẠN</h3>
            </div>
            <div class="giohang-table">

                <form action="gio_hang.php?action=submit" method="POST" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Xóa</th>
                        </tr>
                        <?php
                        if (!empty($products)) {
                            $total = 0;
                            $num = 1;
                            while ($product = mysqli_fetch_array($products)) { ?>
                                <tr>
                                    <td><?php echo $num++; ?></td>
                                    <td><?php echo $product['name'] ?></td>
                                    <td style="text-align: center"><img src="../admin/img/<?php echo $product['image'] ?>" alt="" style="width:100px;height:100px;"></td>
                                    <td><?php echo number_format($product['price'])  ?>.000 đ</td>
                                    <td style="text-align: center;"><input type="text" name="quantity[<?php echo $product['id'] ?>]" value="<?php echo $_SESSION['cart'][$product['id']] ?>" style="width:30px;"></td>
                                    <td><?php echo number_format($product['price'] * $_SESSION['cart'][$product['id']]) ?>.000 đ</td>
                                    <td style="text-align: center;">
                                        <a href="gio_hang.php?action=delete&id=<?php echo $product['id'] ?>" style="color:#30AADD">Xóa</a>
                                    </td>
                                </tr>
                        <?php
                                $total += $product['price'] * $_SESSION['cart'][$product['id']];
                                $num++;
                            }
                        } ?>

                        <tr>
                            <td colspan="5">Tổng tiền</td>
                            <?php
                            if (!empty($total)) { ?>
                                <td style="color: red;"><?php echo  number_format($total)  ?>.000 đ</td>
                            <?php } ?>
                            <td></td>
                        </tr>

                    </table>
                    <div class="capnhat" style="margin-top: 20px;margin-left:93%;margin-bottom:30px;width:200px;">
                        <button type="submit" name="update_click" value="Cập nhật" style="height:40px;">Cập nhật</button>
                    </div>
                    <div class="phone_email">
                        <div class="phone">
                            <p>Họ và tên người nhận:</p>
                            <input type="text" onblur="checkName()" id="username" name="name" placeholder="  Họ và tên người nhận" autocomplete="off">
                            <span id="errorName"></span>
                        </div>
                        <div class="email">
                            <p>Số điện thoại người nhận:</p>
                            <input type="text" onblur="checkPhone()" id="phone" name="phone" placeholder="  Số điện thoại người nhận" autocomplete="off">
                            <span id="errorPhone"></span>
                        </div>
                    </div>
                    <div class="phone_email">
                        <div class="phone">
                            <p>Địa chỉ nhận hàng:</p>
                            <input type="text" onblur="chekAddress()" id="address" name="address" placeholder="  Địa chỉ nhận hàng" autocomplete="off">
                            <span id="errorAddress"></span>
                        </div>
                        <div class="email">
                            <p>Hình thức thanh toán:</p>
                            <select onblur="checkCate()" id="thanhtoan" name="thanhtoan" style="height: 40px;width: 100%;border: 1px solid green;border-radius: 5px;">
                                <option value="0">Thanh toán sau khi nhận hàng</option>
                            </select>
                            <span class="error" id="errorCate"></span>
                        </div>
                    </div>
                    <div class="form_content">
                        <p>Ghi chú</p>
                        <input type="text" onblur="checkContent()" id="contents" name="content" placeholder="  Ghi chú" autocomplete="off">
                        <span id="errorContents"></span>
                    </div>
                    <div class="button">
                        <button type="submit" id="submit" name="order_click">Đặt mua</button>
                    </div>
                </form>
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
    <script src="./js/validate-form.js"></script>
</body>

</html>