<?php
session_start();

if(isset($_SESSION['username'])) {
    echo "สถานะ: คุณเข้าสู่ระบบแล้วในชื่อผู้ใช้: " . htmlspecialchars($_SESSION['username']);
    echo "<br><a href='home.php'>กลับหน้าหลัก</a>";
} else {
    echo "สถานะ: คุณยังไม่ได้เข้าสู่ระบบ";
    echo "<br><a href='login.php'>ไปที่หน้าเข้าสู่ระบบ</a>";
}
?>