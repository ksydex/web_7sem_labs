<?php
include "auth.php";
secure();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="styles/main.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<?php echo 'user id:' . getUserId() ?>
<a href="logout.php">Log out</a>
<h1 class="header-default">Проекты</h1>

<div style="display: flex">
    <input type="search" placeholder="Поиск">
    <select style="margin-left: 10px">
        <option value="" disabled selected>Тип проекта</option>
        <option>Тип 1</option>
        <option>Тип 2</option>
        <option>Тип 3</option>
    </select>
</div>

<div style="margin-top: 10px">
    <a href="create.php">Добавить</a>
</div>

<hr>
<main>
    <ol>
        <?php
        include 'db.php';

        $sql = "select * from projects";
        if ($result = $db->query($sql)) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_array()) {
                    echo '<li><a href="/project.php?id=' . $row['id'] . '">' . $row['name'] . '</a></li>';
                }
            } else echo '<p>Список пуст</p>';
        }
        ?>
    </ol>
</main>
</body>
</html>