<?php
function filetimeToStr($filetime){
    date_default_timezone_set ("UTC"); //For a result not depending on server time zone.
    $resp = (int)($filetime / 10000000); //Number of seconds since 1601-01-01.
    $diff = 11644473600; //Number of seconds between FILETIME & Unix timestamp.
    $resp = $resp - $diff; //Actual Unix timestamp matching your filetime.
    $resp = date("Y-m-d H:i:s", $resp);
    return $resp;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Файловый сервер</title>
</head>
<body>
<form action="upload_post.php" method="post" enctype="multipart/form-data">
    <input type="file" name="uploadfile">
    <input type="submit" value="Загрузить ">
</form>
<table style="margin-top: 10px" border="1">
    <tr>
        <th>Название файла</th>
        <th>Дата создания</th>
        <th>Размер</th>
        <th>Удалить</th>
        <th>Переименовать</th>
    </tr>
    <?php
    $dir = "./static";
    $handle = opendir($dir);
    while ($entry = readdir($handle)) {
        if($entry == '.' || $entry == '..') continue;
        $entryWithPath = $dir .'/'. $entry;
        echo '<tr>'
            . '<td>' . $entry
            . (strpos($entry, '.png') != false || strpos($entry, '.jpg') != false ? '<img style="max-width: 100px" src="static/'. $entry.'" />' : '')
            . '</td>'
            . '<td>' . date('F d Y h:i A', filemtime($entryWithPath)) . '</td>'
            . '<td>'. filesize($entryWithPath) .' байт</td>'
            . '<td><a href="upload_delete.php?filename=' . $entry  . '">Удалить</a></td>'
            . '<td><form method="post" action="upload_rename.php?filename='. $entry .'"><input name="new_name" type="text" required /><input type="submit" value="Переименовать"></form></td>'
            . '</tr>';
    }

    ?>
</table>
</body>
</html>