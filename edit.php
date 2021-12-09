<?php
include "db.php";
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
<h1>Редактирование</h1>

<form action="edit_post.php?id=<?php echo $id ?>" method="POST" style="display: flex; flex-direction: column; max-width: 500px">
    <input type="text" name="name" value="<?php echo $name?>" placeholder="Название" class="mb-1">
    <textarea name="description" cols="30" rows="10" placeholder="Описание" class="mb-1"><?php echo $description ?></textarea>
    <input name="price" type="number" value="<?php echo $price?>" step="1" placeholder="Стоимость" class="mb-1">

    <input type="submit" value="Создать" />
</form>

</body>
</html>