<?php
session_start();

// ถ้าเข้าสู่ระบบอยู่แล้ว ให้ส่งไปหน้า home.php เลย
if (isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}

if (isset($_POST['submit'])) {
    // ในที่นี้สมมติว่ารับค่ามาเลย (ในระบบจริงควรมีการตรวจสอบ Password ด้วย)
    $_SESSION['username'] = $_POST['username'];
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login Form</h1>
    <form method="post">
        ชื่อผู้ใช้: <input type="text" name="username" required>
        <input type="submit" name="submit" value="login">
    </form>
</body>
</html>