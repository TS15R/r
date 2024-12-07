<?php
session_start();
session_destroy(); // ล้างข้อมูลใน session
header("Location: login.html"); // เปลี่ยนหน้าไปยังหน้า login
exit();
?>
