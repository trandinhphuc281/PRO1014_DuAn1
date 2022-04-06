<?php
$id = $_GET["id"];
$connection = new PDO("mysql:host=127.0.0.1;dbname=baileyshop;charset=utf8", "root", "");
$query = "DELETE FROM users WHERE id=$id";
$stmt = $connection->prepare($query);
$stmt->execute();
header("location:./listuser.php");
