<?php
include "header.php";
include "connect.php";
// Проверяем, была ли отправлена форма

    // Получаем данные из формы
    $name = $_POST['Name'];
    $description = $_POST['Description'];
    $category_id = $_POST['Category_id'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];

    // Готовим SQL запрос для добавления товара
    $sql = "INSERT INTO product (`Name`, `Description`, `Category_id`, `Price`, `Image`) VALUES ('$name', '$description', '$category_id', '$price', '$image')";


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Админ Панель</title>
<link rel="stylesheet" href="admin.css">
</head>
<body>
<div class="admin-panel">
    <h2>Управление Товарами</h2>
    <div class="add-product">
        <h3>Добавить Товар</h3>
        <form>
            <input type="text" placeholder="Id товара" required>
            <input type="text" placeholder="Название товара" required>
            <textarea placeholder="Описание товара" required></textarea>
            <input type="text" placeholder="Id категории" required>
            <input type="text" placeholder="Цена" required>
            <input type="file" accept="image/*">
            <button type="submit">Добавить</button>
        </form>
    </div>
    <div class="products-list">
        <h3>Список Товаров</h3>
        <ul>
            <li>
                <div>
                    <img src="sample.jpg" alt="Товар">
                </div>
                <div>
                    <p>Название: Товар 1</p>
                    <p>Описание: Описание товара 1</p>
                    <p>Цена: 100$</p>
                    <button class="delete-button">Удалить</button>
                </div>
            </li>
        </ul>
    </div>
</div>
</body>
</html>
<?php
include "footer.php";
?>