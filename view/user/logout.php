<?php
session_start();
if (isset($_SESSION['khach_hang'])) {
    unset($_SESSION['khach_hang']);
} elseif (isset($_SESSION['admin'])) {
    unset($_SESSION['admin']);
}
header('location:../index.php');
