<?php

$file = "./static/".$_GET['filename'];
$newName = "./static/".$_POST['new_name'];

rename($file, $newName);
header("location: upload.php");