<?php
unlink("./static/".$_GET['filename']);
header("location: upload.php");