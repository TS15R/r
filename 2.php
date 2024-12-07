<?php
session_start();

// เชื่อมต่อกับฐานข้อมูล
$servername = "localhost";
$username = "root"; // ใช้ชื่อผู้ใช้ฐานข้อมูลของคุณ
$password = ""; // ใช้รหัสผ่านฐานข้อมูลของคุณ
$dbname = "users_db"; // ชื่อฐานข้อมูล

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับข้อมูลจากฟอร์ม
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // ตรวจสอบชื่อผู้ใช้และรหัสผ่าน
    $sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // ถ้ามีผู้ใช้ที่ตรงกับชื่อผู้ใช้และรหัสผ่าน
        $_SESSION['username'] = $user; // เก็บข้อมูลผู้ใช้ใน session
        header("Location: welcome.php"); // เปลี่ยนไปที่หน้า Welcome
    } else {
        echo "Invalid username or password!";
    }
}

$conn->close();
?>
