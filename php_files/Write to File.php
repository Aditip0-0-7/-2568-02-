<?php
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "John Doe99\n";
fwrite($myfile, $txt);
$txt = "Jane Doe88\n";
fwrite($myfile, $txt);
fclose($myfile);
echo "File written successfullyเรียบร้อยแล้ว";
?>