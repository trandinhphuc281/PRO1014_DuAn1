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
                    <div class="form">
                        <?php
                        $id = $_GET['id'];
                        $connection = new PDO("mysql:host=127.0.0.1;dbname=baileyshop;charset=utf8", "root", "");
                        $query = "SELECT * FROM products WHERE id=$id";
                        $stmt = $connection->prepare($query);
                        $stmt->execute();
                        $products = $stmt->fetch();
                        ?>

                        <!-- Sửa thông tin sản phẩm-->
                        <?php
                        if (isset($_POST["submit"])) {
                            $name = $_POST["name"];
                            $categories = $_POST["categories"];
                            $import_price = $_POST["import_price"];
                            $price = $_POST['price'];
                            $image = $_FILES["image"]["name"];
                            $created_at = $_POST["created_at"];
                            $content = $_POST["content"];
                            $file = $_FILES["image"];
                            move_uploaded_file($file['tmp_name'], "../img/" . $file["name"]);
                            $connection = new PDO("mysql:host=127.0.0.1;dbname=baileyshop;charset=utf8", "root", "");
                            $query = "UPDATE products SET name= '$name',import_price = '$import_price', price ='$price',
                                image='$image',created_at='$created_at', content='$content' WHERE id=$id";
                            $stmt = $connection->prepare($query);
                            $stmt->execute();
                            header("location:./listpro.php");
                        }
                        ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="text">
                                <h4>Sửa sản phẩm</h4>
                            </div>
                            <div class="form2">
                                <div class="form2-row">
                                    <span>Tên sản phẩm</span>
                                    <input type="text" onblur="checkTensp()" id="tensp" name="name" value="<?php echo $products["name"] ?>" autocomplete="off">
                                    <span class="error" id="errorTensp"></span>
                                </div>
                                <div class="form2-row">
                                    <?php
                                    $connection = new PDO("mysql:host=127.0.0.1;dbname=baileyshop;charset=utf8", "root", "");
                                    $query = "SELECT * FROM categories";
                                    $stmt = $connection->prepare($query);
                                    $stmt->execute();
                                    $categories = $stmt->fetchAll();
                                    ?>
                                    <span>Tên loại hàng</span>
                                    <select onblur="checkCate()" id="categorie" name="categories">
                                        <!-- <?php foreach ($categories as $cate) : ?> -->
                                        <option value="<?php echo $products["id_cate"] ?>></option>
                                        <!-- <option value=" <?php echo $products["id"] ?>"><?php echo $cate["name"] ?></option> -->
                                        <!-- <?php endforeach ?> -->
                                    </select>
                                    <span class="error" id="errorCate"></span>
                                </div>
                                <div class="form-row2a">
                                    <div class="form-row2a-col">
                                        <span>Giá nhập khẩu</span>
                                        <input type="text" onblur="checkPrice()" id="price" name="import_price" value="<?php echo $products["import_price"] ?>" autocomplete="off">
                                        <span class="error" id="errorPrice"></span>
                                    </div>
                                    <div class="form-row2a-col">
                                        <span>Giá bán</span>
                                        <input type="text" onblur="checkPrices()" id="prices" name="price" value="<?php echo $products["price"] ?>" autocomplete="off">
                                        <span class="error" id="errorPrices"></span>
                                    </div>
                                </div>
                                <div class="form-row2a">
                                    <div class="form-row2a-col">
                                        <span>Hình ảnh</span>
                                        <input type="file" onblur="checkImg()" id="image" name="image" value="<?php echo $products["image"] ?>" multiple>
                                        <span class="error" id="errorImg"></span>
                                    </div>
                                    <div class="form-row2a-col">
                                        <span>Ngày nhập</span>
                                        <input type="date" onblur="checkDate()" id="date" name="created_at" value="<?php echo $products["created_at"] ?>">
                                        <span class="error" id="errorDate"></span>
                                    </div>
                                </div>
                                <div class="form2-row2b">
                                    <span>Nội dung</span>
                                    <input type="text" onblur="checkContent()" id="content" name="content" value="<?php echo $products["content"] ?>" autocomplete="off">
                                    <span class="error" id="errorContent"></span>
                                </div>
                                <div class="form2-btn">
                                    <button type="submit" class="btn btn-success" name="submit">Cập nhật</button>
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