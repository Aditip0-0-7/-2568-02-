<?php
$myfile = fopen("newfile.txt", "a") or die("Unable to open file!");

$txt = "John Doe90\n";
fwrite($myfile, $txt);

fclose($myfile);

echo "บันทึกข้อมูลต่อท้ายเรียบร้อยแล้ว";
?>
