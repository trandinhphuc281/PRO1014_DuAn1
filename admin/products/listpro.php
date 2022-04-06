<?php
include '../config.php';
?>
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
                            <li><a href="">TỚI TRANG WEB</a></li>
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
                    <?php
                    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 5;
                    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
                    $offset = ($current_page - 1) * $item_per_page;
                    $connection = new PDO("mysql:host=127.0.0.1;dbname=baileyshop;charset=utf8", "root", "");
                    $query = "SELECT * FROM products ORDER BY id ASC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                    $stmt = $connection->prepare($query);
                    $stmt->execute();
                    $products = $stmt->fetchAll();
                    // đếm số sản phẩm
                    $total = mysqli_query($con, "SELECT * FROM products");
                    // var_dump($total);
                    // die;
                    // tính tổng sản phẩm
                    $total = $total->num_rows;

                    // tính số trang
                    $totalPage = ceil($total / $item_per_page);
                    // echo "<pre>";
                    // var_dump($products);
                    // die;
                    ?>
                    <div id="table" style="padding: 0 30px 50px 30px;width:100">
                        <div class="text">
                            <h4>Danh sách sản phẩm</h4>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Tên sản phẩm</th>
                                    <th style="text-align: center;">Gía nhập</th>
                                    <th style="text-align: center;">Gía bán</th>
                                    <th style="text-align: center;">Hình ảnh</th>
                                    <th style="text-align: center;">Ngày nhập</th>
                                    <th style="text-align: center;">Số lượt xem</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $product) : ?>
                                    <tr>
                                        <td><?php echo $product["name"] ?></td>
                                        <td><?php echo $product["import_price"] ?></td>
                                        <td><?php echo $product["price"] ?></td>
                                        <td style="text-align: center;width:100px;"><img src="../img/<?php echo $product["image"] ?>" alt="" style="width:100%;height:100%;"></td>
                                        <td><?php echo $product["created_at"] ?></td>
                                        <td><?php echo $product["view"] ?></td>
                                        <td style="width:150px;">
                                            <a href="./update-pro.php?id=<?php echo $product['id'] ?>" style="text-decoration: none;">
                                                <button type="button" class="btn btn-primary">Edit</button>
                                            </a>
                                            <a onclick="return Del('<?php echo $product['id'] ?>')" href="./delete-pro.php?id=<?php echo $product['id'] ?>" style="text-decoration: none;">
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <?php include '../page.php' ?>
                        <div class="form1-btn">
                            <a href="./pro.php" style="text-decoration: none;">
                                <button type="button" class="btn btn-success">Thêm sản phẩm</button>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
    <script>
        function Del() {
            return confirm("Bạn có muốn xóa sản phẩm này không?");
        }
    </script>
</body>

</html>