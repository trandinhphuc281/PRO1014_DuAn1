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
                    <div id="table" style="padding: 0 30px 50px 30px;">
                        <div class="text">
                            <h4>Danh sách đơn hàng</h4>
                        </div>
                        <?php
                        $connection = new PDO("mysql:host=127.0.0.1;dbname=baileyshop;charset=utf8", "root", "");
                        $query = "SELECT * FROM bill";
                        $stmt = $connection->prepare($query);
                        $stmt->execute();
                        $bills = $stmt->fetchAll();
                        // var_dump($bills);
                        // die;
                        ?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên người nhận</th>
                                    <th>Số điện thoại người nhận</th>
                                    <th>Địa chỉ</th>
                                    <th>Tổng tiền</th>
                                    <th>Ngày mua</th>
                                    <th>Phương thức thanh toán</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($bills as $index => $bill) : ?>
                                    <tr>
                                        <th><?php echo $index + 1 ?></th>
                                        <td><?php echo $bill['name'] ?></td>
                                        <td><?php echo $bill['phone'] ?></td>
                                        <td><?php echo $bill['address'] ?></td>
                                        <td><?php echo $bill['total'] ?></td>
                                        <td><?php echo $bill['created_at'] ?></td>
                                        <td><?php echo $bill['thanh_toan'] == 0 ? 'Thanh toán sau khi nhận hàng' : 'Chuyển khoản' ?></td>
                                        <td>
                                            <a href="./orderdetail.php?id=<?php echo $bill['id'] ?>" style="text-decoration: none;">
                                                <button type="button" class="btn btn-info">Xem chi tiết</button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>