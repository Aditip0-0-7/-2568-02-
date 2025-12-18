<!DOCTYPE html>
<html>
<body>

<?php
$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
while(!feof($myfile)) {
echo fgetc($myfile)."<br>";
//echo fgets($myfile)."<br>";
//echo fgets($myfile)."<br>";
}
fclose($myfile);
?>

</body>
</html>