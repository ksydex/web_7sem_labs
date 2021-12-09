<?php
include "db.php";

include 'auth.php';

$id = $_GET["id"];

if(isset($id)) {

    $sql = "SELECT * FROM projects WHERE id = ?";

    if($stmt = $db->prepare($sql)) {
        $stmt->bind_param("i", $id);
        if($stmt->execute()) {
            $result = $stmt->get_result()->fetch_assoc();

            if($result != null) {
                $name = $result["name"];
                $description = $result["description"];
                $price = $result["price"];
            } else {
                header("location: error.php");
                exit();
            }

        } else echo "Ошибка";

    }

    $stmt->close();
    $db->close();
} else {
    header("location: error.php");
    exit();
}
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
<h1 class="header-default"><?php echo $name ?></h1>

<div>
    <a href="delete.php?id=<?php echo $id ?>">Удалить</a>
    <a href="edit.php?id=<?php echo $id ?>">Редактирование</a>
</div>

<h2>Описание</h2>
<div>
    <?php echo $description ?>
</div>
<h3>Стоимость: <?php echo $price ?></h3>

</body>
</html>