<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
} 
?>

<!DOCTYPE html>
<html>
<body>
    <h1>ยินดีต้อนรับคุณ <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
    <p>คุณเข้าสู่ระบบเรียบร้อยแล้ว</p>
    <a href="check_login.php">ตรวจสอบสถานะการเข้าสู่ระบบ</a> | 
    <a href="logout.php">ออกจากระบบ</a>
</body>
</html>