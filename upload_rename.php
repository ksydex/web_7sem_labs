<?php

$file = "./static/".$_GET['filename'];
$newName = "./static/".$_POST['new_name'];
echo $file;
echo $newName;
rename($file, $newName);
header("location: upload.php");