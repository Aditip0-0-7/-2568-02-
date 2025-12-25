<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>Register Training</title>

<style>
body {
    font-family: 'Segoe UI', Tahoma, sans-serif;
    background: linear-gradient(135deg, #74b9ff, #a29bfe);
    margin: 0;
    padding: 0;
}

.container {
    width: 550px;
    margin: 40px auto;
    background: #ffffff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

h2, h3 {
    text-align: center;
    color: #2d3436;
}

label {
    font-weight: bold;
}

input[type=text],
input[type=email],
select {
    width: 100%;
    padding: 10px;
    margin-top: 6px;
    margin-bottom: 15px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 14px;
}

input[type=checkbox],
input[type=radio] {
    margin-right: 5px;
}

.option-group {
    margin-bottom: 15px;
}

button {
    width: 100%;
    background: #0984e3;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background: #0652dd;
}

.success {
    background: #dff9fb;
    border-left: 5px solid #22a6b3;
    padding: 12px;
    margin-top: 15px;
    border-radius: 6px;
}

table {
    width: 95%;
    margin: 30px auto;
    border-collapse: collapse;
    background: white;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

th {
    background: #0984e3;
    color: white;
    padding: 10px;
}

td {
    padding: 8px;
    text-align: center;
}

tr:nth-child(even) {
    background: #f1f2f6;
}
</style>
</head>

<body>

<div class="container">
<h2>📋 ลงทะเบียนอบรม</h2>

<form method="post">

    <label>ชื่อ-นามสกุล</label>
    <input type="text" name="fullname" required>

    <label>Email</label>
    <input type="email" name="email" required>

    <label>หัวข้ออบรม</label>
    <select name="course">
        <option value="AI PHP Programming">AI PHP Programming</option>
        <option value="Excel JavaScript Programming">Excel JavaScript Programming</option>
        <option value="HTML & CSS PHP">HTML & CSS PHP</option>
    </select>

    <div class="option-group">
        <label>อาหารที่ต้องการ</label><br>
        <input type="checkbox" name="food[]" value="ปกติ"> ปกติ
        <input type="checkbox" name="food[]" value="มังสวิรัติ"> มังสวิรัติ
        <input type="checkbox" name="food[]" value="ฮาลาล"> ฮาลาล
    </div>

    <div class="option-group">
        <label>รูปแบบการเข้าร่วม</label><br>
        <input type="radio" name="type" value="ออนไลน์" required> ออนไลน์
        <input type="radio" name="type" value="ออฟไลน์" required> ออฟไลน์
    </div>

    <button type="submit" name="submit">✅ ลงทะเบียน</button>
</form>

<?php
if (isset($_POST['submit'])) {

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $type = $_POST['type'];

    $food = !empty($_POST['food']) ? implode(", ", $_POST['food']) : "ไม่ระบุ";
    $price = ($type == "ออฟไลน์") ? 1500 : 800;

    $data = "$fullname|$email|$course|$food|$type|$price\n";
    file_put_contents("register.txt", $data, FILE_APPEND);

    echo "<div class='success'>";
    echo "<h3>🎉 ลงทะเบียนสำเร็จ</h3>";
    echo "ชื่อ: $fullname <br>";
    echo "อีเมล: $email <br>";
    echo "หัวข้ออบรม: $course <br>";
    echo "อาหาร: $food <br>";
    echo "รูปแบบ: $type <br>";
    echo "ค่าลงทะเบียน: " . number_format($price, 2) . " บาท";
    echo "</div>";
}
?>
</div>

<h3>📊 รายชื่อผู้ลงทะเบียนทั้งหมด</h3>

<?php
if (file_exists("register.txt")) {
    $lines = file("register.txt");

    echo "<table>";
    echo "<tr>
        <th>ชื่อ-นามสกุล</th>
        <th>Email</th>
        <th>หัวข้ออบรม</th>
        <th>อาหาร</th>
        <th>รูปแบบ</th>
        <th>ค่าลงทะเบียน</th>
    </tr>";

    foreach ($lines as $line) {
        list($_name, $_email, $_course, $_food, $_type, $_price) = explode("|", trim($line));
        echo "<tr>
            <td>$_name</td>
            <td>$_email</td>
            <td>$_course</td>
            <td>$_food</td>
            <td>$_type</td>
            <td>" . number_format($_price, 2) . "</td>
        </tr>";
    }
    echo "</table>";
}
?>

</body>
</html>
