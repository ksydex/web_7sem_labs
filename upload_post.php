<?php
$target = "./static/" . $_FILES['uploadfile']['name'];
move_uploaded_file( $_FILES['uploadfile']['tmp_name'], $target);

header("location: upload.php");