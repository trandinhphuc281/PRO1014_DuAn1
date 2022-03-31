<?php
$file = $_FILES["image"];
move_uploaded_file($file['tmp_name'], "../img/" . $file['name']);
$title = $_POST["title"];
$discription = $_POST["discription"];
$image = $_FILES["image"]["name"];
$created_at = $_POST["created_at"];
$content = $_POST["content"];
$connection = new PDO("mysql:host=127.0.0.1;dbname=baileyshop;charset=utf8", "root", "");
$query = "INSERT INTO news (title, discription, image, created_at, content)
VALUES ('$title', '$discription', '$image', '$created_at', '$content')";
$stmt = $connection->prepare($query);
$stmt->execute();
header("location:./listnew.php");
