<?php
if (isset($_POST['submit'])) {
    $title = $_POST["title"];
    $discription = $_POST["discription"];
    $image = $_FILES["image"]["name"];
    $created_at = $_POST["created_at"];
    $content = $_POST["content"];
    $file = $_FILES["image"];
    move_uploaded_file($file['tmp_name'], "../img/" . $file['name']);
    if ($title != "" && $discription != "" && $image != "" && $created_at != "" && $content != "") {
        $connection = new PDO("mysql:host=127.0.0.1;dbname=baileyshop;charset=utf8", "root", "");
        $query = "INSERT INTO news (title, discription, image, created_at, content)
VALUES ('$title', '$discription', '$image', '$created_at', '$content')";
        $stmt = $connection->prepare($query);
        $stmt->execute();
        header("location:./listnew.php");
    } else {
        echo "<script>alert('Vui lòng nhập đầy đủ thông tin bài viết')</script>";
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
                    <div class="form">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="text">
                                <h4>Thêm tin tức</h4>
                            </div>
                            <div class="form1">
                                <div class="form1-row">
                                    <span>Tiêu đề</span>
                                    <input type="text" onblur="checkTitle()" id="title" name="title" autocomplete="off">
                                    <span class="error" id="errorTitle"></span>
                                </div>
                                <div class="form1-row">
                                    <span>Mô tả</span>
                                    <input type="text" onblur="checkDiscription()" id="dicription" name="discription" autocomplete="off">
                                    <span class="error" id="errorDiscription"></span>
                                </div>
                                <div class="form-row2a">
                                    <div class="form-row2a-col">
                                        <span>Hình ảnh</span>
                                        <input type="file" onblur="checkImg()" id="image" name="image" multiple>
                                        <span class="error" id="errorImg"></span>
                                    </div>
                                    <div class="form-row2a-col">
                                        <span>Ngày viết</span>
                                        <input type="date" onblur="checkDate()" id="date" name="created_at">
                                        <span class="error" id="errorDate"></span>
                                    </div>
                                </div>
                                <div class="form2-row2b">
                                    <span>Nội dung</span>
                                    <input type="text" onblur="checkContent()" id="content" name="content" autocomplete="off">
                                    <span class="error" id="errorContent"></span>
                                </div>
                                <div class="form1-btn">
                                    <button type="submit" class="btn btn-success" id="submit" name="submit">Thêm</button>
                                    <a href="./listnew.php" style="text-decoration: none;">
                                        <button type="button" class="btn btn-success">Danh sách tin tức</button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <script src="../js/validate.js"></script>
    </div>
</body>

</html>