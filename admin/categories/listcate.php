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
                    $connection = new PDO("mysql:host=127.0.0.1;dbname=baileyshop;charset=utf8", "root", "");
                    $query = "SELECT * FROM categories";
                    $stmt = $connection->prepare($query);
                    $stmt->execute();
                    $categories = $stmt->fetchAll();
                    ?>
                    <div id="table" style="padding: 0 100px 50px 100px;">
                        <div class="text">
                            <h4>Danh sách loại hàng</h4>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Parent Id</th>
                                    <th scope="col">Tên loại hàng</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($categories as $categorie) : ?>
                                    <tr>
                                        <th scope="row"><?php echo $categorie["id"] ?></th>
                                        <td><?php echo $categorie["parent_id"] ?></td>
                                        <td><?php echo $categorie["name"] ?></td>
                                        <td>
                                            <a href="./update-cate.php?id=<?php echo $categorie['id'] ?>" style="text-decoration: none;">
                                                <button type="button" class="btn btn-primary">Edit</button>
                                            </a>
                                            <a onclick="return Del('<?php echo $categorie['id'] ?>')" href="./delete-cate.php?id=<?php echo $categorie['id'] ?>" style="text-decoration: none;">
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <div class="form1-btn">
                            <a href="../categories/cate.php" style="text-decoration: none;">
                                <button type="button" class="btn btn-success">Thêm loại hàng</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        function Del() {
            return confirm("Bạn có muốn xóa loại hàng này không");
        }
    </script>
</body>

</html>