<?php
// ตรวจสอบว่ามีการส่งข้อมูลผู้ใช้มาหรือไม่
if(isset($_POST["submit"])) {
// รับข้อมูลจากฟอร์ม
$username = $_POST["username"];

// กำหนด Cookie ชื่อ "user" ด้วยข้อมูล username
setcookie("user", $username, time() + 3600, "/");

}

//ตรวจสอบว่ามี Cookie หรือไม่
if(isset($_COOKIE["user"])) {
$welcome_message = "Welcome back, " . $_COOKIE["user"] . "!";
} else {
$welcome_message = "Welcome, ผู้เยี่ยมชมใหม่!";

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PHP Cookie Example</title>
</head>
<body>



<h1> <?php echo $welcome_message; ?></h1>
<form method="post" action="">
ชื่อผู้ใช้: <input type="text" name="username" required>
<input type="submit" name="submit" value="ส่งค่า">

</form>

</body>
</html>