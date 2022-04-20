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
                            <h4>Doanh thu của cửa hàng</h4>
                        </div>
                        <?php
                        $connection = new PDO("mysql:host=127.0.0.1;dbname=baileyshop;charset=utf8", "root", "");
                        $query = "SELECT products.id as 'masp',products.name as'tensp',products.import_price as'gianhap',
                        order_detail.price as'giasp', order_detail.quantity as'soluong',order_detail.price*order_detail.quantity as'thanhtien',
                        order_detail.quantity*products.import_price as 'tongnhap',(order_detail.price*order_detail.quantity) -(order_detail.quantity*products.import_price)as 'doanhthu' FROM products JOIN order_detail ON products.id = order_detail.id_pro JOIN bill ON order_detail.order_id = bill.id";
                        $stmt = $connection->prepare($query);
                        $stmt->execute();
                        $doanhthu = $stmt->fetchAll();
                        // echo "<pre>";
                        // var_dump($doanhthu);
                        // die;
                        $tongsl = 0;
                        $thuve = 0;
                        ?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Gía sản phẩm</th>
                                    <th>Gía nhập</th>
                                    <th>Số lượng bán ra</th>
                                    <th>Thành tiền</th>
                                    <th>Tổng giá nhập</th>
                                    <th>Doanh thu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($doanhthu as $index => $doanhthus) :
                                    $tongsl += $doanhthus['soluong'];
                                    $thuve += $doanhthus['doanhthu'];
                                ?>
                                    <tr>
                                        <th><?php echo $index + 1 ?></th>
                                        <td><?php echo $doanhthus['masp'] ?></td>
                                        <td><?php echo $doanhthus['tensp'] ?></td>
                                        <td><?php echo $doanhthus['giasp'] ?></td>
                                        <td><?php echo $doanhthus['gianhap'] ?></td>
                                        <td><?php echo $doanhthus['soluong'] ?></td>
                                        <td><?php echo $doanhthus['thanhtien'] ?></td>
                                        <td><?php echo $doanhthus['tongnhap'] ?></td>
                                        <td><?php echo $doanhthus['doanhthu'] ?></td>
                                    </tr>
                                <?php endforeach ?>

                                <tr>
                                    <th scope="row"></th>
                                    <td colspan="4"></td>
                                    <td>Tổng: <?php echo $tongsl ?> sản phẩm</td>
                                    <td colspan="2"></td>
                                    <td>Doanh thu: <?php echo $thuve ?>.000 VNĐ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>