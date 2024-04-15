<?php
// Khởi động session
session_start();

// Xóa tất cả dữ liệu session
session_unset();

// Hủy session
session_destroy();

// Chuyển hướng người dùng đến trang đăng nhập hoặc trang chính sau khi logout
header("Location: index.php"); // Thay thế 'login.php' bằng trang bạn muốn chuyển hướng sau khi logout
exit;
?>