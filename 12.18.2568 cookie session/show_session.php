<?php
session_start();
// ตรวจสอบว่ามีการตั้งค่า session หรือไม่
echo "ชื่อผู้ใช้ใน session: " . $_SESSION['username'];
echo "บทบาทใน session: " . $_SESSION['role'];
?>