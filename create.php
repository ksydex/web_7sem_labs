<?php
include "db.php";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Курсовой проект</title>
    <link href="styles/main.css" rel="stylesheet">
</head>
<body>
<div class="header-link">
    <h5 class="header-link__text">
        <a href="/">◀ Вернуться назад</a>
    </h5>
</div>

<h1 class="header-default">Создание проекта</h1>

<form action="create_post.php" method="POST" style="display: flex; flex-direction: column; max-width: 500px">
    <input type="text" name="name" placeholder="Название" class="mb-1">
    <textarea name="description" cols="30" rows="10" placeholder="Описание" class="mb-1"></textarea>
    <input name="price" type="number" step="1" placeholder="Стоимость" class="mb-1">

    <input type="submit" value="Создать" />
</form>


</body>
</html>