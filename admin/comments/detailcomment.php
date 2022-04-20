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
                    <?php
                    $id = $_GET['id'];
                    $connection = new PDO("mysql:host=127.0.0.1;dbname=baileyshop;charset=utf8", "root", "");
                    $query = "SELECT comments.id,comments.content,comments.created_at,users.name, products.name AS 'tensp'
                    FROM comments JOIN users on users.id = comments.id_user JOIN products ON products.id = comments.id_pro and comments.id_pro =$id";
                    $stmt = $connection->prepare($query);
                    $stmt->execute();
                    $comments = $stmt->fetchAll();
                    // echo "<pre>";
                    // var_dump($comments);
                    // die;
                    ?>
                    <div id="table">
                        <div class="text">
                            <h4>Chi tiết bình luận</h4>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="text-align: center;">Nội dung bình luận</th>
                                    <th>Người bình luận</th>
                                    <th>Ngày bình luận</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($comments as $index => $comment) : ?>
                                    <tr>
                                        <th><?php echo $index + 1 ?></th>
                                        <td style="width:550px;"><?php echo $comment['content'] ?></td>
                                        <td><?php echo $comment['name'] ?></td>
                                        <td><?php echo $comment['created_at'] ?></td>
                                        <td style="width:110px;">
                                            <a href="./deletecomment.php?id=<?php echo $comment['id'] ?>" style="text-decoration: none;">
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <div class="form1-btn" style="padding-bottom: 30px;padding-left: 50px;">
                            <a href="./listcomment.php" style="text-decoration: none;">
                                <button type="button" class="btn btn-success">Danh sách bình luận</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>