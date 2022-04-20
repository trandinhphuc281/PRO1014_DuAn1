<?php
$connection = new PDO("mysql:host=127.0.0.1;dbname=baileyshop;charset=utf8", "root", "");
$sql = "";
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
                    $connection = new PDO("mysql:host=127.0.0.1;dbname=baileyshop;charset=utf8", "root", "");
                    $query = "SELECT comments.id, comments.id_pro, products.id, products.name, COUNT(*) as 'soluong', MAX(comments.created_at) AS 'moi', MIN(comments.created_at) as 'cu' 
                    FROM comments JOIN products ON products.id = comments.id_pro GROUP BY products.id, products.name HAVING soluong>0";
                    $stmt = $connection->prepare($query);
                    $stmt->execute();
                    $comments = $stmt->fetchAll();
                    // echo "<pre>";
                    // var_dump($comments);
                    // die;
                    ?>
                    <div id="table" style="padding: 0 30px 50px 30px;">
                        <div class="text">
                            <h4>Danh sách bình luận</h4>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="text-align: center;">Tên sản phẩm</th>
                                    <th>Số lượng bình luận</th>
                                    <th>Ngày mới nhất</th>
                                    <th>Ngày cũ nhất</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($comments as $index => $comment) : ?>
                                    <tr>
                                        <td><?php echo $index + 1 ?></td>
                                        <td style="width: 445px;"><?php echo $comment["name"] ?></td>
                                        <td><?php echo $comment["soluong"] ?></td>
                                        <td><?php echo $comment["moi"] ?></td>
                                        <td><?php echo $comment["cu"] ?></td>
                                        <td>
                                            <a href="./detailcomment.php?id=<?php echo $comment['id'] ?>" style="text-decoration: none;">
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