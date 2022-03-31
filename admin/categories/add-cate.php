<?php
$parent_id = $_POST['parent_id'];
$name = $_POST['name'];
$connection = new PDO("mysql:host=127.0.0.1;dbname=baileyshop;charset=utf8", "root", "");
$query = "INSERT INTO categories (parent_id,name) VALUES ('$parent_id', '$name')";
$stmt = $connection->prepare($query);
$stmt->execute();
header("location:./listcate.php");
