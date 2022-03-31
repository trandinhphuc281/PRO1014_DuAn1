<?php
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
$query = "INSERT INTO products (name, import_price, price, image, created_at, content, id_cate)
VALUES ('$name', '$import_price', '$price', '$image', '$created_at', '$content', '$categories')";
$stmt = $connection->prepare($query);
$stmt->execute();
header("location:./listpro.php");
