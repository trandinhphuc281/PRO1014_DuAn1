<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/demo.css">
    <link rel="stylesheet" href="../css/form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <section class="header-top">
            <div class="header-row">
                <div class="header-row-col img">
                    <img src="../img/logo.png" alt="">
                </div>
                <div class="header-row-col">
                    <h3>Welcome to Admin Bailey Beauty Cosmetic</h3>
                </div>
            </div>
        </section>
        <section class="main">
            <div class="main-row">
                <div class="article-left">
                    <div class="navbar">
                        <ul id="menu">
                            <hr id="khoangcach">
                            <li><a href="../index.php">TỚI TRANG WEB</a></li>
                            <li><a href="../categories/cate.php">LOẠI HÀNG</a></li>
                            <li><a href="../products/pro.php">SẢN PHẨM</a></li>
                            <li><a href="../user/listuser.php">KHÁCH HÀNG</a></li>
                            <li><a href="../comments/listcomment.php">BÌNH LUẬN</a></li>
                            <li><a href="../news/new.php">TIN TỨC</a></li>
                            <li><a href="../order/listorder.php">ĐƠN HÀNG</a></li>
                            <li><a href="../statistical/statistical.php">THỐNG KÊ</a></li>
                            <li><a href="../contact/listcontact.php">LIÊN HỆ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="article-right">
                    <div class="banner">
                        <img src="../img/banner.png" alt="">
                    </div>
                    <div id="table">
                        <div class="text">
                            <h4>Chi tiết đơn hàng</h4>
                        </div>
                        <?php
                        $id = $_GET['id'];
                        // var_dump($id);
                        // die;
                        $connection = new PDO("mysql:host=127.0.0.1;dbname=baileyshop;charset=utf8", "root", "");
                        $query = "SELECT products.image ,products.name ,products.price ,order_detail.quantity,
                        order_detail.order_id FROM order_detail JOIN products ON order_detail.id_pro = products.id WHERE order_id =$id";
                        $stmt = $connection->prepare($query);
                        $stmt->execute();
                        $orders = $stmt->fetchAll();
                        // echo "<pre>";
                        // var_dump($orders);
                        // die;
                        ?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="text-align:center;">Mã đơn hàng</th>
                                    <th style="text-align:center;">Tên sản phẩm</th>
                                    <th style="text-align:center;">Giá sản phẩm</th>
                                    <th style="text-align:center;">Hình ảnh</th>
                                    <th style="text-align:center;">Số lượng mua</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $index = 1;
                                foreach ($orders as $hoadon) : ?>
                                    <tr>
                                        <th><?php echo $index++ ?></th>
                                        <td style="text-align:center;"><?php echo $hoadon['order_id'] ?></td>
                                        <td><?php echo $hoadon['name'] ?></td>
                                        <td style="text-align:center;"><?php echo $hoadon['price'] ?></td>
                                        <td style="text-align:center;width:100px;"><img src="../img/<?php echo $hoadon['image'] ?>" alt="" style="width:100%;height:100%;"></td>
                                        <td style="text-align:center;"><?php echo $hoadon['quantity'] ?></td>
                                    </tr>
                                <?php $index++;
                                endforeach ?>
                            </tbody>
                        </table>
                        <div class="form1-btn" style="padding: 20px;">
                            <a href="./listorder.php" style="text-decoration: none;">
                                <button type="button" class="btn btn-success">Danh sách đơn hàng</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>