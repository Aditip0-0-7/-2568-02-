<?php
session_start();
// ตรวจสอบว่ามีการส่งข้อมูลผู้ใช้มาหรือไม่
$_SESSION['username'] = 'student01';
$_SESSION['role'] = 'admin';

echo "สร้าง session เรียบร้อยแล้ว";
?>