<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.html"); // ถ้ายังไม่ได้เข้าสู่ระบบ, redirect กลับไปที่หน้า login
    exit();
}

echo "<h1>Welcome, " . $_SESSION['username'] . "!</h1>";
echo "<a href='logout.php'>Logout</a>"; // ลิงก์ออกจากระบบ
?>
